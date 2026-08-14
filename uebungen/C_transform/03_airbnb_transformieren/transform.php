<?php
/**
 * 03 – Airbnb-Daten transformieren (Startcode)
 *
 * Deine Datenfrage (aus Übung 02, hier nochmals hinschreiben):
 *
 *   ...
 *
 * Diese Datei gibt nichts aus. Sie gibt ein PHP-Array zurück, das index.php
 * als JSON ausliefert - genau wie im Code-Along.
 *
 * Die Struktur unten ist ein Vorschlag. Feldnamen, Regeln und Kennzahlen
 * ersetzt du durch deine eigenen: Sie folgen aus deiner Frage, nicht umgekehrt.
 */

$rawListings = include __DIR__ . '/extract.php';

// Die Regeln aus deiner Datenfrage. Sie stehen zuoberst, damit man sie ändern
// kann, ohne den Code zu durchsuchen - und damit sie im Resultat sichtbar sind.
$activeSince = '2024-01-01';
$highAvailabilityDays = 180;

// Jeder Ausschlussgrund wird einzeln gezählt. Ohne diese Zahlen kannst du
// nachher nicht prüfen, ob dein Filter das tut, was du wolltest.
$audit = [
    'input_rows' => count($rawListings),
    'excluded_no_area' => 0,
    'excluded_hotel_room' => 0,
    'excluded_inactive' => 0,
    'included_listings' => 0,
];

$byArea = [];

foreach ($rawListings as $listing) {
    // TODO 1: Filtere die Zeilen, die deine Frage nicht meint.
    // Zähle jeden Ausschluss im passenden $audit-Feld und springe mit
    // continue zur nächsten Zeile.
    //
    // Tipp Datum: Die Spalte last_review steht als JJJJ-MM-TT da. Damit
    // funktioniert der Vergleich direkt als Text:
    //   if ($lastReview === '' || $lastReview < $activeSince) { ... }

    // TODO 2: Zähle die übrig gebliebenen Angebote pro Gebiet.
    // Das Gebiet ist der Schlüssel im Array $byArea, damit du es in der
    // Schleife wiederfindest:
    //   $byArea[$area]['listings'] = ($byArea[$area]['listings'] ?? 0) + 1;

    // TODO 3: Zähle zusätzlich die Angebote, die deine Kennzahl betreffen -
    // zum Beispiel ganze Wohnungen und davon die mit hoher Verfügbarkeit.
}

// TODO 4: Baue aus den Zählern gleich aufgebaute Ergebniszeilen nach deinem
// Datenvertrag. Anteile mit round(..., 1) auf eine Nachkommastelle.
$areaRows = [];

// TODO 5: Sortiere die Zeilen so, wie deine Frage es verlangt, und lege fest,
// was bei Gleichstand gilt.
// Tipp: usort($areaRows, fn ($a, $b) => $b['feld'] <=> $a['feld']);

// TODO 6: Ergänze die Gesamtzahlen im Audit (z. B. Anzahl Gebiete und der
// Gesamtanteil über alle Gebiete).

return [
    'source' => 'Inside Airbnb, <Stadt>, Stand <Datum>',
    'rules' => [
        'active_since' => $activeSince,
        'high_availability_days' => $highAvailabilityDays,
    ],
    'limitation' => '...',
    'audit' => $audit,
    'areas' => $areaRows,
];
