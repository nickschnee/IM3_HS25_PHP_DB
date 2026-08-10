<?php
$location = 'Bern';
$temperatureC = 19.4;
$measuredAt = '10:00';

$message = "Aare in $location: $temperatureC °C um $measuredAt Uhr.";
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
