#include <ArduinoJson.h>

// Elements pour les potentiometre
const int potentiometerPin = A2; // Broche analogique du potentiomètre
const int jsonCapacity = JSON_OBJECT_SIZE(20); // Taille maximale de la chaîne de caractères JSON
DynamicJsonDocument jsonDocument(jsonCapacity); // Déclaration de l'objet JSON

// Elements pour le capteur de luminosité
const int lightSensorPin = A0; // Broche analogique du capteur de lumière

// Elements pour la connection ethernet (serveur web)
#include "SPI.h"
#include "Ethernet.h"
byte mac[] = {0xA8, 0x61, 0x0A, 0xAE, 0x75, 0x24};
IPAddress ip(192, 168, 64, 5); // Adresse IP du serveur web de l'arduino sur le réseau local
EthernetServer local_server(80); // creation d'un serveur web sur le port standard 80

void setup()
{
  Serial.begin(9600);
  Ethernet.begin(mac, ip);       // Initialize l'arduino comme un élément du réseau local
  local_server.begin();          // Se met à l'écoute des communications client (browser web)
}

void loop()
{
  respond_local_server();
}

void respond_local_server()
{
  EthernetClient local_client = local_server.available();

  if (local_client)
  {
    boolean currentLineIsBlank = true;
    while (local_client.connected()) // tant qu'un client est connecté
    {
      if (local_client.available()) // Si un client a envoyé une requête
      {
        char c = local_client.read(); // lire un caractère du client
        if (c == '\n' && currentLineIsBlank) // Quand la dernière ligne envoyée par le client est vide et suivi de \n on va lui répondre
        {
          // On envoie un entête http standard en réponse
          local_client.println("HTTP/1.1 200 OK");
          local_client.println("Access-Control-Allow-Origin: *");
          local_client.println("Content-Type: application/json");
          local_client.println("Connection: close");
          local_client.println();

          // On envoie la valeur des capteur en format JSON
          char sPostData[150] = "";
          getJSON_DataFromSensors(sPostData);
          local_client.println(sPostData);

          break;
        }

        // every line of text received from the client ends with \r\n
        if (c == '\n') // Si le caractère reçu est \n on positionne la variable currentLineIsBlank à vrai
          currentLineIsBlank = true;
        else if (c != '\r') // Si le caractère reçu est \r on positionne la variable currentLineIsBlank à faux
          currentLineIsBlank = false;
      }
    }

    delay(1000);          // On laisse 1s au browser pour récupérer les données qu'on a envoyées
    local_client.stop(); // ferme la connection
  }
}

// renvoie les données des capteurs en format JSON
void getJSON_DataFromSensors(char *sDataFromSensors)
{
  // Réinitialise l'objet JSON
  jsonDocument.clear();

  // Copy la valeur du potentiomètre dans la chaîne de caractère JSON de retour
  int potentiometerValue = analogRead(potentiometerPin); // Lecture de la valeur du potentiomètre
  jsonDocument["potentiometerValue"] = potentiometerValue; // Ajout de la valeur du potentiomètre à l'objet JSON

  String jsonString; // Conversion de l'objet JSON en chaîne de caractères
  serializeJson(jsonDocument, jsonString);

  Serial.println(jsonString); // Affichage de la chaîne de caractères JSON sur le moniteur série

  delay(1000); // Attente de 1 seconde

  // Copy la valeur du capteur de lumière dans la chaîne de caractère JSON de retour
  int lightValue = analogRead(lightSensorPin); // Lecture de la valeur du capteur de lumière
  jsonDocument["lightValue"] = lightValue; // Ajout de la valeur du capteur de lumière à l'objet JSON

  serializeJson(jsonDocument, jsonString);

  Serial.println(jsonString); // Affichage de la chaîne de caractères JSON sur le moniteur série

  delay(1000); // Attente de 1 seconde

  // Une structure JSON se termine par une accolade
  strcat(sDataFromSensors, jsonString.c_str());
}
