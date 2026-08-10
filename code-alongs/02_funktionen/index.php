<?php
/**
 * Code-Along 02: Funktionen
 *
 * Dieselbe Meldung soll für verschiedene Orte funktionieren.
 */

// 1. Funktion formatMeasurement mit drei Parametern deklarieren.
// 2. In der Funktion eine Meldung mit return zurückgeben.


// 3. Funktion für Bern aufrufen und Rückgabewert speichern.
$bernMessage = '';

// 4. Funktion ein zweites Mal für Basel aufrufen.
$baselMessage = '';

?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Messwertmeldungen</title>
</head>
<body>
  <h1>Messwertmeldungen</h1>
  <p><?php echo $bernMessage; ?></p>
  <p><?php echo $baselMessage; ?></p>
</body>
</html>
