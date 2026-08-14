<?php
/**
 * Code-Along 15: Shark-Ranglisten ausliefern (Unload) – Lösung
 *
 * Für Dozierende: Die Nummern verweisen auf die TODOs im Startcode
 * ../unload.php. Wer Code-Along 14 gemacht hat, erkennt das Gerüst wieder – die
 * Kommentare beschränken sich deshalb auf das, was hier anders ist.
 *
 * Datenfluss dieser Datei:
 *
 *   Anfrage aus dem Browser     GET /unload.php?dimension=shark_category
 *     -> geprüfter Parameter    zwei gültige Werte, sonst 400
 *       -> SELECT               eine Tabelle, kein JOIN
 *         -> Datenvertrag       rank_position heisst wieder rank
 *           -> JSON-Antwort     17 Zeilen oder eine Rangliste davon
 */

// ---------------------------------------------------------------------------
// TODO 1 und 2 (Teil 1): Header und Zugangsdaten
// ---------------------------------------------------------------------------
//
// Vier Ordner nach oben, weil diese Datei zusätzlich in solution/ liegt.

header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/../../../../config.php';

// ---------------------------------------------------------------------------
// TODO 5: Die Typen festlegen
// ---------------------------------------------------------------------------
//
// Kürzer als beim Hitzesommer: Hier gibt es keine Dezimalzahl und kein Feld,
// das null sein darf. Zwei Texte, zwei Zahlen.
//
// Die Funktion bleibt trotzdem, und zwar aus dem zweiten Grund, der schon in
// Code-Along 14 genannt wurde: An genau einer Stelle steht, welche Felder die
// Antwort hat. Wer den Vertrag ändern will, ändert diese Funktion.

function normalizeRanking(array $row): array
{
    return [
        'dimension' => $row['dimension'],
        'rank' => (int) $row['rank'],
        'category' => $row['category'],
        'incidents' => (int) $row['incidents'],
    ];
}

// ---------------------------------------------------------------------------
// TODO 8: Einen unbekannten Wert abweisen
// ---------------------------------------------------------------------------
//
// Hier liegt der eigentliche Unterschied zum Hitzesommer.
//
// Beim Hitzesommer war ?city=Atlantis eine sinnvolle Frage mit leerer Antwort:
// Es hätte diese Stadt geben können. Die Antwort war [] mit Status 200.
//
// ?dimension=fische ist etwas anderes. Es gibt genau zwei Ranglisten, und
// «fische» ist keine davon. Die Frage selbst ist falsch gestellt – meistens ein
// Tippfehler im Frontend. Darauf antwortet man mit 400 «Bad Request»:
//
//   200 + []  Die Frage war in Ordnung, es gibt nur nichts dazu.
//   400       Die Frage war falsch gestellt.
//   500       Bei uns ist etwas kaputt.
//
// Eine leere Liste wäre hier die unfreundlichste Antwort: Das Frontend zeigt
// ein leeres Diagramm und niemand erfährt, dass der Parametername falsch war.
//
// Die Liste der gültigen Werte darf in der Fehlermeldung stehen. Sie ist keine
// Interna, sondern genau die Auskunft, die der fragenden Seite weiterhilft.
//
// Nebenbei ist diese Prüfung der Grund, warum der Wert später gefahrlos in die
// Abfrage darf: Was hier durchkommt, ist einer von zwei bekannten Texten.
// Der Platzhalter unten bleibt trotzdem – aus Gewohnheit und weil sich
// Prüfungen im Lauf eines Projekts ändern.

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
    // -----------------------------------------------------------------------
    // TODO 2 (Teil 2): Verbindung aufbauen
    // -----------------------------------------------------------------------

    $pdo = new PDO($dsn, $username, $password, $options);

    // -----------------------------------------------------------------------
    // TODO 3: Die Abfrage schreiben
    // -----------------------------------------------------------------------
    //
    // Kein JOIN: Die 17 Zeilen stehen in einer einzigen Tabelle. Das ist keine
    // Vereinfachung, sondern die Folge der Entscheidung aus Block D – bei zwei
    // verschiedenen dimension-Werten lohnt sich keine zweite Tabelle.
    //
    // Dafür kommt die Umbenennung aus Code-Along 13 zurück, diesmal in die
    // andere Richtung:
    //
    //   beim Laden:      'rank_position' => $row['rank']    Vertrag -> Tabelle
    //   beim Ausliefern:  rank_position AS `rank`           Tabelle -> Vertrag
    //
    // Und das reservierte Wort schlägt noch einmal zu: `AS rank` ohne Backticks
    // ist auf MySQL 8 ein Syntaxfehler, denn RANK() ist eine eingebaute
    // Funktion. Ein Alias ist ein Name, und für Namen gelten dieselben Regeln
    // wie für Spalten. Die Backticks sagen der Datenbank: Das ist ein Name,
    // keine Funktion.
    //
    // ORDER BY hat hier zwei Felder, weil ohne Filter beide Ranglisten kommen:
    // erst nach Rangliste gruppieren, darin nach Platz sortieren.

    $sql = 'SELECT dimension,
                   rank_position AS `rank`,
                   category,
                   incidents
            FROM shark_rankings';

    // -----------------------------------------------------------------------
    // TODO 7: Den Filter anhängen
    // -----------------------------------------------------------------------
    //
    // Gleiches Muster wie beim Hitzesommer: WHERE nur dann, wenn ein Wert da
    // ist, und der Wert reist als Parameter getrennt vom SQL-Text.

    $params = [];

    if ($dimension !== '') {
        $sql .= ' WHERE dimension = :dimension';
        $params['dimension'] = $dimension;
    }

    $sql .= ' ORDER BY dimension, rank_position';

    // -----------------------------------------------------------------------
    // TODO 4 und 6: Lesen und antworten
    // -----------------------------------------------------------------------
    //
    // Ab hier ist alles wortgleich zu Code-Along 14. Das ist der Punkt des
    // zweiten Durchgangs: Der Endpunkt ist immer dieselbe Kette, nur die
    // Abfrage und der Vertrag ändern sich.

    $statement = $pdo->prepare($sql);
    $statement->execute($params);

    $rows = $statement->fetchAll();

    $data = array_map('normalizeRanking', $rows);

    echo json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
} catch (Throwable $error) {
    // -----------------------------------------------------------------------
    // TODO 8 (Teil 2): Die Fehlerantwort
    // -----------------------------------------------------------------------
    //
    // Unverändert aus Code-Along 14: lauter Status, echte Meldung ins Log,
    // kurze Auskunft nach draussen.

    http_response_code(500);
    error_log('unload.php (sharks): ' . $error->getMessage());

    echo json_encode([
        'error' => 'Daten konnten nicht geladen werden.',
    ]);
}
