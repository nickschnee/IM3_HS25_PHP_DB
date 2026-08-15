<?php
/**
 * Datenerkundung für Code-Along 10.
 *
 * Bevor ihr Regeln aufschreibt, müsst ihr wissen, was überhaupt in den Daten
 * steht. Dieses Skript transformiert nichts. Es zählt nur, welche Rohwerte
 * vorkommen und wie oft.
 *
 * Im Browser öffnen: explore.php
 *
 * Die Fragen dazu:
 * - Wie viele verschiedene Schreibweisen gibt es pro Spalte?
 * - Welche Werte sind so häufig, dass sie eine eigene Kategorie verdienen?
 * - Welche Werte sagen in Wahrheit «wir wissen es nicht»?
 */

header('Content-Type: text/plain; charset=utf-8');

$rawAttacks = include __DIR__ . '/extract.php';

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

        printf("%6d  %s\n", $count, $value);
        $shown++;
    }

    $rest = $distinct - $shown;

    if ($rest > 0) {
        echo "\n... und {$rest} weitere Werte, die je seltener vorkommen.\n";
    }
}

echo "Shark Attack File – Datenerkundung\n";
echo count($rawAttacks) . " Zeilen eingelesen.\n";

// Wenige Werte: hier lohnt sich die vollständige Liste.
printTop(countValues($rawAttacks, 'Type'), 'Spalte "Type" – alle Werte', 50);

// Sehr viele Werte: hier sieht man das eigentliche Problem.
printTop(countValues($rawAttacks, 'Species'), 'Spalte "Species" – die 40 häufigsten', 40);
printTop(countValues($rawAttacks, 'Activity'), 'Spalte "Activity" – die 40 häufigsten', 40);

// Die Ortsangabe. Anders als Species und Activity ist sie erstaunlich sauber –
// aber eben nur erstaunlich sauber und nicht sauber. Achtet auf drei Sorten
// von Einträgen:
//
// - Schreibweisen desselben Landes ("FIJI" und "Fiji");
// - Namen, die gar kein Land sind ("NEW BRITAIN" ist eine Insel);
// - Tippfehler, die wie ein Land aussehen.
printTop(countValues($rawAttacks, 'Country'), 'Spalte "Country" – die 30 häufigsten', 30);

// Wie verteilt sich der Datensatz über die Zeit? Das ist die Grundlage für die
// Entscheidung, welchen Zeitraum ihr überhaupt betrachten könnt.
//
// Alles vor 1900 wird zu einer Zeile zusammengefasst: Dort stehen pro Jahrzehnt
// nur ein bis zwei Fälle, und die Liste würde sonst zwei Bildschirme füllen.
$byDecade = [];
$beforeCutoff = 0;
$withoutYear = 0;
$cutoffYear = 1900;

foreach ($rawAttacks as $attack) {
    $yearRaw = trim((string) ($attack['Year'] ?? ''));

    if ($yearRaw === '' || !is_numeric($yearRaw) || (int) $yearRaw === 0) {
        $withoutYear++;
        continue;
    }

    $year = (int) $yearRaw;

    if ($year < $cutoffYear) {
        $beforeCutoff++;
        continue;
    }

    $decade = (int) ($year / 10) * 10;
    $byDecade[$decade] = ($byDecade[$decade] ?? 0) + 1;
}

ksort($byDecade);

echo "\n";
echo str_repeat('=', 70) . "\n";
echo "Vorfälle pro Jahrzehnt\n";
echo str_repeat('=', 70) . "\n\n";

printf("%10s  %5d\n", 'vor ' . $cutoffYear, $beforeCutoff);

foreach ($byDecade as $decade => $count) {
    printf("%10s  %5d  %s\n", $decade . 'er', $count, str_repeat('#', (int) ($count / 20)));
}

printf("\n%10s  %5d\n", 'ohne Jahr', $withoutYear);
echo "\nDas letzte Jahrzehnt ist angebrochen und nicht vollständig – genau wie\n";
echo "der letzte Sommer im Hitzesommer-Datensatz.\n";
