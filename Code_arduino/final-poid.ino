#include <Ethernet.h>
#include <SPI.h>
#include <ArduinoJson.h>
#include <DFRobot_HX711.h>

DFRobot_HX711 scale1(A2, A3); // Utilise les broches A2 et A3 pour le poids du poulet
DFRobot_HX711 scale2(A4, A5); // Utilise les broches A4 et A5 pour le poids du grain

byte mac[] = {0xA8, 0x61, 0x0A, 0xA7, 0x75, 0x24};
IPAddress ip(192, 168, 64, 5);
EthernetServer local_server(80);

void setup() {
  Serial.begin(9600);
  Ethernet.begin(mac, ip);
  local_server.begin();
  SPI.begin();
}

void loop() {
  respondToClientRequests();
  updateLEDMarquage();
}

void respondToClientRequests() {
  EthernetClient local_client = local_server.available();

  if (local_client) {
    boolean currentLineIsBlank = true;

    while (local_client.connected()) {
      if (local_client.available()) {
        char c = local_client.read();

        if (c == '\n' && currentLineIsBlank) {
          local_client.println("HTTP/1.1 200 OK");
          local_client.println("Access-Control-Allow-Origin: *");
          local_client.println("Content-Type: application/json");
          local_client.println("Connection: close");
          local_client.println();

          String jsonString = getSensorDataJSON();
          local_client.print(jsonString);
          delay(50);
          break;
        }

        if (c == '\n') {
          currentLineIsBlank = true;
        } else if (c != '\r') {
          currentLineIsBlank = false;
        }
      }
    }
    local_client.stop();
  }
}

String getSensorDataJSON() {
  StaticJsonDocument<100> jsonDocument;
  long weight2 = scale2.readWeight();
  long weight1 = scale1.readWeight();

  jsonDocument["poidsgrainValue"] = weight2;
  jsonDocument["poidspouletValue"] = weight1;

  String jsonString;
  serializeJson(jsonDocument, jsonString);

  Serial.println(jsonString);

  return jsonString;
}

void updateLEDMarquage() {
  if (scale1.readWeight() > 100) {
    pinMode(3, OUTPUT);
    digitalWrite(3, HIGH);
  } else {
    digitalWrite(3, LOW);
  }
}