<script>
  setInterval(() => {
    $(document).ready(function() {
      // Effectuer la requête HTTP vers l'adresse IP de l'Arduino
      $.getJSON("http://192.168.64.5", function(data) {
  
        $("#potentiometerValue").html("<p>Valeur du potentiometre : " + data.potentiometerValue + "</p>");
        $("#lightValue").html( "<p>Valeur du capteur de lumiere : " + data.lightValue + "</p>");
      });
    });
  }, 1000);
  </script>
