<?php
/**
 * Code-Along 07: Eigener JSON-Endpunkt (Lösung)
 *
 * Aus den drei heruntergeladenen Dateien bauen wir EINEN JSON-Endpunkt mit dem
 * Jahres-Höchstwert je Stadt.
 *
 * Datenvertrag: { "stadt": "Bern", "jahr": 2022, "temperatur_max": 34.6 }
 */

// Welche Stadt steckt in welcher Datei?
$staedte = [
    'Bern'   => 'data/bern.json',
    'Zürich' => 'data/zuerich.json',
    'Chur'   => 'data/chur.json',
];

// Hier sammeln wir die fertigen Einträge aller Städte.
$messungen = [];

foreach ($staedte as $stadt => $pfad) {

    // 1. Datei -> PHP-Array.
    $data = json_decode(file_get_contents($pfad), true);

    // 2. Die beiden parallelen Listen.
    $dates = $data['daily']['time'];
    $temps = $data['daily']['temperature_2m_max'];

    // 3. Pro Jahr den höchsten Wert finden.
    $maxProJahr = [];
    for ($i = 0; $i < count($dates); $i++) {
        $jahr = (int) substr($dates[$i], 0, 4); // "2022-07-19" -> 2022
        $wert = $temps[$i];

        if ($wert === null) {
            continue; // vereinzelt fehlende Tage überspringen
        }
        if (!isset($maxProJahr[$jahr]) || $wert > $maxProJahr[$jahr]) {
            $maxProJahr[$jahr] = $wert;
        }
    }

    // 4. Einträge nach Datenvertrag bauen und sammeln.
    foreach ($maxProJahr as $jahr => $wert) {
        $messungen[] = [
            'stadt'          => $stadt,
            'jahr'           => $jahr,
            'temperatur_max' => $wert,
        ];
    }
}

// 5. Als JSON-Endpunkt ausgeben. JSON_PRETTY_PRINT macht die Ausgabe im Browser
//    lesbar, JSON_UNESCAPED_UNICODE zeigt "Zürich" statt "Zürich".
header('Content-Type: application/json; charset=utf-8');
echo json_encode($messungen, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
