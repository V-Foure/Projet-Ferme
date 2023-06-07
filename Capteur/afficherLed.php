<html>
<head>
    <title>Pilotage de la LED</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleLED(state) {
            $.get("http://192.168.64.5:80/?led=" + state);
        }
    </script>
</head>
<body>
    <h1>Pilotage de la LED</h1>

    <div class="wrapper">
        <input type="button" value="Allumer" onclick="toggleLED(1)">
        <input type="button" value="Éteindre" onclick="toggleLED(0)">
    </div>
</body>
</html>
