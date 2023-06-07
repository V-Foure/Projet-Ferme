#include <SPI.h>
#include <Ethernet.h>
#include <ArduinoJson.h>

const int ledPin = 8; // Broche de la LED
int ledState = LOW;    // État actuel de la LED (initialisé à LOW)

byte mac[] = {0xA8, 0x61, 0x0A, 0xAE, 0x75, 0x24};
IPAddress ip(192, 168, 64, 5); // Adresse IP du serveur web de l'Arduino sur le réseau local
EthernetServer server(80); // Crée un serveur web sur le port standard 80

void setup()
{
    Serial.begin(9600);
    Ethernet.begin(mac, ip);
    server.begin();
    pinMode(ledPin, OUTPUT);
    digitalWrite(ledPin, ledState);
}

void loop()
{
    handleClientRequests();
}

void handleClientRequests()
{
    EthernetClient client = server.available();

    if (client)
    {
        boolean currentLineIsBlank = true;
        String request = "";

        while (client.connected())
        {
            if (client.available())
            {
                char c = client.read();
                request += c;

                if (c == '\n' && currentLineIsBlank)
                {
                    // Analyser la requête
                    if (request.indexOf("GET /?led=1") != -1)
                    {
                        ledState = HIGH;
                        digitalWrite(ledPin, ledState);
                    }
                    else if (request.indexOf("GET /?led=0") != -1)
                    {
                        ledState = LOW;
                        digitalWrite(ledPin, ledState);
                    }

                    // Envoyer la réponse HTTP
                    sendHttpResponse(client);

                    break;
                }

                if (c == '\n')
                    currentLineIsBlank = true;
                else if (c != '\r')
                    currentLineIsBlank = false;
            }
        }

        delay(500);
        client.stop();
    }
}

void sendHttpResponse(EthernetClient client)
{
    client.println("HTTP/1.1 200 OK");
    client.println("Access-Control-Allow-Origin: *");
    client.println("Content-Type: text/html");
    client.println("Connection: close");
    client.println();

    client.println("<html><body><h1>Contrôle de la LED</h1>");
    client.println("<p>État de la LED : ");
    client.println(ledState == HIGH ? "Allumée" : "Éteinte");
    client.println("</p>");

    client.println("<form>");
    client.println("<button type='submit' name='led' value='1'>Allumer</button>");
    client.println("<button type='submit' name='led' value='0'>Éteindre</button>");
    client.println("</form>");

    client.println("</body></html>");
}
