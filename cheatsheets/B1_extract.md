# Extract – Daten ins PHP-Array holen

> Block B · Code-Alongs `06_json_lesen`, `07_api_lesen`, `08_csv_lesen`,
> `09_sensor_lesen`

Extract ist der erste Schritt der Kette
`Extract -> Transform -> Load -> Datenbank -> Unload -> Chart.js`.

Die Kernaussage des Blocks:

```text
Der Extract ändert sich je nach Quelle. Das Ergebnis ist immer ein PHP-Array.
```

Hier wird nichts gerechnet, nichts umbenannt und nichts gefiltert. Das ist
Aufgabe des [Transforms](C1_transform.md).

| Quelle | Befehl | Wann |
| --- | --- | --- |
| JSON-Datei | `file_get_contents()` + `json_decode()` | heruntergeladene, historische Daten |
| Live-API | `fetchJson()` (cURL) | Daten, die sich laufend ändern |
| CSV-Datei | `fopen()` + `fgetcsv()` | Tabellen aus Portalen und Excel |
| Sensor-API | `fetchJson()` | eine Live-API wie jede andere |

## 1. JSON-Datei lesen

```php
// 1. Datei als Text einlesen
$json = file_get_contents('data/bern.json');

// 2. Text -> PHP-Array. Das true liefert assoziative Arrays statt Objekte.
$data = json_decode($json, true);

// 3. Struktur ansehen, bevor man weiterarbeitet
echo 'Schlüssel ganz oben: ' . implode(', ', array_keys($data)) . "\n";
echo "Schlüssel in 'daily': " . implode(', ', array_keys($data['daily'])) . "\n";

// 4. Die zwei parallelen Listen von Open-Meteo
$dates = $data['daily']['time'];
$temps = $data['daily']['temperature_2m_max'];
echo 'Anzahl Tage: ' . count($dates) . "\n";
```

`time[0]` gehört zu `temperature_2m_max[0]`. Die beiden Listen sind über die
Position verbunden, nicht über einen Schlüssel.

Der Pfad ist relativ zum Ordner, in dem der Server läuft. Sicherer ist
`__DIR__` – der Ordner **dieser** Datei:

```php
$json = file_get_contents(__DIR__ . '/data/bern.json');
```

## 2. Live-API lesen

Der Helfer ist vorbereitet. Ihn musst du **benutzen** können, nicht auswendig
schreiben.

```php
function fetchJson(string $url): array {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    return json_decode($response, true);
}
```

| Zeile | Bedeutung |
| --- | --- |
| `curl_init($url)` | Anfrage vorbereiten |
| `CURLOPT_RETURNTRANSFER` | Antwort als Text zurückgeben statt sofort ausgeben |
| `CURLOPT_TIMEOUT` | nach 10 Sekunden aufgeben statt ewig warten |
| `curl_exec($ch)` | Anfrage abschicken |
| `json_decode(..., true)` | Antworttext -> PHP-Array |

Benutzt wird er so:

```php
$url = 'https://api.open-meteo.com/v1/forecast'
     . '?latitude=46.948&longitude=7.447'
     . '&hourly=temperature_2m&forecast_days=1&timezone=Europe/Zurich';

$data = fetchJson($url);
```

Die URL wird über mehrere Zeilen verkettet, damit die Parameter lesbar bleiben.
Danach ist `$data` genau dasselbe wie bei der Datei: ein PHP-Array.

**Eine Sensor-API ist kein Sonderfall.** Sie liefert JSON über HTTP, also gilt
derselbe Code – nur die URL ist eine andere.

## 3. CSV-Datei lesen

```php
// 1. Datei zum Lesen öffnen
$handle = fopen('data/attacks.csv', 'r');

// 2. Kopfzeile lesen und Leerzeichen entfernen ("Species " kommt echt so vor)
$header = array_map('trim', fgetcsv($handle, null, ',', '"', ''));

// 3. Zeile für Zeile lesen, bis die Datei zu Ende ist
$attacks = [];
while (($row = fgetcsv($handle, null, ',', '"', '')) !== false) {
    if ($row[0] === '') {
        continue;   // leere Zeile überspringen
    }
    $attacks[] = array_combine($header, $row);
}
fclose($handle);
```

`array_combine()` ist der Kniff: Es verbindet die Spaltennamen mit den Werten
einer Zeile zu einem assoziativen Array. Aus

```text
['1958.07.06', 'USA', 'Surfing']    +    ['Date', 'Country', 'Activity']
```

wird `['Date' => '1958.07.06', 'Country' => 'USA', 'Activity' => 'Surfing']`.

Die Argumente `',' '"' ''` sind die Standardwerte. Wir schreiben sie hin, damit
PHP keine Deprecation-Warnung zeigt. Bei einer Datei mit Semikolon steht dort
`';'`.

**Aus einer CSV kommt jeder Wert als Text.** `'1958'` ist eine Zeichenkette,
keine Zahl. Umgewandelt wird im Transform.

## Die Quelle prüfen

Bevor eine Quelle ins Projekt kommt:

- Wie viele Datensätze sind es wirklich?
- Was bedeutet **eine Zeile**?
- Welche Felder brauchen wir für die Datenfrage, welche nie?
- Wie sehen die schlechtesten Zeilen aus – leer, `N/A`, Tippfehler?
- Darf man die Daten verwenden, und wer ist die Quelle?

Vor jedem Transform steht deshalb ein kurzer Blick in die Rohdaten, nicht nur
in die Spaltennamen.

## Fallback für den Marktstand

Wer eine Live-API benutzt, lädt sich eine Antwort **einmal als Datei herunter**
und legt sie zu den Musterdaten. Am Marktstand ist das WLAN schlecht, die API
langsam oder das Kontingent aufgebraucht – und ohne Fallback steht das Projekt
still.

## Häufige Fehler

| Symptom | Ursache |
| --- | --- |
| `file_get_contents(): Failed to open stream` | falscher Pfad – mit `__DIR__` arbeiten |
| `$data` ist `null` | Die Antwort war kein gültiges JSON. Erst `echo $json;` ansehen |
| `Trying to access array offset on null` | Der erwartete Schlüssel heisst anders – `array_keys()` prüfen |
| Alles ist `string` | normal bei CSV. Umwandeln gehört in den Transform |
| Ewiges Laden | kein Timeout gesetzt, oder die API antwortet nicht |

## Verwandte Cheatsheets

- [B2 JSON](B2_json.md) – `json_decode` und `json_encode` im Detail
- [C1 Transform](C1_transform.md) – der nächste Schritt
