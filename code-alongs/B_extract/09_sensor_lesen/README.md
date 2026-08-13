# Code-Along `sensor_lesen` (Block B – Extract)

> **Status:** In Vorbereitung. Der Ordner steht, die Sensor-API-URL und der
> Code (`index.php`, `solution/`, `Ablauf/`) werden ergänzt, sobald der
> Endpunkt der Box steht.

## Worum es geht

Wir lesen die Messwerte einer **Sensorbox, die im Kursraum steht**. Die Box
misst laufend (z. B. Temperatur, Luftfeuchtigkeit, CO₂) und stellt ihre Werte
über HTTP als JSON bereit – also **wie eine eigene, kleine API**.

Für PHP ist das nichts Neues: Wir holen die Daten mit demselben
`fetchJson()`-Helfer wie bei Open-Meteo und bekommen wieder ein PHP-Array.

```text
06 JSON-Datei:  file_get_contents + json_decode  -> PHP-Array
07 Live-API:    fetchJson (cURL)                 -> PHP-Array
08 CSV-Datei:   fopen + fgetcsv                  -> PHP-Array
   Sensor-API:  fetchJson (cURL)                 -> PHP-Array
```

Der Extract ändert sich, das Ergebnis bleibt gleich: ein PHP-Array von
Datensätzen.

## Warum dieses Code-Along

Die drei bisherigen Quellen sind alle **fremde** Daten: jemand anders hat
gemessen, gesammelt und veröffentlicht. Hier sehen die Studierenden, dass sie
Daten auch **selber erheben** können – mit einer Box, die im Raum steht und
misst, was gerade passiert.

Didaktische Botschaft:

- Eine Sensor-API ist technisch einfach eine weitere API.
- Wer selber misst, besitzt die Datenquelle und kann die Datenfrage frei
  stellen.
- Das Messgerät sieht man im Raum – die Daten werden dadurch greifbar.

Hardware, Sensorik und die Programmierung der Box sind **nicht** Inhalt dieses
Kurses. Die Box wird gezeigt und konsumiert, nicht gebaut.

## Geplante Schritte

1. Die Box im Raum anschauen: Was misst sie, wie oft, wohin schickt sie die
   Werte?
2. Die Endpunkt-URL der Box im Browser öffnen und die JSON-Antwort ansehen.
3. Mit `fetchJson($url)` dieselben Daten in PHP holen.
4. Die Struktur mit `array_keys()` untersuchen: Wie heissen die Felder,
   welche Einheit hat welcher Wert, wo steckt der Zeitstempel?
5. Die Messwerte mit einer `foreach`-Schleife als Liste ausgeben.
6. Vergleich zu Code-Along 07: derselbe Helfer, dieselbe Technik, andere
   Quelle.

## Gesprächspunkte

- **Eigene Daten statt fremder Daten:** Der Unterschied ist inhaltlich gross,
  technisch klein.
- **Live heisst abhängig:** Steht die Box aus oder ist das Netz weg, gibt es
  keine Daten. Für den Marktstand braucht ein Sensor-Projekt darum immer einen
  gespeicherten Datenstand als Fallback – genau dafür gibt es Load (Block D).
- **Sammeln braucht Zeit:** Wer live misst, hat am Anfang wenig Daten. Ein
  Sensor-Projekt muss früh anfangen zu sammeln, sonst reicht die Datenmenge bis
  zum Marktstand nicht.
- **Ausblick:** Solche Boxen können in einem späteren Kurs selber gebaut und
  programmiert werden.

## Offen / To-do

- [ ] Endpunkt-URL und Datenformat der Box dokumentieren
- [ ] `index.php` (Startcode) und `solution/index.php` schreiben
- [ ] `Ablauf/sensor_lesen_ablauf.md` nach dem Muster der anderen Code-Alongs
- [ ] Beispielantwort als `data/beispiel.json` ablegen (Fallback ohne Box)
