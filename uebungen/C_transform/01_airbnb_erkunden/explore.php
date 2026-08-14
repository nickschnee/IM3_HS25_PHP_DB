<?php
/**
 * 01 – Airbnb-Daten holen & erkunden (Startcode)
 *
 * Dieses Skript transformiert nichts. Es zählt nur, was in den Spalten steht.
 *
 * Im Browser öffnen: explore.php
 *
 * Die Werkzeuge sind fertig: countValues() zählt Textwerte, printNumbers()
 * beschreibt Zahlenspalten. Deine Aufgabe ist, sie auf die richtigen Spalten
 * loszulassen und die Befunde aufzuschreiben.
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

// TODO 1: Gib alle Spaltennamen aus.
// Tipp: array_keys($listings[0]) liefert die Schlüssel der ersten Zeile.

// TODO 2: Schau dir mindestens drei Textspalten an.
// Beispiel: printTop(countValues($listings, 'room_type'), 'Spalte "room_type"', 20);
// Sinnvoll sind ausserdem: neighbourhood_group, neighbourhood.

// TODO 3: Schau dir mindestens drei Zahlenspalten an.
// Beispiel: printNumbers($listings, 'price');
// Sinnvoll sind ausserdem: minimum_nights, availability_365,
// number_of_reviews, calculated_host_listings_count.

// TODO 4: Wie aktuell sind die Angebote?
// Zähle mit einer foreach-Schleife, wie viele Angebote pro Jahr zuletzt
// bewertet wurden - und wie viele nie.
//
// Tipp: substr($listing['last_review'], 0, 4) gibt das Jahr als Text.
// Tipp: Zähle in ein Array $byYear[$jahr] = ($byYear[$jahr] ?? 0) + 1;
// Tipp: krsort($byYear) sortiert nach Jahr absteigend.
