<?php
// PHP als kleine API: reine Textausgabe, kein HTML.
header('Content-Type: text/plain; charset=utf-8');

$waterLevelCm = 300;

// Unter 250: normal / unter 350: beobachten / sonst: warnung
if ($waterLevelCm < 250) {
    $level = 'normal';
} elseif ($waterLevelCm < 350) {
    $level = 'beobachten';
} else {
    $level = 'warnung';
}

// Pegel und Stufe mit echo ausgeben.
echo "Pegel: $waterLevelCm cm – Stufe: $level\n";
