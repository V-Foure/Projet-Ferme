void setup() {
   pinMode(A0, INPUT);
   analogWrite(A0, LOW);
   pinMode(8, OUTPUT);

   Serial.begin(9600);
}

void loop() {
   int light = analogRead(A0);
   Serial.print("Light = ");
   Serial.println(light);

   if (light > 20) { digitalWrite (8, LOW); }
   if (light < 20) { digitalWrite (8, HIGH); }
  
}
