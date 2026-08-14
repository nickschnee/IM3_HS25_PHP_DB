# Unload: Von der Datenbank zum JSON-Endpunkt

## Lernziel

Nach diesem Input könnt ihr einen kleinen, stabilen JSON-Endpunkt bauen, der

- die gespeicherten Daten mit PDO und `SELECT` liest;
- zwei Tabellen mit `JOIN` zusammenführt;
- nur die Felder des Datenvertrags ausliefert;
- JSON-Typen ausdrücklich normalisiert;
- mit einem optionalen `$_GET`-Parameter filtert;
- leere Listen und technische Fehler als JSON beantwortet.

## Der zentrale Gedanke

Das Datenmodell ist für die konsistente Speicherung gebaut. Der JSON-Endpunkt
ist für das Frontend gebaut. `unload.php` übersetzt deshalb zwischen beiden
Formen, ohne die fachliche Bedeutung des Datenvertrags zu verändern.

```text
Datenbank -> SELECT + JOIN -> PHP-Array -> Datenvertrag -> JSON -> Chart.js
```

`Unload` ist die Kursbezeichnung für diesen Schritt nach ETL. Der Begriff wird
auf den Folien bewusst als Kursbegriff erklärt und nicht als allgemeiner vierter
ETL-Schritt ausgegeben.

## Datensatz und Anschluss

Der Foliensatz arbeitet mit denselben Hitzesommer-Daten wie die Blöcke davor:

- `code-alongs/C_transform/09_hitzesommer_transformieren/` liefert eine Zeile
  pro Stadt und vollständigem Sommer;
- `code-alongs/D_load/12_hitzesommer_laden/` speichert 258 Zeilen in den
  Tabellen `cities` und `heat_summers`;
- `unload.php` führt beide Tabellen wieder zu einer flachen JSON-Liste zusammen.

Die Feldnamen und Variablen auf den Folien entsprechen diesem Schema. Die
Code-Etappen ergeben zusammen das Muster für den geführten Aufbau von
`unload.php` an Tag 7.

## Bewusste Begrenzung

Der Einstieg verwendet genau einen optionalen Filter:

```text
GET /unload.php?city=Bern
```

Ohne Parameter liefert der Endpunkt alle drei Städte. Weitere Parameter wie
`from`, `to` oder `limit` werden nur ergänzt, wenn die Datenfrage des Projekts
sie tatsächlich braucht. Dadurch bleibt pro Schritt nur ein neues Konzept
sichtbar.

## Aufbau des Foliensatzes

Der Foliensatz hat eine Orientierung und danach ein Kapitel pro Baustein des
Endpunkts. Jeder Kapiteltrenner nennt den Baustein, jede Code-Folie zeigt oben
rechts, womit gerade gearbeitet wird: `Datenbank`, `SQL`, `PHP`, `URL + PHP`
oder `Browser`. So bleibt sichtbar, wann die Sprache wechselt.

| Folien | Inhalt |
| --- | --- |
| 1–3 | Titel, Inhalt und Position in der ETL+U-Kette |
| 4–6 | Begriff «Unload», Anfrage und Antwort, Datenvertrag |
| 7 | Landkarte: die vier Bausteine des Endpunkts |
| 8–12 | Bausteine 1 und 2: `JOIN`, `SELECT` und PDO |
| 13–16 | Baustein 3: Header, `json_encode` und reine JSON-Ausgabe |
| 17–19 | Ausnahmefall: leere Liste und Fehlerantwort |
| 20–23 | Baustein 4: Stadtfilter mit `$_GET` und Prepared Statement |
| 24–25 | Tests und Projekt-Checkliste |
| 26 | Kernaussage und Ausblick auf Chart.js |

Die vier Bausteine sind: **1 Verbinden** (`config.php`, PDO), **2 Lesen**
(`SELECT` mit `JOIN`), **3 Antworten** (Header, `json_encode`) und
**4 Filtern** (`$_GET`). Nur Baustein 2 ist SQL, alles andere ist PHP.

Richtwert für den Theorie-Input: 35 Minuten. Danach werden dieselben vier
Bausteine geführt umgesetzt und sofort im Browser getestet.

## Didaktischer Ablauf

1. Den Datenvertrag gegen das Mock-JSON prüfen.
2. Mit `JOIN` aus zwei Tabellen eine flache Ergebniszeile machen.
3. Die Verbindung aus `config.php` übernehmen und mit PDO lesen.
4. Die PDO-Ausgabe mit `var_dump` nur während des Code-Alongs prüfen.
5. Header und `json_encode` ergänzen.
6. Den Stadtfilter mit einem Prepared Statement hinzufügen.
7. Vier URLs testen: ohne Filter, Bern, Zürich und eine unbekannte Stadt.
8. Mock-Datei und echten Endpunkt im Viererteam vergleichen.

Die Folie «Vier Bausteine ergeben den Endpunkt» ist die Landkarte: Sie kommt
direkt nach dem Datenvertrag, und jedes folgende Kapitel ist einer dieser
Bausteine. Dieselbe Reihenfolge wird danach im Code-Along umgesetzt.

Die Typen der JSON-Felder stehen bewusst nicht mehr auf den Folien. Sie werden
im Code-Along beim Aufbau von `unload.php` gezeigt, damit der Input pro Folie
nur eine Sprache und ein Konzept enthält.

## Nach Änderungen prüfen

```bash
python3 theorie/_foliendesign/pruefe-folien.py theorie/E_unload/index.html
node ~/.claude/skills/revealjs-1.0.0/scripts/check-overflow.js theorie/E_unload/index.html
npx decktape reveal theorie/E_unload/index.html slides.pdf --size 1280x720
```
