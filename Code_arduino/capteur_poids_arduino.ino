#include <DFRobot_HX711.h>
#include <ArduinoJson.h>
#include "SPI.h"
#include "Ethernet.h"
#include <MFRC522.h>
#define RST_PIN 8
#define SS_PIN 9

MFRC522 mfrc522 (SS_PIN, RST_PIN); // Crée une instance du MFRC522
DFRobot_HX711 scale1(A2, A3); // Utilise les broches A2 et A3 pour le poids du poulet 
DFRobot_HX711 scale2(A4, A5); // Utilise les broches A4 et A5 pour le poids du grains

// Elements pour les potentiometre
const int jsonCapacity = JSON_OBJECT_SIZE(20); // Taille maximale de la chaîne de caractères JSON
DynamicJsonDocument jsonDocument(jsonCapacity); // Déclaration de l'objet JSON

// Elements pour la connection ethernet (serveur web)
byte mac[] = {0xA8, 0x61, 0x0A, 0xA7, 0x75, 0x24};
IPAddress ip(192, 168, 64, 5); // Adresse IP du serveur web de l'arduino sur le réseau local
EthernetServer local_server(80); // creation d'un serveur web sur le port standard 80

void setup() {
  Serial.begin (9600);
  Ethernet.begin(mac, ip);       // Initialize l'arduino comme un élément du réseau local
  local_server.begin();          // Se met à l'écoute des communications client (browser web)
  SPI.begin();
  mfrc522.PCD_Init();
}

void loop() {
  respond_local_server();
  if (scale1.readWeight() > 100) {
    pinMode(3,OUTPUT); //règle la borne numérique numéro 3 de la carte Arduino en mode sortie
    digitalWrite(3,HIGH); //le courant est envoyé sur la borne 3, la LED de marquage s'allume
  } else 
  digitalWrite(3,LOW); //le courant est envoyé sur la borne 3, la LED de marquage s'allume
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
    delay(50);          // On laisse 1s au browser pour récupérer les données qu'on a envoyées
    local_client.stop(); // ferme la connection
  }
}

// renvoie les données des capteurs en format JSON
void getJSON_DataFromSensors(char *sDataFromSensors)
{
  // Réinitialise l'objet JSON
  jsonDocument.clear();

  long weight2=scale2.readWeight();
  long weight1=scale1.readWeight();

  if (mfrc522.PICC_IsNewCardPresent () && mfrc522.PICC_ReadCardSerial()) 
  {
    // Lecture de l'UID du badge RFID
    Serial.print ("UID du badge : ");
    String uid = "";
    for (byte i = 0; i < mfrc522.uid.size; i++) 
  {
    uid.concat(String(mfrc522.uid.uidByte [i] < 0x10 ? "0" : "")); uid.concat(String(mfrc522.uid.uidByte [i], HEX));
  }

  mfrc522.PICC_HaltA();
  }
  jsonDocument["poidsgrainValue"] = weight2; // Ajout de la valeur du potentiomètre en degrés à l'objet JSON
  jsonDocument["poidspouletValue"] = weight1; // Ajout de la valeur du capteur de lumière en degrés à l'objet JSON
  jsonDocument["rfidValue"] = uid; // Ajout de la valeur du capteur de lumière en degrés à l'objet JSON
  String jsonString; // Conversion de l'objet JSON en chaîne de caractères

  jsonString = ""; // Réinitialise la chaîne de caractères JSON
  serializeJson(jsonDocument, jsonString);
  Serial.println(jsonString); // Affichage de la chaîne de caractères JSON sur le moniteur série

  delay(50); // Attente de 0,1 seconde

  // Copie la chaîne de caractères JSON dans sDataFromSensors
  strcpy(sDataFromSensors, jsonString.c_str());
}