#include <ArduinoJson.h>

const int jsonCapacity = JSON_OBJECT_SIZE(20);  // Taille maximale de la chaîne de caractères JSON
DynamicJsonDocument jsonDocument(jsonCapacity); // Déclaration de l'objet JSON

// Elements pour la connection ethernet (serveur web)
#include "SPI.h"
#include "Ethernet.h"
byte mac[] = {0xA8, 0x61, 0x0A, 0xAE, 0x75, 0x24};
IPAddress ip(192, 168, 64, 5);   // Adresse IP du serveur web de l'arduino sur le réseau local
EthernetServer local_server(80); // creation d'un serveur web sur le port standard 80

#include <Servo.h>

const int ledPin = 2;        // Broche de la LED
const int servoPin = 8;      // Broche de contrôle du servomoteur
const int echoPin = 11;      // Broche ECHO du capteur ultrason
const int triggerPin = 12;   // Broche TRIGGER du capteur ultrason

Servo servo;                 // Création d'une instance de la classe Servo

const int minAngle = 0;      // Angle minimal du servomoteur
const int maxAngle = 180;    // Angle maximal du servomoteur

const int distanceThreshold = 30;  // Seuil de distance en centimètres

const int grainsDaily = 120;       // Nombre de grains journaliers

int grainsRemaining = grainsDaily; // Nombre de grains restants

void setup() {
  pinMode(triggerPin, OUTPUT);
  pinMode(echoPin, INPUT);
  pinMode(ledPin, OUTPUT);
  servo.attach(servoPin);  // Initialiser la borche de contrôle du servomoteur
  servo.write(maxAngle);   // Initialiser le servomoteur à l'angle maximal
  Ethernet.begin(mac, ip); // Initialise l'arduino comme un élément du réseau local
  local_server.begin();    // Se met à l'écoute des communications client (browser web)
  Serial.begin(9600);      // Initialiser la communication série
  delay(1000);
  Serial.println("----- Démarrage du programme -----");
}

void loop() {
  // Mesurer la distance avec le capteur ultrason
  long duration, distance;
  digitalWrite(triggerPin, LOW);
  delayMicroseconds(2);
  digitalWrite(triggerPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(triggerPin, LOW);
  duration = pulseIn(echoPin, HIGH);
  distance = duration * 0.034 / 2;

  if (distance > 0 && distance < 30) {
    // Envoyer les données du capteur ultrason via la communication série
    Serial.print("Distance : ");
    Serial.print(distance);
    Serial.println(" cm");
    
    // Faire tourner le servomoteur à l'angle minimal pour distribuer les grains
    Serial.print("Grains restants avant la distribution : ");
    Serial.println(grainsRemaining);
    digitalWrite(ledPin, HIGH); // Allumer la LED
    servo.write(minAngle);
    delay(1000);                // Temps de distribution des grains
    digitalWrite(ledPin, LOW);  // Éteindre la LED
    servo.write(maxAngle);      // Retourner à l'angle maximal
    grainsRemaining = grainsRemaining - 30;
    Serial.print("Grains restants apres la distribution : ");
    Serial.println(grainsRemaining);
  } else {
    Serial.println("Aucun poulet détecté !");
  }

  // Vérifier si le bouton poussoir est enfoncé pour simuler "A consommé tous ses grains journaliers"
  if (grainsRemaining == 0) {
    Serial.println("A consommé tous ses grains journaliers !");
  }

  delay(1000); // Délai entre chaque itération de la boucle
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

// renvoie les données du capteur en format JSON
void getJSON_DataFromSensors(char *sDataFromSensors)
{
  // Réinitialise l'objet JSON
  jsonDocument.clear();

  // Conversion de la valeur du potentiomètre en degrés
  int ultrasoundValue = analogRead(triggerPin); // Lecture de la valeur du capteur ultrason
  jsonDocument["ultrasoundValue"] = ultrasoundValue; // Ajout de la valeur du capteur ultrason à l'objet JSON

  String jsonString; // Conversion de l'objet JSON en chaîne de caractères
  serializeJson(jsonDocument, jsonString);

  Serial.println(jsonString); // Affichage de la chaîne de caractères JSON sur le moniteur série

  delay(1000); // Attente de 1 seconde

  // Copie la chaîne de caractères JSON dans sDataFromSensors
  strcpy(sDataFromSensors, jsonString.c_str());
}
