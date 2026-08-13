# Theorie B – Extract (Slides)

> **Ziel:** Der Theorie-Input zu Block B. Ordnet ein, was die Übung
> `01_daten_finden` von Hand gemacht hat, und bereitet die Code-Alongs
> `06_json_lesen` bis `09_sensor_lesen` vor. Richtwert: 20 Minuten.

## Öffnen

Die Präsentation ist eine einzelne HTML-Datei ohne Build-Schritt:

```bash
open index.html
```

Reveal.js wird über ein CDN geladen – für die Präsentation braucht es also
eine Internetverbindung.

## Steuerung

| Taste | Wirkung |
| --- | --- |
| `→` / `Leertaste` | nächste Folie |
| `←` | zurück |
| `S` | Referentenansicht mit Notizen |
| `F` | Vollbild |
| `Esc` | Übersicht aller Folien |
| `?` | alle Kürzel |

## Inhalt

| Folien | Kapitel |
| --- | --- |
| 3–5 | Was heisst Extract? (Einordnung in ETL, vier Quellen) |
| 6–8 | Woher kommen die Daten? (live oder heruntergeladen, Hitzesommer) |
| 9–16 | Von der Quelle ins PHP-Array (JSON, API, CSV, Sensorbox) |
| 17–19 | Die eigene Quelle prüfen (Kriterien, Fallback) |
| 20–22 | Häufige Fehler, Ausblick, Kernaussage |

Der Input wird **nach** der Übung `01_daten_finden` gehalten. Die Studierenden
haben ihre JSON-Dateien dann bereits heruntergeladen – Folie 8 nimmt genau
darauf Bezug.

Die Kernaussage des ganzen Foliensatzes steht auf Folie 16: Der Extract ändert
sich je nach Quelle, das Ergebnis ist immer ein PHP-Array.

Alle Code-Beispiele sind wörtlich aus den Lösungen in
`code-alongs/B_extract/` übernommen – gleiche Variablennamen, gleiche
Schreibweise. Roter Faden ist der Hitzesommer-Datensatz; für CSV kommt das
Shark Attack File dazu, weil es die typische Unordnung echter Daten zeigt.

## Bezug zum übrigen Material

- Vorher: `uebungen/B_extract/01_daten_finden/`
- Praxis direkt danach: `code-alongs/B_extract/06_json_lesen/` bis
  `09_sensor_lesen/`
- Vorwissen: `theorie/A_PHP_Basics/` (Arrays, Schleifen, Funktionen)
- Nächster Schritt: `theorie/C_transform/`

## Offene Punkte

- Folie 15 (Sensorbox) beschreibt die Box allgemein. Sobald der Endpunkt der
  Box steht, kann hier die konkrete URL und ein Beispiel-JSON ergänzt werden –
  siehe `code-alongs/B_extract/09_sensor_lesen/README.md`.

## Design

Der Foliensatz nutzt das gemeinsame **FHGR Foliendesign** aus
`theorie/_foliendesign/`. Farben, Schriftgrössen und alle Bausteine sind dort
dokumentiert. Änderungen am Design gehören in `fhgr-slides.css`, nicht in
diesen Ordner.

## PDF exportieren

```bash
npx decktape reveal index.html slides.pdf --size 1280x720
```
