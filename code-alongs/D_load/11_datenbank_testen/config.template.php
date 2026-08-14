<?php
/**
 * Vorlage für die Zugangsdaten.
 *
 * Kopiere diese Datei zu config.php und trage deine eigenen Werte ein:
 *
 *     cp config.template.php config.php
 *
 * config.php steht in .gitignore und wird nie hochgeladen. Diese Vorlage hier
 * bleibt im Repository, damit alle wissen, welche Werte gebraucht werden.
 */

// --- Zugangsdaten -----------------------------------------------------------
//
// Alle drei Werte stehen im Hostpoint-Panel, wo du die Datenbank angelegt hast.
//
// $host bleibt 'localhost': Die Datenbank läuft auf demselben Server wie deine
// PHP-Dateien. «localhost» heisst deshalb nicht dein Laptop, sondern der
// Server, auf dem das Skript gerade läuft.

$host     = 'localhost';
$dbname   = '';
$username = '';
$password = '';

// --- DSN: die Adresse der Datenbank -----------------------------------------
//
// DSN heisst Data Source Name. Er sagt PDO, welche Datenbank wo liegt.
// charset=utf8mb4 sorgt dafür, dass Umlaute richtig ankommen.

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// --- Optionen für PDO -------------------------------------------------------

$options = [
    // Fehler brechen laut ab, statt still zu scheitern. Wichtigste Zeile hier.
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,

    // Zeilen kommen als assoziative Arrays zurück: $row['location'].
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

    // Platzhalter werden von der Datenbank selbst eingesetzt, nicht von PHP.
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// --- Nur für den lokalen Weg mit MAMP ---------------------------------------
//
// Der Kurs läuft auf dem Server. Wer zusätzlich lokal arbeiten will, ersetzt
// die $dsn-Zeile oben durch diese und nimmt 'root' als Benutzer und Passwort.
// MAMP legt MySQL auf Port 8889 statt auf den Standardport.
//
// $dsn = "mysql:host=$host;port=8889;dbname=$dbname;charset=utf8mb4";
