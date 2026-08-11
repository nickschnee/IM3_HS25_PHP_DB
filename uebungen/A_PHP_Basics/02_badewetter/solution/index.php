<?php
// PHP als kleine API: reine Textausgabe, kein HTML.
header('Content-Type: text/plain; charset=utf-8');

function makeBathingMessage($temperatureC)
{
    return "Das Wasser hat heute $temperatureC °C.";
}

$temperatureC = 20.5;
$message = makeBathingMessage($temperatureC);
echo $message . "\n";
