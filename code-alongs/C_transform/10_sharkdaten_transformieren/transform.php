<?php
/**
 * Code-Along 10: Shark-Daten transformieren – Startcode
 *
 * Dieses Gerüst braucht ihr nur, wenn ihr ohne KI arbeitet. Der reguläre Weg
 * läuft über explore.php und eure eigene Spezifikation in KI_PROMPT.md.
 *
 * Eure Fragen:
 * 1. ...
 * 2. ...
 * 3. ...
 *
 * Die Werte unten sind Platzhalter aus einer möglichen Fassung. Ersetzt sie
 * durch eure eigenen Entscheidungen – Zeitraum und Kategorien folgen aus eurer
 * Frage, nicht umgekehrt.
 *
 * Wichtig: Häufigkeit im Datensatz ist nicht dasselbe wie Risiko.
 */

$rawAttacks = include __DIR__ . '/extract.php';

// Die Nachschlagetabelle für die Ländercodes ist vorbereitet: 50 Einträge,
// Schreibweise aus dem Datensatz -> ISO-3166-Code. Sie ist bewusst
// unvollständig – was fehlt, findet ihr über das Audit heraus.
$isoByCountry = json_decode(
    file_get_contents(__DIR__ . '/data/laender_iso.json'),
    true,
    512,
    JSON_THROW_ON_ERROR
);

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

function countryIso(string $raw, array $isoByCountry): ?string
{
    // TODO: Schreibweise vereinheitlichen, dann nachschlagen.
    // Was nicht in der Tabelle steht, bleibt null – nicht raten.
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
    'incidents_without_country' => 0,
    'incidents_with_iso' => 0,
];

// TODO 1: Filtere Zeitraum und Vorfalltyp.
// TODO 2: Normalisiere Art, Aktivität und Land – Fatal wird für diese Fragen
//         nicht gebraucht.
// TODO 3: Zähle Arten und Aktivitäten getrennt.
// TODO 4: Sortiere beide Rankings und behalte je die Top 10.
// TODO 5: Erzeuge gleich aufgebaute Ergebniszeilen nach Datenvertrag:
//         dimension, rank, category, incidents.
// TODO 6: Ergänze Abdeckungswerte und unbekannte Rohwerte im Audit.
// TODO 7: Zähle pro Land zusätzlich mit, welche Art und welche Aktivität dort
//         am häufigsten vorkommt. Achtung: Ein Vorfall ohne Land bleibt in den
//         beiden Ranglisten – hier gehört kein Filter hin.
// TODO 8: Erzeuge die Länderzeilen nach Datenvertrag:
//         country, iso3, incidents, top_species, top_activity.
//         Diese Liste wird nicht auf Top 10 gekürzt.

$rankingRows = [];
$countryRows = [];

return [
    'questions' => [
        'In welchen Ländern wurden die meisten Vorfälle erfasst?',
        'Welche identifizierte Hai-Kategorie kommt am häufigsten vor?',
        'Bei welcher Aktivitätsgruppe wurden die meisten Vorfälle erfasst?',
    ],
    'data' => $rankingRows,
    'countries' => $countryRows,
    'audit' => $audit,
];
