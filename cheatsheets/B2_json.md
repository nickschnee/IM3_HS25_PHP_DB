# JSON und PHP-Array

> Block B und E · begleitet den ganzen Kurs

JSON ist eine Schreibweise für Daten, die alle Programmiersprachen lesen
können. Ein PHP-Array und ein JSON-Text enthalten dasselbe – nur in einer
anderen Form.

```text
json_decode()   JSON-Text  ->  PHP-Array      hereinkommend (Block B)
json_encode()   PHP-Array  ->  JSON-Text      hinausgehend  (Block E)
```

## Wie JSON aussieht

```json
{
  "city": "Bern",
  "year": 2023,
  "measurement_days": 92,
  "hot_days": 12,
  "max_temperature_c": 36.3
}
```

| JSON | PHP |
| --- | --- |
| `{ ... }` Objekt | assoziatives Array |
| `[ ... ]` Liste | indexiertes Array |
| `"Text"` | string – immer doppelte Anführungszeichen |
| `42`, `36.3` | int, float – **ohne** Anführungszeichen |
| `true` / `false` | bool |
| `null` | null |

Zwei Regeln, an denen JSON am häufigsten scheitert: kein Komma nach dem letzten
Eintrag, und Schlüssel immer in doppelten Anführungszeichen.

## JSON lesen

```php
$json = file_get_contents('data/bern.json');
$data = json_decode($json, true);
```

Das `true` ist wichtig. Ohne es entstehen Objekte, und der Zugriff sieht anders
aus:

```php
$data = json_decode($json, true);   // $data['daily']['time']
$data = json_decode($json);         // $data->daily->time
```

Im Kurs arbeiten wir durchgehend mit Arrays, also immer mit `true`.

Bei kaputtem JSON gibt `json_decode()` stillschweigend `null` zurück:

```php
$data = json_decode($json, true);

if ($data === null) {
    exit('Kein gültiges JSON: ' . json_last_error_msg() . "\n");
}
```

## JSON schreiben

```php
echo json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
```

| Option | Wirkung |
| --- | --- |
| `JSON_THROW_ON_ERROR` | wirft einen Fehler, statt still `false` zu liefern |
| `JSON_UNESCAPED_UNICODE` | «Zürich» bleibt Zürich statt `Zürich` |
| `JSON_PRETTY_PRINT` | mit Einrückung – nur zum Anschauen, nicht im Endpunkt |

## Liste oder Objekt?

Das ist die häufigste Überraschung. PHP entscheidet anhand der Schlüssel:

```php
json_encode([1, 2, 3]);                  // [1,2,3]           – Liste
json_encode(['a' => 1, 'b' => 2]);       // {"a":1,"b":2}     – Objekt
json_encode([0 => 'x', 2 => 'y']);       // {"0":"x","2":"y"} – Objekt!
```

Ein Array mit Lücken in der Nummerierung wird zum Objekt – und das Frontend,
das eine Liste erwartet, bricht ab. Genau dafür gibt es `array_values()`:

```php
$data = array_values(array_filter($rows, fn($row) => $row['hot_days'] > 0));
```

## Typen sind Teil des Datenvertrags

```php
'year' => (int) $row['year'],                    //  2023   nicht "2023"
'max_temperature_c' => (float) $row['max_temperature_c'],
```

Aus der Datenbank kommt ein `DECIMAL` als Text zurück. Ohne Umwandlung steht im
JSON `"36.3"` statt `36.3`. Chart.js rechnet damit oft trotzdem – der
Datenvertrag ist aber gebrochen.

Ein fehlender Wert bleibt `null` und wird nicht zu `0`.

## Eine Antwort ist nur JSON

```php
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
```

Kein `echo 'fertig'`, kein `var_dump()`, kein Leerzeichen vor `<?php`. Jedes
zusätzliche Zeichen macht die Antwort ungültig, und das Frontend meldet
«Unexpected token».

Zum Prüfen im Browser den Netzwerk-Tab öffnen: Steht dort `application/json`
und beginnt die Antwort mit `[` oder `{`, stimmt es.

## Verwandte Cheatsheets

- [B1 Extract](B1_extract.md) – JSON aus Datei und API lesen
- [E1 Unload](E1_unload.md) – den eigenen JSON-Endpunkt bauen
