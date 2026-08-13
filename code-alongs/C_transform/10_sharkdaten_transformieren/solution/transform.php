<?php
/**
 * Code-Along 10: Shark-Daten transformieren – eine mögliche Lösung
 *
 * Die Kategorien sind bewusst klein und explizit. Eine unbekannte Art wird
 * nicht geraten. Andere fachlich begründete Mappings sind möglich, müssen aber
 * dokumentiert und auditiert werden.
 */

$rawAttacks = include __DIR__ . '/../extract.php';

$yearFrom = 1950;
$yearTo = 2018;
$topN = 10;

function normalizeSpecies(string $raw): ?string
{
    $value = strtolower(trim($raw));

    if (
        $value === ''
        || str_contains($value, 'not confirmed')
        || str_contains($value, 'questionable')
        || str_contains($value, 'invalid')
        || str_contains($value, 'unknown')
        || str_contains($value, 'unidentified')
        || str_contains($value, 'possibly')
        || str_contains($value, 'possiby')
        || str_contains($value, 'probably')
        || str_contains($value, 'thought to involve')
        || str_contains($value, 'may have')
        || str_contains($value, 'believed')
        || str_contains($value, 'suspect')
        || str_contains($value, 'said to')
        || str_contains($value, 'either')
        || preg_match('/\bor\b/', $value) === 1
    ) {
        return null;
    }

    // Spezifische Begriffe stehen vor allgemeineren Begriffen.
    $patterns = [
        'White shark' => ['white shark', 'great white'],
        'Tiger shark' => ['tiger shark'],
        'Bull / Zambesi shark' => ['bull shark', 'zambesi shark'],
        'Sand tiger / Raggedtooth / Grey nurse shark' => [
            'sand tiger',
            'raggedtooth',
            'grey nurse',
        ],
        'Blacktip shark' => ['blacktip'],
        'Wobbegong' => ['wobbegong'],
        'Blue shark' => ['blue shark'],
        'Bronze whaler / Copper shark' => ['bronze whaler', 'copper shark'],
        'Lemon shark' => ['lemon shark'],
        'Hammerhead' => ['hammerhead'],
        'Mako shark' => ['mako'],
    ];

    foreach ($patterns as $category => $needles) {
        foreach ($needles as $needle) {
            if (str_contains($value, $needle)) {
                return $category;
            }
        }
    }

    return null;
}

function normalizeActivity(string $raw): ?string
{
    $value = strtolower(trim($raw));

    if ($value === '') {
        return null;
    }

    // Die Reihenfolge verhindert z. B., dass Spearfishing nur Fishing wird.
    if (str_contains($value, 'spearfish')) {
        return 'Spearfishing';
    }

    if (str_contains($value, 'surf fish')) {
        return 'Fishing';
    }

    if (
        str_contains($value, 'surf')
        || str_contains($value, 'boogie board')
        || str_contains($value, 'body board')
        || str_contains($value, 'bodyboard')
        || str_contains($value, 'kite board')
    ) {
        return 'Surfing & board sports';
    }

    if (
        str_contains($value, 'swim')
        || str_contains($value, 'bathing')
        || str_contains($value, 'wading')
        || str_contains($value, 'standing')
        || str_contains($value, 'walking')
        || str_contains($value, 'treading water')
        || str_contains($value, 'floating')
    ) {
        return 'Swimming & wading';
    }

    if (
        str_contains($value, 'diving')
        || str_contains($value, 'snorkel')
        || str_contains($value, 'scuba')
    ) {
        return 'Diving & snorkeling';
    }

    if (str_contains($value, 'fish') || str_contains($value, 'angling')) {
        return 'Fishing';
    }

    if (
        str_contains($value, 'paddl')
        || str_contains($value, 'kayak')
        || str_contains($value, 'canoe')
        || str_contains($value, 'rowing')
    ) {
        return 'Paddling';
    }

    if (
        str_contains($value, 'boat')
        || str_contains($value, 'sailing')
        || str_contains($value, 'yacht')
    ) {
        return 'Boating';
    }

    return null;
}

function incrementCount(array &$counts, string $category): void
{
    $counts[$category] = ($counts[$category] ?? 0) + 1;
}

function makeRankingRows(
    array $counts,
    string $dimension,
    int $limit
): array {
    $rows = [];

    foreach ($counts as $category => $incidents) {
        $rows[] = [
            'dimension' => $dimension,
            'category' => $category,
            'incidents' => $incidents,
        ];
    }

    usort($rows, function (array $a, array $b): int {
        $byCount = $b['incidents'] <=> $a['incidents'];
        return $byCount !== 0 ? $byCount : $a['category'] <=> $b['category'];
    });

    $rows = array_slice($rows, 0, $limit);

    foreach ($rows as $index => &$row) {
        $row = [
            'dimension' => $row['dimension'],
            'rank' => $index + 1,
            'category' => $row['category'],
            'incidents' => $row['incidents'],
        ];
    }
    unset($row);

    return $rows;
}

function mostFrequentValues(array $counts, int $limit): array
{
    arsort($counts);
    $result = [];

    foreach (array_slice($counts, 0, $limit, true) as $value => $count) {
        $result[] = ['raw_value' => $value, 'count' => $count];
    }

    return $result;
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

$speciesCounts = [];
$activityCounts = [];
$unmappedSpeciesCounts = [];

foreach ($rawAttacks as $attack) {
    $yearRaw = trim((string) ($attack['Year'] ?? ''));

    if ($yearRaw === '' || !is_numeric($yearRaw)) {
        $audit['excluded_invalid_year']++;
        continue;
    }

    $year = (int) $yearRaw;
    if ($year < $yearFrom || $year > $yearTo) {
        $audit['excluded_outside_period']++;
        continue;
    }

    if (trim((string) ($attack['Type'] ?? '')) !== 'Unprovoked') {
        $audit['excluded_not_unprovoked']++;
        continue;
    }

    $audit['included_incidents']++;

    $speciesRaw = trim((string) ($attack['Species'] ?? ''));
    $species = normalizeSpecies($speciesRaw);
    $activity = normalizeActivity((string) ($attack['Activity'] ?? ''));

    if ($species === null) {
        $audit['species_unclassified']++;
        $label = $speciesRaw === '' ? '(empty)' : $speciesRaw;
        incrementCount($unmappedSpeciesCounts, $label);
    } else {
        $audit['species_classified']++;
        incrementCount($speciesCounts, $species);
    }

    if ($activity === null) {
        $audit['activity_unclassified']++;
    } else {
        $audit['activity_classified']++;
        incrementCount($activityCounts, $activity);
    }
}

$rankingRows = [
    ...makeRankingRows($speciesCounts, 'shark_category', $topN),
    ...makeRankingRows($activityCounts, 'activity_group', $topN),
];

$included = $audit['included_incidents'];
$audit['species_coverage_percent'] = $included === 0
    ? 0.0
    : round($audit['species_classified'] / $included * 100, 1);
$audit['activity_coverage_percent'] = $included === 0
    ? 0.0
    : round($audit['activity_classified'] / $included * 100, 1);
$audit['most_frequent_unmapped_species'] = mostFrequentValues(
    $unmappedSpeciesCounts,
    10
);
$audit['output_rows'] = count($rankingRows);

return [
    'questions' => [
        'Welche identifizierte Hai-Kategorie kommt am häufigsten vor?',
        'Bei welcher Aktivitätsgruppe wurden die meisten Vorfälle erfasst?',
    ],
    'limits' => 'Häufigkeiten im GSAF-Datensatz; keine Aussage über Risiko oder Kausalität.',
    'rules' => [
        'year_from' => $yearFrom,
        'year_to' => $yearTo,
        'incident_type' => 'Unprovoked',
        'top_n' => $topN,
    ],
    'data' => $rankingRows,
    'audit' => $audit,
];
