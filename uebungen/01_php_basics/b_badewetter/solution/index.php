<?php
function makeBathingMessage($temperatureC)
{
    return "Das Wasser hat heute $temperatureC °C.";
}

$temperatureC = 20.5;
$message = makeBathingMessage($temperatureC);
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <title>Badewetter</title>
</head>
<body>
  <h1>Badewetter?</h1>
  <p><?php echo $message; ?></p>
</body>
</html>
