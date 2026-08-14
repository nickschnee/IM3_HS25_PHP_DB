# Ablauf `15_sharkdaten_ausliefern`

> **Ziel:** Die 17 Ranking-Zeilen aus der Datenbank kommen als JSON im Browser
> an – wahlweise beide Ranglisten oder nur eine. Richtwert: 45 Minuten.

## Einordnung

Zusatzmaterial. Wer Code-Along 14 gemacht hat, kennt die vier Bausteine und
arbeitet hier schneller. Der zweite Durchgang lohnt sich trotzdem, weil andere
Daten andere Entscheidungen verlangen:

| Frage | Hitzesommer (14) | Shark (15) |
| --- | --- | --- |
| Woher kommen die Felder? | zwei Tabellen, `JOIN` | eine Tabelle |
| Heissen alle Spalten wie im Vertrag? | ja, bis auf `name AS city` | nein, ``rank_position AS `rank` `` |
| Was ist ein unbekannter Filterwert? | eine leere Liste (`200`) | eine falsche Frage (`400`) |

Die letzte Zeile ist die eigentliche Botschaft: Ob ein Filterwert unbekannt sein
*darf*, hängt an den Daten und nicht an einer Regel.

## Ausgangslage

Die 17 Zeilen liegen seit Code-Along 13 in `shark_rankings`. Ist die Tabelle
leer, dort einmal `load.php` aufrufen.

```bash
cd code-alongs/E_unload/15_sharkdaten_ausliefern
php -S localhost:8000
```

→ <http://localhost:8000/unload.php>

## Vor dem Code (10')

### Den Datenvertrag hinlegen

```json
[
  {
    "dimension": "shark_category",
    "rank": 1,
    "category": "White shark",
    "incidents": 426
  }
]
```

Zwei Fragen an die Klasse:

1. Welches Feld heisst in der Tabelle anders? (`rank` – die Spalte heisst
   `rank_position`, weil `rank` in MySQL reserviert ist.)
2. Wo haben wir das beim Laden übersetzt? (Im `execute()`-Array.) Und wo
   müssen wir es jetzt übersetzen? (Im `SELECT`, in die andere Richtung.)

### Zwei Ranglisten in einer Antwort

Ohne Filter liefert der Endpunkt beide Ranglisten in einer flachen Liste; das
Feld `dimension` trennt sie. Kurz benennen, warum wir sie nicht als zwei
verschachtelte Objekte ausliefern: Eine Liste von Datensätzen ist die Form, die
das Frontend ohne Sonderlogik verarbeiten kann – dieselbe Entscheidung wie beim
Hitzesommer.

## Schritte im Code (25')

`unload.php` enthält acht TODO-Marken. Die Bausteine 1 bis 3 laufen wie in
Code-Along 14 und dürfen zügig gehen. Zeit lassen bei zwei Stellen:

**Schritt 3 – das reservierte Wort schlägt zurück**

Bewusst zuerst `rank_position AS rank` schreiben und aufrufen. MySQL antwortet
mit «You have an error in your SQL syntax» – dieselbe Meldung wie beim
`CREATE TABLE` in Code-Along 13, und wieder nennt sie den wahren Grund nicht.
Erst dann die Backticks setzen:

```sql
SELECT dimension,
       rank_position AS `rank`,
       category,
       incidents
FROM shark_rankings
ORDER BY dimension, rank_position
```

Die Erkenntnis dahinter: Ein Alias ist ein Name, und für Namen gelten dieselben
Regeln wie für Spalten.

**Schritt 8 – die falsche Frage**

Zuerst die Frage stellen, dann den Code schreiben: Beim Hitzesommer war
`?city=Atlantis` in Ordnung und die Antwort `[]`. Warum ist `?dimension=fische`
etwas anderes?

Weil es genau zwei Ranglisten gibt. «fische» ist keine davon – das ist kein
leeres Ergebnis, sondern ein Tippfehler im Frontend. Deshalb:

| Antwort | Bedeutung |
| --- | --- |
| `200` mit `[]` | Die Frage war in Ordnung, es gibt nichts dazu |
| `400` | Die Frage war falsch gestellt |
| `500` | Bei uns ist etwas kaputt |

Die Prüfung steht vor der Datenbankabfrage, und die gültigen Werte stehen in
der Fehlermeldung. Das ist keine Interna-Preisgabe, sondern genau die Auskunft,
die der fragenden Seite hilft.

## Kontrolle (10')

| Aufruf | Erwartung |
| --- | --- |
| `/unload.php` | 17 Datensätze, beide Ranglisten |
| `/unload.php?dimension=shark_category` | 10 Datensätze, Platz 1 ist «White shark» |
| `/unload.php?dimension=activity_group` | 7 Datensätze, Platz 1 ist «Surfing & board sports» |
| `/unload.php?dimension=fische` | Status 400 mit den zwei gültigen Werten |

Im Netzwerk-Tab bei jedem Aufruf auf den Statuscode schauen – hier ist er
diesmal mehr als eine Formalie.

## Gesprächspunkte

- **Derselbe Bauplan, andere Abfrage.** Bausteine 1, 3 und 4 sind wortgleich zu
  Code-Along 14. Wer beide Dateien nebeneinanderlegt, sieht: Ein Endpunkt ist
  immer dieselbe Kette, nur `SELECT` und Datenvertrag wechseln.
- **Übersetzt wird an einer Stelle, nicht an dreien.** ``AS `rank` `` erledigt die
  Umbenennung in SQL. Man könnte sie auch in `normalizeRanking()` machen – aber
  nicht an beiden Orten, sonst sucht man den Namen später zweimal.
- **Die Grenze der Aussage reist nicht mit.** Der Satz aus dem Transform
  («Häufigkeiten, keine Aussage über Risiko») steht bewusst nicht in der
  Antwort. Er gehört in die Story, wo ihn Menschen lesen – nicht in eine
  Datenspalte, die in jeder Zeile dasselbe enthält.
- **Wann braucht ein Projekt eine Allow-List?** Immer dann, wenn ein Parameter
  eine feste Auswahl hat: Kategorie, Region, Jahr aus einer bekannten Liste.
  Bei freiem Text wie einem Ortsnamen ist die leere Liste die richtige Antwort.

## Häufige Fehler

| Meldung oder Symptom | Ursache |
| --- | --- |
| `You have an error in your SQL syntax` beim `SELECT` | `AS rank` ohne Backticks |
| `Unknown column 'rank'` | im Vertrag `rank`, in der Tabelle `rank_position` |
| beide Ranglisten durcheinander | `ORDER BY` nennt nur `rank_position`, nicht `dimension` |
| `?dimension=fische` liefert `[]` | Die Prüfung fehlt oder steht nach der Abfrage |
| `[]` bei jedem Aufruf | `load.php` aus Code-Along 13 wurde nie aufgerufen |
