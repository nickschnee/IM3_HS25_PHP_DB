<?php
/**
 * Der fertige Endpunkt aus Code-Along 14.
 *
 * Warum liegt er hier noch einmal? Weil Frontend und Endpunkt aus demselben
 * Ordner ausgeliefert werden müssen. Ein fetch() aus index.html darf ohne
 * Zusatzaufwand nur die eigene Adresse anfragen – gleicher Host, gleicher Port.
 * Genau so sieht es später auch im Projekt aus: index.html, script.js und
 * unload.php liegen nebeneinander.
 *
 * Kommentiert ist diese Datei in Code-Along 14. Heute wird sie nicht
 * verändert, sondern benutzt.
 *
 * Voraussetzung: Die Tabellen cities und heat_summers sind gefüllt
 * (Code-Along 12, load.php einmal aufrufen).
 */

header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/../../../config.php';

function normalizeSummer(array $row): array
{
    return [
        'city' => $row['city'],
        'year' => (int) $row['year'],
        'measurement_days' => (int) $row['measurement_days'],
        'hot_days' => (int) $row['hot_days'],
        'max_temperature_c' => $row['max_temperature_c'] === null
            ? null
            : (float) $row['max_temperature_c'],
    ];
}

$city = trim($_GET['city'] ?? '');

try {
    $pdo = new PDO($dsn, $username, $password, $options);

    $sql = 'SELECT c.name AS city,
                   hs.year,
                   hs.measurement_days,
                   hs.hot_days,
                   hs.max_temperature_c
            FROM heat_summers AS hs
            JOIN cities AS c ON c.id = hs.city_id';

    $params = [];

    if ($city !== '') {
        $sql .= ' WHERE c.name = :city';
        $params['city'] = $city;
    }

    $sql .= ' ORDER BY hs.year, c.name';

    $statement = $pdo->prepare($sql);
    $statement->execute($params);

    $rows = $statement->fetchAll();

    $data = array_map('normalizeSummer', $rows);

    echo json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
} catch (Throwable $error) {
    http_response_code(500);
    error_log('unload.php: ' . $error->getMessage());

    echo json_encode([
        'error' => 'Daten konnten nicht geladen werden.',
    ]);
}
