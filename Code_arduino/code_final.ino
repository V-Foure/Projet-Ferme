#include <SPI.h>
#include <Ethernet.h>
#include <ArduinoJson.h>

// Elements pour les potentiometre
const int potentiometerPin = A2; // Broche analogique du potentiomètre
const int jsonCapacity = JSON_OBJECT_SIZE(20); // Taille maximale de la chaîne de caractères JSON
DynamicJsonDocument jsonDocument(jsonCapacity); // Déclaration de l'objet JSON

// Elements pour le capteur de luminosité
const int lightSensorPin = A0; // Broche analogique du capteur de lumière

// Elements pour la connection ethernet (serveur web)
byte mac[] = {0xA8, 0x61, 0x0A, 0xAE, 0x75, 0x24};
IPAddress ip(192, 168, 64, 5); // Adresse IP du serveur web de l'Arduino sur le réseau local
EthernetServer local_server(80); // Crée un serveur web sur le port standard 80

const int ledPin = 8; // Broche de la LED

int potentiometre = 0;
int temperature = 0;

void setup()
{
  Serial.begin(9600);
  
  pinMode(ledPin, OUTPUT);
  pinMode(9, OUTPUT);
  
  Ethernet.begin(mac, ip);       // Initialise l'Arduino comme un élément du réseau local
  local_server.begin();          // Se met à l'écoute des communications client (browser web)
}

void loop()
{
  respond_local_server();

  potentiometre = analogRead(A2);
  temperature = map(potentiometre, 0, 1023, 0, 23);
  Serial.println(temperature);

  if (temperature >= 0 && temperature < 17) {
    digitalWrite(9, HIGH);
  } else {
    digitalWrite(9, LOW);
  }

  int light = analogRead(A0);
  Serial.println(light);

  if (light > 20)
  {
    digitalWrite(ledPin, LOW);
  }
  else
  {
    digitalWrite(ledPin, HIGH);
  }

  delay(500); // Attente de 0.5 secondes entre chaque envoi de données
}

void respond_local_server()
{
  EthernetClient local_client = local_server.available();

  if (local_client)
  {
    boolean currentLineIsBlank = true;
    while (local_client.connected()) // Tant qu'un client est connecté
    {
      if (local_client.available()) // Si un client a envoyé une requête
      {
        char c = local_client.read(); // Lire un caractère du client
        if (c == '\n' && currentLineIsBlank) // Quand la dernière ligne envoyée par le client est vide et suivi de \n on va lui répondre
        {
          // On envoie un entête HTTP standard en réponse
          local_client.println("HTTP/1.1 200 OK");
          local_client.println("Access-Control-Allow-Origin: *");
          local_client.println("Content-Type: application/json");
          local_client.println("Connection: close");
          local_client.println();

          // On envoie la valeur des capteurs au format JSON
          char sPostData[150] = "";
          getJSON_DataFromSensors(sPostData);
          local_client.println(sPostData);

          break;
        }

        // Every line of text received from the client ends with \r\n
        if (c == '\n') // Si le caractère reçu est \n, on positionne la variable currentLineIsBlank à vrai
          currentLineIsBlank = true;
        else if (c != '\r') // Si le caractère reçu est \r, on positionne la variable currentLineIsBlank à faux
          currentLineIsBlank = false;
      }
    }

    delay(1000);          // On laisse 1 seconde au navigateur pour récupérer les données qu'on a envoyées
    local_client.stop(); // Ferme la connexion
  }
}

// Renvoie les données des capteurs au format JSON
void getJSON_DataFromSensors(char *sDataFromSensors)
{
  // Réinitialise l'objet JSON
  jsonDocument.clear();

  // Conversion de la valeur du potentiomètre en degrés
  int potentiometerValue = analogRead(potentiometerPin); // Lecture de la valeur du potentiomètre
  float potentiometerDegrees = map(potentiometerValue, 0, 1023, 0, 23); // Mise à l'échelle de 0 à 23
  jsonDocument["potentiometerValue"] = potentiometerDegrees; // Ajout de la valeur du potentiomètre en degrés à l'objet JSON

  String jsonString; // Conversion de l'objet JSON en chaîne de caractères
  serializeJson(jsonDocument, jsonString);

  Serial.println(jsonString); // Affichage de la chaîne de caractères JSON sur le moniteur série

  //delay(1000); // Attente de 1 seconde

  // Conversion de la valeur du capteur de lumière en degrés
  int lightValue = analogRead(lightSensorPin); // Lecture de la valeur du capteur de lumière
  float lightDegrees = map(lightValue, 0, 1040, 0, 40); // Mise à l'échelle de 0 à 23
  jsonDocument["lightValue"] = lightDegrees; // Ajout de la valeur du capteur de lumière en degrés à l'objet JSON

  jsonString = ""; // Réinitialise la chaîne de caractères JSON

  serializeJson(jsonDocument, jsonString);

  Serial.println(jsonString); // Affichage de la chaîne de caractères JSON sur le moniteur série

  //delay(1000); // Attente de 1 seconde

  // Copie la chaîne de caractères JSON dans sDataFromSensors
  strcpy(sDataFromSensors, jsonString.c_str());
}