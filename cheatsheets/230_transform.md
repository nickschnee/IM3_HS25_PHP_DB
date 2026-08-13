# Cheatsheet: Transform

Transform bedeutet: Rohdaten so umformen, dass sie **zur Datenfrage** und zum
**Datenvertrag** passen.

```text
Rohdaten + Datenfrage + begründete Regeln -> saubere Datensätze
```

Der Code ist nur die Ausführung dieser Regeln. Die wichtigste Arbeit passiert
vorher: Begriffe definieren, Entscheidungen begründen und Datenverluste sichtbar
machen.

## Die sechs häufigsten Transform-Schritte

| Schritt | Frage | Beispiel |
| --- | --- | --- |
| Filtern | Welche Zeilen gehören zur Frage? | nur Juni bis August |
| Auswählen | Welche Felder brauchen wir? | Datum und Tagesmaximum |
| Umbenennen | Wie sollen die Felder bei uns heissen? | `Species ` -> `shark_category` |
| Normalisieren | Welche Werte meinen dasselbe? | `Surfing`, `Boogie boarding` -> `Surfing & Boardsport` |
| Ableiten | Welcher neue Wert folgt aus vorhandenen Werten? | Temperatur >= 30 °C -> Hitzetag |
| Aggregieren | Auf welcher Ebene vergleichen wir? | ein Datensatz pro Stadt und Jahr |

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

Die Frage «Welcher Hai greift am häufigsten an?» ist zu ungenau. Der Datensatz
kennt weder alle Haiarten noch die Anzahl Menschen, die einer Aktivität
nachgehen. Er kann deshalb **keine Gefahr oder Wahrscheinlichkeit** berechnen.

Präzisere Fragen:

- Welche identifizierte Hai-Kategorie kommt in den ausgewählten, bestätigten
  Vorfällen am häufigsten vor?
- Bei welcher vereinheitlichten Aktivitätsgruppe wurden die meisten dieser
  Vorfälle erfasst?

Typische Regeln:

- Zeitraum und Vorfalltyp bewusst begrenzen;
- leere und unklare Haiangaben nicht erfinden, sondern als `null` zählen;
- Schreibvarianten über eine dokumentierte Mapping-Funktion vereinheitlichen;
- Aktivitäten zu wenigen nachvollziehbaren Gruppen zusammenfassen;
- zeigen, wie viele Datensätze durch Filter oder fehlende Angaben wegfallen.

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
