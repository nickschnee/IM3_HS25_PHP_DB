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
// Der Kurs läuft auf dem Server. Wer zusätzlich lokal arbeitet, setzt oben
// $host auf '127.0.0.1' und nimmt 'root' als Benutzer und Passwort. Dann diese
// $dsn-Zeile statt der obigen verwenden:
//
// $dsn = "mysql:host=$host;port=8889;dbname=$dbname;charset=utf8mb4";
//
// Wichtig: lokal '127.0.0.1' und nicht 'localhost'.
// Bei 'localhost' verbindet sich PHP nicht über den Port, sondern über eine
// Socket-Datei – und sucht sie an einer Stelle, an der MAMP keine anlegt.
// Die Folge ist die Meldung «SQLSTATE[HY000] [2002] No such file or directory».
// '127.0.0.1' erzwingt die Verbindung über den Port, und dann stimmt alles.
