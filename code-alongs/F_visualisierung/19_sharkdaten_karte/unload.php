<?php
/**
 * Der fertige Endpunkt aus Code-Along 15.
 *
 * Er liegt hier mit, damit Frontend und Endpunkt über dieselbe Adresse laufen.
 * Heute wird er nicht verändert, sondern benutzt – vor allem seine
 * Fehlerantwort.
 *
 * Ein Endpunkt, zwei Datensätze:
 *
 *   /unload.php                          alle 17 Zeilen
 *   /unload.php?dimension=shark_category 10 Zeilen
 *   /unload.php?dimension=activity_group  7 Zeilen
 *   /unload.php?dimension=fische         Status 400 mit den gültigen Werten
 *   /unload.php?dataset=countries        120 Länderzeilen (für die Karte)
 *
 * Heute brauchen wir den zweiten Datensatz: ?dataset=countries.
 *
 * Voraussetzung: Die Tabellen shark_rankings und shark_countries sind gefüllt
 * (Code-Along 13, load.php einmal aufrufen).
 */

header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/../../../config.php';

function normalizeRanking(array $row): array
{
    return [
        'dimension' => $row['dimension'],
        'rank' => (int) $row['rank'],
        'category' => $row['category'],
        'incidents' => (int) $row['incidents'],
    ];
}

// iso3, top_species und top_activity dürfen null bleiben und werden deshalb
// nicht umgewandelt: (string) würde aus null einen leeren Text machen.
function normalizeCountry(array $row): array
{
    return [
        'country' => $row['country'],
        'iso3' => $row['iso3'],
        'incidents' => (int) $row['incidents'],
        'top_species' => $row['top_species'],
        'top_activity' => $row['top_activity'],
    ];
}

$allowedDimensions = ['shark_category', 'activity_group'];

$dimension = trim($_GET['dimension'] ?? '');

if ($dimension !== '' && !in_array($dimension, $allowedDimensions, true)) {
    http_response_code(400);

    echo json_encode([
        'error' => 'Unbekannte Rangliste.',
        'allowed' => $allowedDimensions,
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

$allowedDatasets = ['rankings', 'countries'];

$dataset = trim($_GET['dataset'] ?? 'rankings');

if (!in_array($dataset, $allowedDatasets, true)) {
    http_response_code(400);

    echo json_encode([
        'error' => 'Unbekannter Datensatz.',
        'allowed' => $allowedDatasets,
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

try {
    $pdo = new PDO($dsn, $username, $password, $options);

    $params = [];

    if ($dataset === 'countries') {
        $sql = 'SELECT country,
                       iso3,
                       incidents,
                       top_species,
                       top_activity
                FROM shark_countries
                ORDER BY incidents DESC, country';

        $normalize = 'normalizeCountry';
    } else {
        $sql = 'SELECT dimension,
                       rank_position AS `rank`,
                       category,
                       incidents
                FROM shark_rankings';

        if ($dimension !== '') {
            $sql .= ' WHERE dimension = :dimension';
            $params['dimension'] = $dimension;
        }

        $sql .= ' ORDER BY dimension, rank_position';

        $normalize = 'normalizeRanking';
    }

    $statement = $pdo->prepare($sql);
    $statement->execute($params);

    $rows = $statement->fetchAll();

    $data = array_map($normalize, $rows);

    echo json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
} catch (Throwable $error) {
    http_response_code(500);
    error_log('unload.php (sharks): ' . $error->getMessage());

    echo json_encode([
        'error' => 'Daten konnten nicht geladen werden.',
    ]);
}
