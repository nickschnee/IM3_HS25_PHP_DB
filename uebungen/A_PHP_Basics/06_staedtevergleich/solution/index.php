<?php
/**
 * Übung f: Städtevergleich (Lösung)
 *
 * Kombiniert alle Themen aus Block A: Variablen, Funktion mit return,
 * Bedingungen, assoziative Arrays und foreach. PHP dient als Text-API.
 *
 * Das ist EIN möglicher Weg. Andere Strukturen sind ebenso richtig, solange
 * die Anforderungen aus der README erfüllt sind.
 */

// PHP als kleine API: reine Textausgabe, kein HTML.
header('Content-Type: text/plain; charset=utf-8');

// Funktion: bewertet eine Wassertemperatur und gibt ein Label zurück
// (gleiche Regel wie in Code-Along 03_bedingungen; nur return, kein echo).
function bewerteTemperatur($temperaturC)
{
    if ($temperaturC < 16) {
        return 'kalt';
    } elseif ($temperaturC < 20) {
        return 'frisch';
    } else {
        return 'warm';
    }
}

// Die drei Aare-Städte als Liste von assoziativen Arrays.
$staedte = [
    ['stadt' => 'Brienz', 'temperatur_c' => 15.4],
    ['stadt' => 'Thun',   'temperatur_c' => 18.2],
    ['stadt' => 'Bern',   'temperatur_c' => 20.1],
];

echo "Aare-Städtevergleich heute\n";

// Vor der Schleife: Platzhalter für die bisher wärmste Stadt.
$waermste = null;

// Jede Stadt durchlaufen, eine Zeile ausgeben und die wärmste Stadt merken.
foreach ($staedte as $stadt) {
    $label = bewerteTemperatur($stadt['temperatur_c']);

    echo $stadt['stadt'] . ': '
        . $stadt['temperatur_c'] . ' °C  -> '
        . $label . "\n";

    // Ist diese Stadt wärmer als die bisher wärmste?
    if ($waermste === null || $stadt['temperatur_c'] > $waermste['temperatur_c']) {
        $waermste = $stadt;
    }
}

echo "\n";
echo 'Wärmste Stadt: ' . $waermste['stadt']
    . ' (' . $waermste['temperatur_c'] . " °C)\n";
