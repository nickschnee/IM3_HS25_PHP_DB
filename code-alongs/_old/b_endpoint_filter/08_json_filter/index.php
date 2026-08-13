<?php
/**
 * Code-Along 08: Endpunkt filtern mit $_GET
 *
 * Wir bauen auf CA 07 auf: Der Endpunkt liefert bereits alle Städte. Jetzt
 * soll er auf ?stadt=bern nur noch Bern liefern.
 *
 *   Frontend  ->  ?stadt=bern  ->  unser PHP-Endpunkt      (das ist $_GET)
 *
 * $_GET verarbeitet also Parameter, die UNSER Skript bekommt.
 */

// --- Aus CA 07 (schon fertig): alle Jahres-Höchstwerte bauen ----------------
$staedte = [
    'Bern'   => 'data/bern.json',
    'Zürich' => 'data/zuerich.json',
    'Chur'   => 'data/chur.json',
];

$messungen = [];
foreach ($staedte as $stadt => $pfad) {
    $data  = json_decode(file_get_contents($pfad), true);
    $dates = $data['daily']['time'];
    $temps = $data['daily']['temperature_2m_max'];

    $maxProJahr = [];
    for ($i = 0; $i < count($dates); $i++) {
        $jahr = (int) substr($dates[$i], 0, 4);
        $wert = $temps[$i];
        if ($wert === null) {
            continue;
        }
        if (!isset($maxProJahr[$jahr]) || $wert > $maxProJahr[$jahr]) {
            $maxProJahr[$jahr] = $wert;
        }
    }
    foreach ($maxProJahr as $jahr => $wert) {
        $messungen[] = ['stadt' => $stadt, 'jahr' => $jahr, 'temperatur_max' => $wert];
    }
}
// --- Ende CA 07 -------------------------------------------------------------

// 1. Den Filter aus der URL lesen: ?stadt=...   (Tipp: $_GET['stadt'] ?? '')


// 2. Wenn ein Filter gesetzt ist: $messungen auf diese Stadt reduzieren.
//    Gross-/Kleinschreibung mit strtolower() ignorieren, damit ?stadt=bern
//    auch "Bern" trifft.


// 3. Als JSON ausgeben (Header + json_encode). Ohne Filter kommen alle Städte,
//    bei unbekannter Stadt eine leere Liste [].
