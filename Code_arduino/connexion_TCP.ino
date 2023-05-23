#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0xA8, 0x61, 0x0A, 0xAE, 0x75, 0x24 };  // Adresse MAC de votre shield Ethernet
IPAddress ip(192, 168, 64, 4);  // Adresse IP de l'Arduino
EthernetServer server(80);

void setup() {
  pinMode(A0, INPUT);
  analogWrite(A0, LOW);

  Ethernet.begin(mac, ip);

  server.begin();
  Serial.begin(9600);
  Serial.print("Serveur IP : ");
  Serial.println(Ethernet.localIP());
}

void loop() {
  EthernetClient client = server.available();
  
  if (client) {
    Serial.println("Nouvelle connexion cliente");

    int light = analogRead(A0);
    
    client.println("HTTP/1.1 200 OK");
    client.println("Content-Type: text/plain");
    client.println();
    client.print("Light=");
    client.println(light);
    client.println();
    delay(100);  // Attendez que le client reçoive la réponse
    client.stop();

    Serial.println("Client déconnecté");
  }
}
