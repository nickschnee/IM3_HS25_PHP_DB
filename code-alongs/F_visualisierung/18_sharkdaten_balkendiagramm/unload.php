<?php
/**
 * Der fertige Endpunkt aus Code-Along 15.
 *
 * Er liegt hier mit, damit Frontend und Endpunkt über dieselbe Adresse laufen.
 * Heute wird er nicht verändert, sondern benutzt – vor allem seine
 * Fehlerantwort.
 *
 * Zwei Ranglisten in einer Tabelle:
 *
 *   /unload.php                          alle 17 Zeilen
 *   /unload.php?dimension=shark_category 10 Zeilen
 *   /unload.php?dimension=activity_group  7 Zeilen
 *   /unload.php?dimension=fische         Status 400 mit den gültigen Werten
 *
 * Voraussetzung: Die Tabelle shark_rankings ist gefüllt
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

try {
    $pdo = new PDO($dsn, $username, $password, $options);

    $sql = 'SELECT dimension,
                   rank_position AS `rank`,
                   category,
                   incidents
            FROM shark_rankings';

    $params = [];

    if ($dimension !== '') {
        $sql .= ' WHERE dimension = :dimension';
        $params['dimension'] = $dimension;
    }

    $sql .= ' ORDER BY dimension, rank_position';

    $statement = $pdo->prepare($sql);
    $statement->execute($params);

    $rows = $statement->fetchAll();

    $data = array_map('normalizeRanking', $rows);

    echo json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
} catch (Throwable $error) {
    http_response_code(500);
    error_log('unload.php (sharks): ' . $error->getMessage());

    echo json_encode([
        'error' => 'Daten konnten nicht geladen werden.',
    ]);
}
