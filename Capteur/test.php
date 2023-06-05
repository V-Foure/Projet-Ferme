<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  setInterval(() => {
    $(document).ready(function() {
      // Effectuer la requête HTTP vers l'adresse IP de l'Arduino
      $.getJSON("http://192.168.64.5", function(data) {
  
        $("#potentiometerValue").html("<p>Valeur du potentiomètre : " + data.potentiometerValue + "</p>");
        $("#lightValue").html("<p>Valeur du capteur de lumière : " + data.lightValue + "</p>");
        $("#poidsgrainValue").html("<p>Poids du grain : " + data.poidsgrainValue + "g</p>");
        $("#poidspouletValue").html("<p>Poids du poulet : " + data.poidspouletValue + "g</p>");


        // Contrôler la LED en fonction de la valeur du potentiomètre
        var ledIntensity = Math.floor((data.potentiometerValue / 23) * 255);
        $.get("http://192.168.64.5/led?intensity=" + ledIntensity);
      });
    });
  }, 500);

  function turnOnLED() {
    $.get("http://192.168.64.5/led?state=on", function(response) {
      console.log(response);
    });
  }

  function turnOffLED() {
    $.get("http://192.168.64.5/led?state=off", function(response) {
      console.log(response);
    });
  }
</script>

<body>
  <h1>Données du capteur :</h1>
  <div id="potentiometerValue"></div>
  <div id="lightValue"></div>
  <div id="poidsgrainValue"></div>
  <div id="poidspouletValue"></div>

  <button onclick="turnOnLED()">Allumer la LED</button>
  <button onclick="turnOffLED()">Éteindre la LED</button>
</body>
</head>