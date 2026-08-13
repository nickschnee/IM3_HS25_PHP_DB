<?php
/**
 * Code-Along 08: Endpunkt filtern mit $_GET (Lösung)
 *
 *   Frontend  ->  ?stadt=bern  ->  unser PHP-Endpunkt      (das ist $_GET)
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

// 1. Filter aus der URL lesen. Ohne Parameter bleibt $filter ein leerer String.
$filter = $_GET['stadt'] ?? '';

// 2. Nur reduzieren, wenn wirklich ein Filter gesetzt ist.
if ($filter !== '') {
    $gefiltert = [];
    foreach ($messungen as $m) {
        // strtolower auf beiden Seiten: ?stadt=bern trifft auch "Bern".
        if (strtolower($m['stadt']) === strtolower($filter)) {
            $gefiltert[] = $m;
        }
    }
    $messungen = $gefiltert; // kann auch leer sein -> []
}

// 3. Ausgabe. Ohne Filter: alle Städte. Unbekannte Stadt: leere Liste [].
header('Content-Type: application/json; charset=utf-8');
echo json_encode($messungen, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
