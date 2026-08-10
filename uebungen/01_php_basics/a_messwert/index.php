<?php
// 1. Ort als Text speichern.
$location = '';

// 2. Temperatur als Kommazahl speichern.
$temperatureC = 0;

// 3. Uhrzeit als Text speichern.
$measuredAt = '';

// 4. Meldung mit den drei Variablen zusammensetzen.
$message = '';
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <title>Messwert</title>
</head>
<body>
  <h1>Messwert</h1>
  <p><?php echo $message; ?></p>
</body>
</html>
