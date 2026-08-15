# Datengrafiken: Vom JSON-Endpunkt zum Diagramm

## Lernziel

Nach diesem Input könnt ihr

- die Absicht einer Grafik benennen, bevor ihr einen Diagrammtyp wählt;
- einschätzen, welche Diagrammtypen Chart.js mitbringt und welche nicht;
- Datensätze in `labels` und `datasets` umformen;
- den eigenen JSON-Endpunkt mit `fetch()` laden und die Antwort prüfen;
- ein Diagramm aktualisieren statt neu zu erzeugen.

## Der zentrale Gedanke

Chart.js kennt eure Datensätze nicht. Es will zwei Listen, die gleich lang sind
und in derselben Reihenfolge stehen:

```text
[{city, year, hot_days}, …]  ->  labels: [1940, 1941, …]  data: [0, 1, …]
```

Alles andere an Chart.js ist Konfiguration und lässt sich nachschlagen. Wer
diese Umformung verstanden hat, kann jeden Diagrammtyp bauen.

## Anschluss an das Kartenset

Die Diagrammtypen sind bewusst so eingeteilt wie im **Data Story Deck**, das im
UX-Teil verwendet wird (Phase 6 «Datengrafiken», Karten 6.1 bis 6.12). Von dort
kommen drei Dinge:

- die Phasenregel «Erst die Aussage, dann der Typ»;
- die sechs Absichten Verteilung, Zusammenhang, Vergleich, Zusammensetzung,
  Entwicklung und Verortung.

Der Foliensatz ergänzt das Kartenset um die technische Antwort: Welche dieser
zwölf Kartentypen kann Chart.js überhaupt, und was nimmt man sonst? Die Karten
bleiben die inhaltliche Referenz, die Folien sind die Umsetzung.

## Datensatz und Anschluss

Der Foliensatz arbeitet mit denselben Hitzesommer-Daten wie die Blöcke davor:

- `code-alongs/D_load/12_hitzesommer_laden/` speichert 258 Zeilen;
- `code-alongs/E_unload/14_hitzesommer_ausliefern/` liefert sie als JSON;
- `code-alongs/F_visualisierung/16_hitzesommer_liniendiagramm/` zeichnet daraus
  eine Linie pro Stadt;
- `code-alongs/F_visualisierung/17_hitzesommer_ranking/` ergänzt die Rangliste
  und die Interaktion im Browser.

Die Feldnamen, Funktionsnamen und Farben auf den Folien entsprechen den beiden
Code-Alongs.

## Bewusste Begrenzung

Auf den Folien steht kein vollständiges `options`-Objekt. Die Einstellungen sind
Fleissarbeit, liegen in den Code-Alongs fertig vor und stehen in der
Chart.js-Dokumentation. Der Input konzentriert sich auf die Entscheidungen:
Diagrammtyp, Umformung und Aktualisierung.

Karten sind ausdrücklich kein Thema. Wer eine Karte braucht, arbeitet nicht mit
Chart.js – der JSON-Endpunkt bleibt derselbe, nur das Frontend wechselt.

## Aufbau des Foliensatzes

Vier Kapitel, jedes mit eigenem Trenner. Code-Folien zeigen oben rechts, womit
gerade gearbeitet wird: `Chart.js`, `JavaScript` oder `HTML + JS`.

| Folien | Inhalt |
| --- | --- |
| 1–4 | Titel, Inhalt, Position in der Kette, «Erst die Aussage» |
| 5–9 | Kapitel 1: sechs Absichten, unsere zwei Fragen, was Chart.js kann und nicht kann |
| 10–13 | Kapitel 2: Bauplan, `labels` und `data`, ein Dataset pro Stadt |
| 14–17 | Kapitel 3: `fetch()`, die Antwort prüfen, die Übergabe vom Mock zum Endpunkt |
| 18–21 | Kapitel 4: einmal erzeugen und aktualisieren, zwei Sorten Interaktion, ein Zustand |
| 22–23 | Projekt-Checkliste, Kernaussage |

Richtwert für den Theorie-Input: 30 Minuten. Danach folgen die beiden
Code-Alongs, die dieselbe Reihenfolge nochmals durchlaufen.

## Didaktischer Ablauf

1. Fragen, was eine Linie eigentlich behauptet.
2. Die sechs Absichten sammeln und die eigene Datenfrage einordnen lassen.
3. Zeigen, welche Typen Chart.js mitbringt – und wo es aufhört.
4. Die Umformung zu `labels` und `data` an die Wandtafel schreiben.
5. `fetch()` als bekanntes Werkzeug aus IM2 wiedererkennen lassen.
6. Den Live-Server-Fehler einmal vorführen, bevor er im Code-Along auftritt.
7. Den Unterschied zwischen Server- und Browser-Interaktion im Netzwerk-Tab zeigen.

Die Folie «Chart.js will keine Datensätze» ist die Kernfolie. Sie kommt direkt
nach dem Bauplan, und alles danach hängt daran.

## Nach Änderungen prüfen

```bash
python3 theorie/_foliendesign/pruefe-folien.py theorie/F_visualisierung/index.html
node ~/.claude/skills/revealjs-1.0.0/scripts/check-overflow.js theorie/F_visualisierung/index.html
npx decktape reveal theorie/F_visualisierung/index.html slides.pdf --size 1280x720
```
