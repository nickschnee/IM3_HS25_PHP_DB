<?php
function formatMeasurement($location, $temperatureC, $measuredAt)
{
    return "Aare in $location: $temperatureC °C um $measuredAt Uhr.";
}

$bernMessage = formatMeasurement('Bern', 19.4, '10:00');
$brienzMessage = formatMeasurement('Brienz', 16.8, '10:00');
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
  <p><?php echo $brienzMessage; ?></p>
</body>
</html>
