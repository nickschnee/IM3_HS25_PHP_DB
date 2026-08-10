<?php
$waterLevelCm = 300;

if ($waterLevelCm < 250) {
    $level = 'normal';
} elseif ($waterLevelCm < 350) {
    $level = 'beobachten';
} else {
    $level = 'warnung';
}
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
