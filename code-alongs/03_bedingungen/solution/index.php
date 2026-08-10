<?php
function classifyTemperature($temperatureC)
{
    if ($temperatureC < 16) {
        return 'kalt';
    } elseif ($temperatureC < 20) {
        return 'frisch';
    } else {
        return 'warm';
    }
}

$temperatureC = 19.4;
$label = classifyTemperature($temperatureC);
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Temperaturbewertung</title>
</head>
<body>
  <h1><?php echo $temperatureC; ?> °C</h1>
  <p>Unsere vereinfachte Bewertung: <?php echo $label; ?></p>
</body>
</html>
