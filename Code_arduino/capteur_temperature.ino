int potentiometre = 0;
int temperature = 0;

void setup()
{
  
  pinMode(11, OUTPUT);
  Serial.begin(9600);

}

void loop()
{
  potentiometre = analogRead(A2);
  temperature = map(potentiometre, 0, 1023, 0, 23);
  Serial.print("temperature = ");
  Serial.println(temperature);
   delay(100);
   if (temperature >= 0 && temperature < 17) { 

// On allume quand la valeur du potentiomètre est comprise entre 9 et 19 sinon on éteint.
   
 digitalWrite(11, HIGH);
  } 
  else {
    digitalWrite(11, LOW);
  }
 }
