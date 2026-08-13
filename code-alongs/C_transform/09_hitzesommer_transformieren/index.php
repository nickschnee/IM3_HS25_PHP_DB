<?php
/**
 * Kontrollansicht für den Transform.
 *
 * transform.php selbst liefert weiterhin ein PHP-Array für den nächsten
 * ETL-Schritt. Nur diese Ansicht kodiert es temporär als JSON.
 */

header('Content-Type: application/json; charset=utf-8');

$result = include __DIR__ . '/transform.php';

echo json_encode(
    $result,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR
);
