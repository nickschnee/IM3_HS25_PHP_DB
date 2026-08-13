<?php
/**
 * Code-Along 10: Shark-Daten transformieren – Startcode
 *
 * Fragen:
 * 1. Welche identifizierte Hai-Kategorie kommt in bestätigten, unprovozierten
 *    Vorfällen von 1950–2018 am häufigsten vor?
 * 2. Bei welcher vereinheitlichten Aktivitätsgruppe wurden die meisten dieser
 *    Vorfälle erfasst?
 *
 * Wichtig: Häufigkeit im Datensatz ist nicht dasselbe wie Risiko.
 */

$rawAttacks = include __DIR__ . '/extract.php';

$yearFrom = 1950;
$yearTo = 2018;
$topN = 10;

function normalizeSpecies(string $raw): ?string
{
    // TODO: Nur explizit vereinbarte Kategorien zuordnen.
    // Unklare oder rein generische Angaben bleiben null.
    return null;
}

function normalizeActivity(string $raw): ?string
{
    // TODO: Ähnliche Schreibweisen zu wenigen Aktivitätsgruppen verbinden.
    return null;
}

$audit = [
    'input_rows' => count($rawAttacks),
    'excluded_invalid_year' => 0,
    'excluded_outside_period' => 0,
    'excluded_not_unprovoked' => 0,
    'included_incidents' => 0,
    'species_classified' => 0,
    'species_unclassified' => 0,
    'activity_classified' => 0,
    'activity_unclassified' => 0,
];

// TODO 1: Filtere Zeitraum und Vorfalltyp.
// TODO 2: Normalisiere nur Art und Aktivität – Fatal wird für diese Fragen
//         nicht gebraucht.
// TODO 3: Zähle Arten und Aktivitäten getrennt.
// TODO 4: Sortiere beide Rankings und behalte je die Top 10.
// TODO 5: Erzeuge gleich aufgebaute Ergebniszeilen nach Datenvertrag:
//         dimension, rank, category, incidents.
// TODO 6: Ergänze Abdeckungswerte und unbekannte Rohwerte im Audit.

$rankingRows = [];

return [
    'questions' => [
        'Welche identifizierte Hai-Kategorie kommt am häufigsten vor?',
        'Bei welcher Aktivitätsgruppe wurden die meisten Vorfälle erfasst?',
    ],
    'data' => $rankingRows,
    'audit' => $audit,
];
