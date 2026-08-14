<?php
/**
 * Vorlage für die Zugangsdaten zur Datenbank.
 *
 * Diese Datei liegt im Hauptordner des Kurses und gilt für alle Code-Alongs
 * und Übungen. Es gibt sie also genau einmal.
 *
 * So legst du deine eigene Fassung an – im Hauptordner:
 *
 *     cp config.template.php config.php
 *
 * config.php steht in .gitignore und wird nie hochgeladen. Diese Vorlage ohne
 * Werte bleibt im Repository, damit alle wissen, welche Angaben nötig sind.
 */

// --- Zugangsdaten -----------------------------------------------------------
//
// Die Datenbank läuft auf deinem eigenen Rechner, gestartet mit MAMP. Die Werte
// stehen in MAMP und in phpMyAdmin, wo du die Datenbank angelegt hast.
//
// Benutzer und Passwort sind lokal beide 'root'. Bei $dbname steht der Name,
// den du in phpMyAdmin vergeben hast.
//
// Wichtig: '127.0.0.1' und nicht 'localhost'.
// Bei 'localhost' verbindet sich PHP nicht über den Port, sondern über eine
// Socket-Datei – und sucht sie an einer Stelle, an der MAMP keine anlegt.
// Die Folge ist die Meldung «SQLSTATE[HY000] [2002] No such file or directory».
// '127.0.0.1' erzwingt die Verbindung über den Port, und dann stimmt alles.

$host     = '127.0.0.1';
$dbname   = '';
$username = 'root';
$password = 'root';

// --- DSN: die Adresse der Datenbank -----------------------------------------
//
// DSN heisst Data Source Name. Er sagt PDO, welche Datenbank wo liegt.
// charset=utf8mb4 sorgt dafür, dass Umlaute richtig ankommen.
//
// MAMP legt MySQL auf Port 8889. Lies den Wert in MAMP nach, wenn die
// Verbindung nicht zustande kommt – auf Windows steht dort oft 3306.

$dsn = "mysql:host=$host;port=8889;dbname=$dbname;charset=utf8mb4";

// --- Optionen für PDO -------------------------------------------------------

$options = [
    // Fehler brechen laut ab, statt still zu scheitern. Wichtigste Zeile hier.
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,

    // Zeilen kommen als assoziative Arrays zurück: $row['location'].
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

    // Platzhalter werden von der Datenbank selbst eingesetzt, nicht von PHP.
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// --- Später: auf einem Webhosting -------------------------------------------
//
// Im Deployment-Teil am Ende des Kurses zieht dein Projekt auf einen Webserver
// um. Dann bekommst du dort eine eigene Datenbank, und genau diese Datei
// bekommt andere Werte:
//
// $host     = 'localhost';   // die Datenbank läuft dort neben deinen Dateien
// $username = '...';         // aus dem Panel des Hostings
// $password = '...';         // aus dem Panel des Hostings
//
// $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";   // ohne port
//
// Der übrige Code bleibt unverändert. Genau dafür stehen die Zugangsdaten in
// einer eigenen Datei.
