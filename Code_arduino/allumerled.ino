#include <Ethernet.h> // Inclut la bibliothèque Ethernet
#include <SPI.h>
const int led1Pin = 8; // Broche de la LED 1

byte mac[] = { 0xA8, 0x61, 0x0A, 0xAE, 0x75, 0x24 }; // Adresse MAC de l'Arduino
IPAddress ip(192,168,64,6); // Adresse IP 


EthernetServer server(80); // Crée un serveur TCP sur le port 80
void setup() {
  // Configure les broches de sortie et initialise l'Ethernet et le serveur

  pinMode(led1Pin, OUTPUT);
  Ethernet.begin(mac, ip);

  
  server.begin();


  Serial.begin(9600);

  
}

void loop() {
  
  // Ecoute les connexions entrantes et traite les commandes reçues
  EthernetClient client = server.available();
  
  Serial.println(client);
  while (client) 
  { // Si une connexion est disponible
    // lisez les données envoyées par le client
    String commande = client.readStringUntil('\r');

    if (commande == "allumer") {
      
      digitalWrite(led1Pin, HIGH);

     } else if (commande == "eteindre")

      


    client.stop(); // Ferme la connexion avec le client
   }

    //String commande = "reculer";

    //Serial.println(commande);
      
  
  
}
