#include <SPI.h>
#include <MFRC522.h>

#define SS_PIN 9
#define RST_PIN 10

MFRC522 rfid(SS_PIN, RST_PIN);
String lastUID; // Variable pour stocker le dernier UID scanné

void setup() {
  Serial.begin(9600);
  SPI.begin();
  rfid.PCD_Init(); // Initialisation du module RFID
}

void loop() {
  if (rfid.PICC_IsNewCardPresent() && rfid.PICC_ReadCardSerial()) {
    // Si une nouvelle carte RFID est présente et lisible

    String uid = "";
    for (byte i = 0; i < rfid.uid.size; i++) {
      // Lecture de l'UID de la carte RFID
      uid += String(rfid.uid.uidByte[i] < 0x10 ? "0" : "");
      uid += String(rfid.uid.uidByte[i], HEX);
    }

    if (uid != lastUID) {
      // Vérification si l'UID est différent du dernier UID scanné
      lastUID = uid; // Mise à jour du dernier UID avec le nouvel UID
      Serial.print("Nouvel UID : ");
      Serial.println(uid); // Affichage du nouvel UID
    }

    rfid.PICC_HaltA(); // Mise en pause de la carte RFID
    rfid.PCD_StopCrypto1(); // Arrêt de la communication cryptée
  }
}