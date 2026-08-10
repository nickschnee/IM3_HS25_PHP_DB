<?php
$waterLevelCm = 300;
$level = '';

// Unter 250: normal

// Unter 350: beobachten

// Alles andere: warnung

?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <title>Warnstufe</title>
</head>
<body>
  <h1>Pegel: <?php echo $waterLevelCm; ?> cm</h1>
  <p>Stufe: <?php echo $level; ?></p>
</body>
</html>
