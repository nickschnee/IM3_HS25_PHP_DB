<?php
/**
 * Lösung – 01 Airbnb-Daten holen & erkunden
 *
 * Eine mögliche Fassung. Deine darf anders aussehen: Es zählt, dass du für
 * jede Spalte, die du später brauchst, weisst, was drinsteht.
 *
 * Im Browser öffnen: solution/explore.php
 */

header('Content-Type: text/plain; charset=utf-8');

$listings = include __DIR__ . '/extract.php';

/**
 * Zählt, wie oft jeder Wert einer Spalte vorkommt.
 * Rückgabe: absteigend sortiert, Schlüssel ist der Rohwert.
 */
function countValues(array $rows, string $column): array
{
    $counts = [];

    foreach ($rows as $row) {
        $value = trim((string) ($row[$column] ?? ''));

        if ($value === '') {
            $value = '(leer)';
        }

        $counts[$value] = ($counts[$value] ?? 0) + 1;
    }

    arsort($counts);

    return $counts;
}

function printTop(array $counts, string $title, int $limit): void
{
    $total = array_sum($counts);
    $distinct = count($counts);

    echo "\n";
    echo str_repeat('=', 70) . "\n";
    echo "{$title}\n";
    echo str_repeat('=', 70) . "\n";
    echo "{$distinct} verschiedene Werte in {$total} Zeilen\n\n";

    $shown = 0;

    foreach ($counts as $value => $count) {
        if ($shown >= $limit) {
            break;
        }

        $share = $total > 0 ? round($count / $total * 100, 1) : 0;
        printf("%6d  %5s%%  %s\n", $count, $share, $value);
        $shown++;
    }

    $rest = $distinct - $shown;

    if ($rest > 0) {
        echo "\n... und {$rest} weitere Werte, die je seltener vorkommen.\n";
    }
}

/**
 * Beschreibt eine Zahlenspalte: leere Werte, Spannweite, Median.
 *
 * Der Median ist hier wichtiger als der Durchschnitt: Ein einziges Angebot für
 * 20'000 pro Nacht verschiebt den Durchschnitt, den Median nicht.
 */
function printNumbers(array $rows, string $column): void
{
    $values = [];
    $empty = 0;

    foreach ($rows as $row) {
        $raw = trim((string) ($row[$column] ?? ''));

        if ($raw === '' || !is_numeric($raw)) {
            $empty++;
            continue;
        }

        $values[] = (float) $raw;
    }

    sort($values);
    $count = count($values);

    echo "\n";
    echo str_repeat('=', 70) . "\n";
    echo "Spalte \"{$column}\" – Zahlen\n";
    echo str_repeat('=', 70) . "\n";
    echo "leer oder keine Zahl: {$empty}\n";

    if ($count === 0) {
        echo "Diese Spalte enthält keine einzige Zahl.\n";
        return;
    }

    $zeros = count(array_filter($values, fn ($value) => $value === 0.0));

    printf("Werte vorhanden:      %d\n", $count);
    printf("Minimum:              %s\n", $values[0]);
    printf("Median:               %s\n", $values[(int) ($count / 2)]);
    printf("Maximum:              %s\n", $values[$count - 1]);
    printf("davon genau 0:        %d\n", $zeros);
}

echo "Inside Airbnb – Datenerkundung\n";
echo count($listings) . " Angebote eingelesen.\n";

// Aufgabe 2: Welche Spalten gibt es überhaupt?
echo "\nSpalten:\n";
foreach (array_keys($listings[0]) as $column) {
    echo "  - {$column}\n";
}

// Aufgabe 3: Textspalten. Wenige Werte -> ganze Liste, viele Werte -> Top-Liste.
printTop(countValues($listings, 'room_type'), 'Spalte "room_type" – alle Werte', 20);
printTop(countValues($listings, 'neighbourhood_group'), 'Spalte "neighbourhood_group" – alle Werte', 20);
printTop(countValues($listings, 'neighbourhood'), 'Spalte "neighbourhood" – die 15 häufigsten', 15);

// Aufgabe 4: Zahlenspalten. Hier zeigt sich, ob eine Spalte brauchbar ist.
printNumbers($listings, 'price');
printNumbers($listings, 'minimum_nights');
printNumbers($listings, 'availability_365');
printNumbers($listings, 'number_of_reviews');
printNumbers($listings, 'calculated_host_listings_count');

// Aufgabe 5: Wie aktuell sind die Angebote? Ein Angebot ohne letzte Bewertung
// wurde vielleicht seit Jahren nicht gebucht - es steht aber trotzdem im
// Datensatz und zählt bei jeder naiven Auszählung mit.
$byYear = [];
$withoutReview = 0;

foreach ($listings as $listing) {
    $lastReview = trim((string) ($listing['last_review'] ?? ''));

    if ($lastReview === '') {
        $withoutReview++;
        continue;
    }

    $year = substr($lastReview, 0, 4);
    $byYear[$year] = ($byYear[$year] ?? 0) + 1;
}

krsort($byYear);

echo "\n";
echo str_repeat('=', 70) . "\n";
echo "Jahr der letzten Bewertung\n";
echo str_repeat('=', 70) . "\n\n";

printf("%10s  %5d\n", 'nie', $withoutReview);

foreach ($byYear as $year => $count) {
    printf("%10s  %5d  %s\n", $year, $count, str_repeat('#', (int) ($count / 20)));
}
