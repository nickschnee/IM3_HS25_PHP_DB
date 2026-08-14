# Ablauf `16_hitzesommer_visualisieren`

> **Ziel:** Aus dem JSON-Endpunkt von gestern wird eine Seite mit zwei
> Diagrammen, die auf drei Bedienelemente reagiert. Richtwert: 90 Minuten.

## Ausgangslage

Die Kette ist bis hierher gebaut: extrahiert (Block B), transformiert
(Block C), geladen (Block D), als JSON ausgeliefert (Block E). Heute wird sie
sichtbar.

```text
unload.php  ->  fetch()  ->  umformen  ->  Chart.js
gestern         heute
```

Im Ordner liegen bereit:

| Datei | Rolle |
| --- | --- |
| `index.html` | fertig – Überschriften, Bedienelemente, zwei `<canvas>` |
| `style.css` | fertig – Gestaltung ist heute nicht das Thema |
| `script.js` | Startcode mit acht TODO-Marken |
| `unload.php` | der fertige Endpunkt aus Code-Along 14 |
| `data/heat-summers.json` | dieselben 258 Datensätze als Datei |

```bash
cd code-alongs/F_visualisierung/16_hitzesommer_visualisieren
php -S localhost:8000
```

→ <http://localhost:8000>

**Warum der Server auch für das Frontend nötig ist:** Ein `fetch()` von einer
Seite, die per Doppelklick geöffnet wurde (`file://`), blockiert der Browser.
Das lohnt sich als 30-Sekunden-Demo zu Beginn – die Fehlermeldung sucht sonst
später jemand eine Viertelstunde lang im JavaScript.

## Vor dem Code (10')

### Welches Diagramm passt zu welcher Aussage?

Zuerst die Aussagen an die Wand, dann erst die Diagrammtypen. Zwei Fragen an
die Klasse, in dieser Reihenfolge:

1. «Nimmt die Zahl der Hitzetage zu?» – eine Entwicklung über die Zeit.
2. «Welches waren die heissesten Sommer?» – eine Rangliste.

| Aussage | Diagramm | Warum |
| --- | --- | --- |
| Entwicklung über die Zeit | Linie | Die Verbindung zwischen den Punkten bedeutet etwas |
| Rangliste, Vergleich | Balken | Die Länge lässt sich direkt vergleichen |
| Anteile an einem Ganzen | Kreis, selten | Nur bei wenigen Teilen, die zusammen 100 % ergeben |

Die Gegenprobe macht es deutlich: Die zehn heissesten Sommer als Linie zu
zeichnen würde behaupten, dass 2003 in 2015 übergeht. Der Diagrammtyp ist eine
Aussage, keine Geschmacksfrage.

### Die eine Umformung, um die es heute geht

An die Wandtafel, bevor jemand tippt:

```text
[{city: 'Bern', year: 1940, hot_days: 0}, …]     was der Endpunkt liefert
labels: [1940, 1941, …]   data: [0, 2, …]        was Chart.js will
```

Chart.js kennt unsere Datensätze nicht. Es will zwei Listen, die gleich lang
sind und in derselben Reihenfolge stehen. Alles andere heute ist Beiwerk.

### Zwei Sorten Interaktion

Die drei Bedienelemente in der Seite sind absichtlich beschriftet: «fragt den
Endpunkt neu an» und «rechnet nur im Browser». Kurz sammeln, was der
Unterschied bedeutet – die Antwort kommt in Baustein 4 im Netzwerk-Tab.

## Schritte im Code (65')

`script.js` enthält acht TODO-Marken, wieder in vier Bausteinen:
`1 Holen → 2 Umformen → 3 Zeichnen → 4 Reagieren`.

### Baustein 1 – Holen (15')

1. **TODO 1:** `loadSummers()` mit `fetch()` und `await` füllen, danach in
   `reload()` einmal `console.log(summers)` schreiben. Die Konsole zeigt 258
   Objekte – das erste sichtbare Ergebnis, noch ohne Diagramm.
2. **TODO 2:** `response.ok` prüfen. Vorher den Umweg gehen: die URL absichtlich
   auf `data/heat-summer.json` (ohne `s`) ändern. Der Browser meldet
   «Unexpected token '<'» – eine Meldung, die nichts mit dem Problem zu tun
   hat. Grund: `fetch()` wirft bei 404 keinen Fehler, es ist ja eine Antwort
   angekommen, und `.json()` versucht danach, eine HTML-Fehlerseite zu lesen.

### Baustein 2 – Umformen (20')

3. **TODO 3:** `visibleSummers()` und `yearsOf()`. Beim Entdoppeln der Jahre
   kurz zeigen, warum `[...new Set(...)]` und warum die Vergleichsfunktion in
   `sort((a, b) => a - b)` nötig ist.
4. **TODO 4:** `datasetFor()` – ein Objekt mit `label`, `data` und dem Aussehen.
   Hier die Frage stellen, die man leicht überspringt: *Warum passen die Werte
   überhaupt zu den Jahren?* Weil der Endpunkt nach Jahr sortiert und jede
   Stadt jeden Sommer hat. Genau das haben wir im Transform geprüft, als wir
   auf vollständige Sommer bestanden haben.

### Baustein 3 – Zeichnen (20')

5. **TODO 5:** Das Liniendiagramm einmal erzeugen – mit leeren Daten. Die
   `options` sind vorbereitet und werden nicht Zeile für Zeile besprochen.
6. **TODO 6:** Das Balkendiagramm dazu, `topSummers()` mit `sort()` und
   `slice()`. Auf die Kopie `[...rows]` hinweisen: `sort()` verändert die
   Liste, auf der es aufgerufen wird – ohne Kopie springt danach die Linie im
   ersten Diagramm.
7. **`render()`** füllt beide Diagramme und ruft `chart.update()` auf. Hier der
   wichtigste Satz des Tages: **einmal erzeugen, danach aktualisieren.**
   Bewusst falsch machen und in `render()` ein zweites `new Chart(...)`
   schreiben: «Canvas is already in use».

An dieser Stelle steht das erste Diagramm. Kurz hinschauen, was es erzählt –
und dass es das ohne die vier Blöcke davor nicht könnte.

### Baustein 4 – Reagieren (10')

8. **TODO 7:** Eine Zeile ändern: `const DATEN_URL = ENDPUNKT;`. Aus der Datei
   wird die Datenbank, und niemand merkt es dem Diagramm an. Das ist die
   Übergabe zwischen den beiden Teams, und sie funktioniert nur, weil beide
   Seiten denselben Datenvertrag eingehalten haben.

   Danach die Stadtauswahl anschliessen und den Netzwerk-Tab offen lassen: Bei
   jeder Auswahl erscheint ein Aufruf `unload.php?city=Bern`. Der `$_GET`-Filter
   von gestern wird zum ersten Mal wirklich benutzt.

9. **TODO 8:** Messwert-Knöpfe und Jahr-Schieber. Der Netzwerk-Tab bleibt jetzt
   still: Diese beiden ändern nur den Zustand und zeichnen neu. Genau das
   sagen die kleinen Hinweise unter den Bedienelementen.

## Kontrolle (15')

| Handlung | Erwartung |
| --- | --- |
| Seite laden | «258 Sommer geladen», zwei Diagramme |
| Stadt «Bern» wählen | «86 Sommer geladen», eine Linie, Netzwerkaufruf mit `?city=Bern` |
| Stadt «Zürich» wählen | Umlaut korrekt, 86 Sommer |
| «Höchste Temperatur» klicken | Achse wechselt zu Grad, kein Netzwerkaufruf |
| Schieber auf 1990 | beide Diagramme kürzer, kein Netzwerkaufruf |
| MAMP stoppen, Stadt wechseln | verständliche Meldung in der Statuszeile |

Die Rangliste zum Schluss gemeinsam lesen: Neun der zehn stärksten Sommer
liegen nach 2000, dazwischen einmal 1947. Das ist der Moment, in dem aus einer
Datenbankabfrage eine Aussage wird – und zugleich der Moment für die Frage,
was drei Städte über die Schweiz aussagen (nichts) und was nicht im Diagramm
steht (die Messmethode, der Schwellenwert, die Definition von «Sommer»).

## Gesprächspunkte

- **Beginnt die Achse bei null?** Bei einer Anzahl ja, sonst wirkt jede
  Schwankung wie ein Sprung. Bei Temperaturen nein: Zwischen 0 und 26 Grad
  passiert in diesen Daten nichts, und die Null würde alle Unterschiede
  plattdrücken. Im Code steht dafür genau eine Zeile – die Entscheidung
  dahinter ist journalistisch, nicht technisch.
- **Wer filtert, Server oder Browser?** Der Server filtert, was viel ist; der
  Browser filtert, was schon da ist. Bei 258 Zeilen wäre beides richtig. Der
  Unterschied wird erst bei 200'000 Zeilen zwingend – und bei jedem Aufruf,
  der über ein Mobilnetz geht.
- **Die Musterdatei ist der Notvorrat.** `data/heat-summers.json` hat exakt die
  Form des Endpunkts. Damit kann das Frontend-Team arbeiten, bevor das Backend
  fertig ist – und am Marktstand ist es der Fallback, wenn die Datenbank
  streikt. Für die Ausstellung gehört Chart.js aus demselben Grund lokal in den
  Projektordner statt ans CDN.
- **Farbe ist hier Beschriftung.** Jede Stadt hat in beiden Diagrammen dieselbe
  Farbe, deshalb braucht die Rangliste keine Legende. Wer die Farben pro
  Diagramm neu vergibt, macht aus einer Lesehilfe eine Falle.
- **Leerer Zustand und Fehler gehören zum Frontend.** Ein leeres Diagramm ohne
  Text sieht aus wie ein Programmfehler. Die Statuszeile sagt in beiden Fällen,
  was los ist – dieselbe Haltung wie beim Statuscode im Backend.
- **Was das Diagramm nicht zeigt, muss daneben stehen.** Quelle, Zeitraum,
  Schwellenwert und die Grenze der Aussage stehen im Fuss der Seite. Für den
  Marktstand ist das kein Beiwerk, sondern Teil der Abgabe.

## Häufige Fehler

| Meldung oder Symptom | Ursache |
| --- | --- |
| `CORS request not http` oder Fetch blockiert | Seite per Doppelklick geöffnet statt über `php -S` |
| `Chart is not defined` | Chart.js nicht geladen – Internet weg oder Tippfehler in der CDN-Adresse |
| `Unexpected token '<'` | Antwort ist HTML statt JSON: falsche URL oder ein PHP-Fehler im Endpunkt |
| `Canvas is already in use` | `new Chart()` steht in `render()` statt daneben |
| Diagramm bleibt leer, Status «0 Sommer» | `load.php` aus Code-Along 12 wurde nie aufgerufen |
| Linie springt nach dem Umschalten | `sort()` wurde auf `summers` statt auf einer Kopie aufgerufen |
| Jahre in falscher Reihenfolge | `ORDER BY` im Endpunkt fehlt |
| `"26.5"` mit Anführungszeichen im Netzwerk-Tab | Die Typen im Endpunkt fehlen – Chart.js rechnet meist trotzdem, der Datenvertrag ist aber gebrochen |
| Diagramm wird bei jeder Aktualisierung höher | `maintainAspectRatio: false` ohne feste Höhe im CSS |
| `?city=Zürich` findet nichts | `encodeURIComponent()` fehlt |
