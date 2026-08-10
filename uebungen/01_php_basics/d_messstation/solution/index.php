<?php
$station = [
    'name' => 'Schönau',
    'river' => 'Aare',
    'is_active' => true,
];
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <title>Messstation</title>
</head>
<body>
  <h1><?php echo $station['name']; ?></h1>
  <p>an der <?php echo $station['river']; ?></p>

  <h2>Debugging</h2>
  <pre><?php print_r($station); ?></pre>
</body>
</html>
