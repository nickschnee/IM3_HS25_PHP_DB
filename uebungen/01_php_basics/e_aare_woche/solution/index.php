<?php
$measurements = [
    ['day' => 'Montag', 'temperature_c' => 18.9],
    ['day' => 'Dienstag', 'temperature_c' => 19.1],
    ['day' => 'Mittwoch', 'temperature_c' => 19.4],
    ['day' => 'Donnerstag', 'temperature_c' => 19.8],
    ['day' => 'Freitag', 'temperature_c' => 20.1],
    ['day' => 'Samstag', 'temperature_c' => 20.3],
    ['day' => 'Sonntag', 'temperature_c' => 20.0],
];
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <title>Aare-Woche</title>
</head>
<body>
  <h1>Aare-Woche</h1>
  <ul>
    <?php foreach ($measurements as $measurement) { ?>
      <li>
        <?php echo $measurement['day']; ?>:
        <?php echo $measurement['temperature_c']; ?> °C
      </li>
    <?php } ?>
  </ul>
</body>
</html>
