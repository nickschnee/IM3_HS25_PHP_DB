# Transform – Rohdaten zur Datenfrage passend machen

> Block C · Code-Alongs `09_hitzesommer_transformieren`,
> `10_sharkdaten_transformieren`

Transform bedeutet: Rohdaten so umformen, dass sie **zur Datenfrage** und zum
**Datenvertrag** passen.

```text
Rohdaten + Datenfrage + begründete Regeln -> saubere Datensätze
```

Der Code ist nur die Ausführung dieser Regeln. Die wichtigste Arbeit passiert
vorher: Begriffe definieren, Entscheidungen begründen und Datenverluste sichtbar
machen.

## Die sieben Transformationsformen

Dieselbe Liste steht auf den Folien und im Werkzeugkasten der Papierübung.

| Form | Frage | Beispiel |
| --- | --- | --- |
| Filtern | Welche Zeilen gehören zur Frage? | nur Juni bis August |
| Deduplizieren | Steht dieselbe Beobachtung mehrfach da? | dasselbe Datum zweimal |
| Bereinigen | Welche Werte sind falsch, unmöglich oder fehlend? | `18C`, `-50`, `N/A` |
| Normalisieren | Welche Werte meinen dasselbe? | `Surfing`, `Boogie boarding` -> `Surfing & Boardsport` |
| Umbenennen | Wie sollen die Felder bei uns heissen? | `Rain (mm)` -> `precipitation_mm` |
| Ableiten | Welcher neue Wert folgt aus **derselben Zeile**? | Temperatur >= 30 °C -> Hitzetag |
| Aggregieren | Aus wie vielen Zeilen wird eine? | 92 Tage -> ein Sommer pro Stadt |

Ableiten und Aggregieren werden am häufigsten verwechselt: Ableiten schaut nach
rechts in derselben Zeile, Aggregieren schaut nach unten über viele Zeilen.

Felder, die niemand braucht, werden nicht eigens entfernt. Sie fehlen einfach in
der Zielstruktur, die ihr am Schluss zusammenbaut.

## Die Reihenfolge

1. Datenfrage präzisieren.
2. Einen Rohdatensatz ansehen – nicht nur die Spaltennamen.
3. Untersuchungseinheit festlegen: Was bedeutet **eine Zeile** im Resultat?
4. Transform-Regeln in Worten notieren.
5. Zielstruktur mit Feldnamen und Datentypen festlegen.
6. Code erstellen – selbst oder mit KI-Unterstützung.
7. Resultat und Datenverluste prüfen.

## Beispiel Hitzesommer

**Frage:** Wie hat sich die Anzahl Hitzetage pro meteorologischem Sommer in
Bern, Chur und Zürich seit 1940 verändert?

Festgelegte Begriffe:

- Sommer = Juni, Juli und August;
- Hitzetag = Tagesmaximum von mindestens 30 °C;
- eine Ergebniszeile = eine Stadt in einem Jahr;
- unvollständige Sommer werden nicht verglichen.

```php
$month = (int) substr($date, 5, 2);
$isSummer = in_array($month, [6, 7, 8], true);
$isHotDay = $temperatureC >= 30.0;
```

Möglicher Datenvertrag:

```json
{
  "city": "Bern",
  "year": 2023,
  "measurement_days": 92,
  "hot_days": 12,
  "max_temperature_c": 36.3
}
```

## Beispiel Shark Attacks

Die Frage «Wo ist es am gefährlichsten, und welcher Hai greift am häufigsten
an?» ist zu ungenau. Der Datensatz kennt weder alle Haiarten noch die Anzahl
Menschen, die einer Aktivität nachgehen oder an einem Strand baden. Er kann
deshalb **keine Gefahr oder Wahrscheinlichkeit** berechnen.

Präzisere Fragen:

- In welchen Ländern wurden in den ausgewählten, bestätigten Vorfällen die
  meisten Vorfälle erfasst?
- Welche identifizierte Hai-Kategorie kommt darin am häufigsten vor?
- Bei welcher vereinheitlichten Aktivitätsgruppe wurden die meisten dieser
  Vorfälle erfasst?

Typische Regeln:

- Zeitraum und Vorfalltyp bewusst begrenzen;
- leere und unklare Haiangaben nicht erfinden, sondern als `null` zählen;
- Schreibvarianten über eine dokumentierte Mapping-Funktion vereinheitlichen;
- Aktivitäten zu wenigen nachvollziehbaren Gruppen zusammenfassen;
- Ländernamen nicht kategorisieren, sondern auf ISO-Codes nachschlagen;
- zeigen, wie viele Datensätze durch Filter oder fehlende Angaben wegfallen.

### Nachschlagen statt einordnen

Bei Arten und Tätigkeiten erfindet ihr die Kategorien selbst. Bei Ländern,
Währungen oder Gemeinden gibt es sie schon – dort wird nachgeschlagen:

```php
function countryIso(string $raw, array $isoByCountry): ?string
{
    // strtoupper zuerst: "FIJI" und "Fiji" sind dasselbe Land.
    return $isoByCountry[strtoupper(trim($raw))] ?? null;
}
```

Zwei Gründe dafür. Erstens ist ein Code eindeutig, ein Name nur eine
Schreibweise. Zweitens braucht ihr den Code, sobald die Daten mit etwas anderem
verbunden werden sollen – etwa mit einer Kartendatei.

Was nicht in der Tabelle steht, wird `null` und landet im Audit. Dort findet
ihr dann Fundstücke wie `COLUMBIA` (Tippfehler) oder `NEW BRITAIN` (kein Land,
sondern eine Insel).

## `null` ist ehrlicher als eine erfundene Antwort

```php
function normalizeFatal(string $raw): ?bool
{
    return match (strtoupper(trim($raw))) {
        'Y' => true,
        'N' => false,
        default => null,
    };
}
```

Ein unbekannter Wert soll unbekannt bleiben. `false`, `0`, `''` und `null`
bedeuten nicht dasselbe.

## PHP-Bausteine in den Transform-Skripten

Diese Schreibweisen tauchen in den Code-Alongs auf. Ihr müsst sie **lesen**
können, nicht auswendig schreiben.

### Eine Datei gibt einen Wert zurück

```php
// extract.php, letzte Zeile
return $rawLocations;

// transform.php, erste Zeile
$rawLocations = include __DIR__ . '/extract.php';
```

`return` steht hier ausserhalb einer Funktion und beendet die Datei. `include`
führt die andere Datei aus und liefert deren `return` als Wert – die Datei
verhält sich wie ein Funktionsaufruf.

`__DIR__` ist der Ordner **dieser** Datei, nicht das Verzeichnis, in dem der
Server gestartet wurde. Der Punkt verkettet Text:
`__DIR__ . '/extract.php'`.

### `??` – nimm das hier, sonst das da

```php
$dates = $location['source']['daily']['time'] ?? [];
$counts[$category] = ($counts[$category] ?? 0) + 1;
```

Der rechte Wert greift, wenn der Schlüssel fehlt oder `null` ist. Bei einem
leeren String oder `0` greift er **nicht** – dafür braucht es eine eigene
Prüfung.

### Datentypen erzwingen

```php
$month = (int) substr($date, 5, 2);     // "07"   -> 7
$temperatureC = (float) $temperature;   // "31.2" -> 31.2
$yearRaw = (string) $attack['Year'];    // 1985   -> "1985"
```

Aus einer CSV kommt alles als Text. `(int) 'keine Angabe'` ergibt stillschweigend
`0`, deshalb vorher `is_numeric()` prüfen.

### Zählen, dann `continue`

```php
if (!in_array($month, $summerMonths, true)) {
    $audit['outside_summer']++;   // erst zählen
    continue;                     // dann überspringen
}
```

Kein Wegwerfen ohne Zähler. Das `true` in `in_array` vergleicht zusätzlich den
Datentyp, sonst gilt auch `"6"` als Treffer.

### Sortieren mit `usort` und `<=>`

```php
usort($rows, function (array $a, array $b): int {
    return [$a['year'], $a['city']] <=> [$b['year'], $b['city']];
});
```

`<=>` gibt -1, 0 oder 1 zurück. Bei zwei Arrays vergleicht PHP elementweise:
zuerst `year`, bei Gleichstand `city`. Für absteigend `$b` vor `$a` schreiben.

### Text vereinheitlichen und durchsuchen

```php
$value = strtolower(trim($raw));          // Rand weg, klein geschrieben
str_contains($value, 'tiger shark');      // enthält den Textteil?
preg_match('/\bor\b/', $value) === 1;     // "or" als GANZES Wort
```

`\b` sind Wortgrenzen. Ohne sie träfe die Regel auch das «or» in «north».

### Häufigste Werte finden

```php
arsort($counts);                          // absteigend, Schlüssel bleiben
array_slice($counts, 0, 10, true);        // die ersten zehn, Schlüssel bleiben
```

### Referenzen: `&` vor einem Parameter

```php
function incrementCount(array &$counts, string $category): void
{
    $counts[$category] = ($counts[$category] ?? 0) + 1;
}
```

Ohne `&` bekäme die Funktion eine Kopie und die Zählung ginge draussen
verloren. Dasselbe Zeichen gibt es in `foreach ($rows as &$row)`; danach gehört
immer ein `unset($row);`, sonst zeigt die Variable weiter auf die letzte Zeile.

### Abbrechen statt still falsch rechnen

```php
if (count($dates) !== count($temperatures)) {
    throw new RuntimeException("Datum und Temperatur passen nicht zusammen.");
}
```

Wenn eine Grundannahme gebrochen ist, hilft kein Zähler. Dann ist ein Abbruch
besser als ein plausibles falsches Resultat.

## Audit: Transform kontrollieren

Mindestens diese Zahlen festhalten:

```text
Datensätze am Anfang
- wegen Filter ausgeschlossen
- wegen ungültiger Werte ausgeschlossen
= Datensätze nach Transform
davon mit unbekannter Kategorie
```

Zusätzlich prüfen:

- fünf zufällige Vorher-/Nachher-Beispiele;
- häufigste Rohwerte, die keine Kategorie erhalten haben;
- unerwartete Minimal- und Maximalwerte;
- Summe der Gruppen gegen Anzahl eingeschlossener Datensätze;
- Datentypen gegen den Datenvertrag.

## KI sinnvoll einsetzen

Gib der KI nicht einfach eine Datei mit dem Auftrag «Räume das auf». Gib ihr:

1. die präzise Datenfrage;
2. Spaltennamen und wenige repräsentative Beispielzeilen;
3. deine Transform-Regeln;
4. den gewünschten Datenvertrag;
5. gewünschte Audit-Zahlen und Tests.

Lass dir Annahmen und unklare Fälle auflisten. Prüfe den Code und besonders die
Mappings an echten Rohwerten. Keine Passwörter, Zugangsdaten oder schützenswerte
Personendaten in ein KI-Tool kopieren.

## Wichtig für ETL+U

`transform.php` gibt ein **PHP-Array** mit Daten und Audit zurück. Es erzeugt
noch keinen Endpunkt und schreibt noch nichts in die Datenbank.

```php
return [
    'data' => $transformedRows,
    'audit' => $audit,
];
```

Der Load-Schritt verwendet daraus `$transformResult['data']`. `json_encode()`
gehört im Kurs zum späteren Unload-Endpunkt. Für eine sichtbare Kontrollausgabe
darf ein separates `index.php` das ganze Transform-Resultat temporär als JSON
anzeigen.

## Verwandte Cheatsheets

- [B1 Extract](B1_extract.md) – woher die Rohdaten kommen
- [A4 Arrays](A4_arrays.md) – `array_map`, `array_filter`, `usort`
- [D1 Datenmodell und SQL](D1_datenmodell_sql.md) – die Zielstruktur wird zur Tabelle
