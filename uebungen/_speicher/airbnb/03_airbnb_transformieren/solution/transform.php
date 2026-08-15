<?php
/**
 * Lösung – 03 Airbnb-Daten transformieren
 *
 * Eine mögliche Fassung für die Datenfrage aus Übung 02:
 *
 *   «In welchen Zürcher Kreisen besteht das Airbnb-Angebot am stärksten aus
 *    ganzen Wohnungen – und wie viele davon sind mindestens ein halbes Jahr
 *    im Voraus buchbar? (Stand 30.06.2026)»
 *
 * Deine Lösung wird anders aussehen, weil deine Frage anders ist. Prüfbar ist
 * sie an denselben drei Punkten:
 *
 * 1. Jede Filterregel steht im Code und wird einzeln gezählt.
 * 2. Jede Ergebniszeile ist gleich aufgebaut.
 * 3. Die Audit-Zahlen gehen auf: rein = ausgeschlossen + drin.
 *
 * Datenfluss dieser Datei
 * -----------------------
 *
 *   3308 CSV-Zeilen, ein Angebot pro Zeile      (aus extract.php)
 *     -> 2134 aktive Wohn-Angebote mit Kreis
 *       -> 12 Kreis-Zeilen mit Anteilen         (nach Anteil sortiert)
 */

$rawListings = include __DIR__ . '/extract.php';

// Die Regeln aus der Datenfrage. Sie stehen zuoberst und werden am Schluss
// unter `rules` mit ausgegeben, damit die Auswahl im Resultat sichtbar bleibt.
$activeSince = '2024-01-01';
$highAvailabilityDays = 180;

$audit = [
    'input_rows' => count($rawListings),
    'excluded_no_area' => 0,
    'excluded_hotel_room' => 0,
    'excluded_inactive' => 0,
    'included_listings' => 0,
];

/**
 * Sammelt pro Kreis drei Zähler. Der Kreis ist der Schlüssel, damit wir ihn
 * in der Schleife wiederfinden, ohne jedes Mal zu suchen.
 */
$byArea = [];

foreach ($rawListings as $listing) {
    $area = trim((string) ($listing['neighbourhood_group'] ?? ''));

    // Regel 1: Ohne Gebietszuordnung kann das Angebot nicht verglichen werden.
    if ($area === '') {
        $audit['excluded_no_area']++;
        continue;
    }

    $roomType = trim((string) ($listing['room_type'] ?? ''));

    // Regel 2: Ein Hotelzimmer ist kein Wohnraum. Die Frage handelt von
    // Wohnungen, also fliegen Hotelzimmer raus - und nicht etwa still in die
    // Kategorie «kein ganzes Objekt».
    if ($roomType === 'Hotel room') {
        $audit['excluded_hotel_room']++;
        continue;
    }

    $lastReview = trim((string) ($listing['last_review'] ?? ''));

    // Regel 3: Ohne Bewertung seit $activeSince gilt das Angebot als inaktiv.
    // Der Vergleich funktioniert als Textvergleich, weil das Datum im Format
    // JJJJ-MM-TT steht: '2023-12-31' < '2024-01-01' ist in dieser Schreibweise
    // auch als Zeichenkette wahr.
    //
    // Achtung, das ist eine Annahme: Eine fehlende Bewertung heisst nicht
    // sicher «nicht vermietet». Sie ist nur der beste Hinweis, den dieser
    // Datensatz hergibt.
    if ($lastReview === '' || $lastReview < $activeSince) {
        $audit['excluded_inactive']++;
        continue;
    }

    $audit['included_listings']++;

    if (!isset($byArea[$area])) {
        $byArea[$area] = [
            'listings' => 0,
            'entire_homes' => 0,
            'entire_homes_high_availability' => 0,
        ];
    }

    $byArea[$area]['listings']++;

    if ($roomType !== 'Entire home/apt') {
        continue;
    }

    $byArea[$area]['entire_homes']++;

    $availability = (int) ($listing['availability_365'] ?? 0);

    if ($availability >= $highAvailabilityDays) {
        $byArea[$area]['entire_homes_high_availability']++;
    }
}

// Aus den Zählern werden gleich aufgebaute Ergebniszeilen.
$areaRows = [];

foreach ($byArea as $area => $counts) {
    $areaRows[] = [
        'area' => $area,
        'listings' => $counts['listings'],
        'entire_homes' => $counts['entire_homes'],
        'entire_homes_share' => round($counts['entire_homes'] / $counts['listings'] * 100, 1),
        'entire_homes_high_availability' => $counts['entire_homes_high_availability'],
    ];
}

// Sortierung: höchster Anteil zuerst, bei Gleichstand das grössere Gebiet.
usort($areaRows, function (array $a, array $b): int {
    return [$b['entire_homes_share'], $b['listings']]
        <=> [$a['entire_homes_share'], $a['listings']];
});

$audit['areas'] = count($areaRows);
$audit['entire_homes_total'] = array_sum(array_column($areaRows, 'entire_homes'));
$audit['entire_homes_share_total'] = $audit['included_listings'] > 0
    ? round($audit['entire_homes_total'] / $audit['included_listings'] * 100, 1)
    : null;

return [
    'source' => 'Inside Airbnb, Zürich, Stand 2026-06-30',
    'rules' => [
        'active_since' => $activeSince,
        'high_availability_days' => $highAvailabilityDays,
        'excluded_room_types' => ['Hotel room'],
    ],
    'limitation' => 'Die Daten zeigen Inserate, keine Buchungen und keine Umsätze.',
    'audit' => $audit,
    'areas' => $areaRows,
];
