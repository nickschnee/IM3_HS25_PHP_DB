# Transform-Entscheidungen auf Papier

**Ziel:** Bevor ihr Code oder KI benutzt, übersetzt ihr eine Datenfrage in
prüfbare Transform-Regeln und einen kleinen Datenvertrag.

**Richtwert:** 45 Minuten

## Material

- ein Ausdruck oder Screenshot von 5–10 echten Rohdatensätzen;
- Spaltennamen der Quelle;
- eure aktuelle Datenfrage;
- Papier oder ein gemeinsames Board.

## Teil 1 – Die Frage schärfen (10')

Schreibt die Frage so genau, dass Zeitraum, Ort, Vergleich und Messgrösse klar
sind.

```text
Zu ungenau: Welche Aktivität ist bei Haien am gefährlichsten?

Präziser: Bei welcher vereinheitlichten Aktivitätsgruppe wurden in den
bestätigten, unprovozierten Vorfällen von 1950–2018 die meisten Fälle erfasst?
```

Notiert direkt darunter, was die Daten **nicht** beantworten können.

## Teil 2 – Eine Ergebniszeile (5')

Vervollständigt den Satz:

> Eine Zeile nach unserem Transform beschreibt …

Beispiele: eine Stadt in einem Sommer; einen einzelnen bereinigten Vorfall;
eine Aktivitätsgruppe mit der Anzahl Vorfälle.

## Teil 3 – Entscheidungstabelle (15')

Füllt pro Regel eine Zeile aus.

| Rohfeld / Problem | Unsere Regel | Begründung aus der Frage | Was geht verloren? |
| --- | --- | --- | --- |
| Datum | nur Monate 6–8 | Frage handelt vom Sommer | übrige Monate |
| `Species` leer | `null`, nicht raten | Art ist unbekannt | Fall fehlt im Art-Ranking |
| … | … | … | … |

Markiert Regeln, bei denen ihr unsicher seid. Diese Fälle werden nicht still
entschieden, sondern mit Dozierenden, Quelle oder Fachpersonen geklärt.

## Teil 4 – Datenvertrag (10')

Zeichnet eine Ergebniszeile und notiert den Datentyp.

| Feld | Typ | Beispiel | Darf fehlen? |
| --- | --- | --- | --- |
| `city` | string | `Bern` | nein |
| `year` | int | `2023` | nein |
| `hot_days` | int | `17` | nein |

Schreibt danach genau **einen** Beispieldatensatz als JSON.

## Teil 5 – Audit (5')

Definiert Zahlen, die euer Programm nach dem Transform zeigen muss:

- Anzahl Rohdatensätze;
- Anzahl ausgeschlossene Datensätze pro Grund;
- Anzahl Resultate;
- Anzahl unbekannte oder nicht zugeordnete Werte;
- drei Vorher-/Nachher-Beispiele.

## Abgabe

Fotografiert das Blatt oder übertragt es in `TRANSFORM.md`. Erst danach wird der
Transform-Code selbst oder mit KI-Unterstützung erstellt.
