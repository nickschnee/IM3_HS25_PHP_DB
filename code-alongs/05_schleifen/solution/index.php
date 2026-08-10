<?php
$measurements = [
    ['time' => '08:00', 'temperature_c' => 18.9],
    ['time' => '10:00', 'temperature_c' => 19.4],
    ['time' => '12:00', 'temperature_c' => 20.1],
    ['time' => '14:00', 'temperature_c' => 20.3],
];
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aare-Messungen</title>
  <style>
    body { max-width: 42rem; margin: 3rem auto; padding: 0 1rem; font-family: sans-serif; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: .8rem; border-bottom: 1px solid #bbb; text-align: left; }
  </style>
</head>
<body>
  <h1>Aare-Messungen in Bern</h1>
  <table>
    <thead>
      <tr><th>Zeit</th><th>Temperatur</th></tr>
    </thead>
    <tbody>
      <?php foreach ($measurements as $measurement) { ?>
        <tr>
          <td><?php echo $measurement['time']; ?></td>
          <td><?php echo $measurement['temperature_c']; ?> °C</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
