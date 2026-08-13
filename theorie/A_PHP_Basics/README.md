# Theorie A – PHP Basics (Slides)

> **Ziel:** Der Theorie-Input zu Block A. Deckt ab, was die Code-Alongs
> `01_variablen` bis `05_schleifen` danach praktisch einüben.
> Richtwert: 60 Minuten.

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
| 3–8 | Was ist PHP? (Server, Browser, erste Datei, PHP als Datenlieferant) |
| 9–13 | Variablen & Datentypen |
| 14–17 | Funktionen |
| 18–23 | Bedingungen |
| 24–28 | Arrays |
| 29–32 | Schleifen |
| 33–37 | Zusammenspiel mit ETL, häufige Fehler, Ausblick |

Alle Code-Beispiele nutzen denselben roten Faden wie die Code-Alongs: einen
Aare-Messwert (Ort, Temperatur, Zeitpunkt). Die Folien zeigen dieselbe
Schreibweise wie die Lösungen in `code-alongs/A_PHP_Basics/`.

## Bezug zum übrigen Material

- Vertiefung und Nachschlagen: `cheatsheets/00_was_ist_PHP.md` bis
  `cheatsheets/05_schleifen.md`
- Praxis direkt danach: `code-alongs/A_PHP_Basics/`
- Übungen: `uebungen/A_PHP_Basics/`
- Lokaler Server (optional): `theorie/00_lokaler_php_server/`

## Design anpassen

Alle Farben, Schriftgrössen und Abstände stehen als CSS-Variablen zuoberst in
`styles.css`. Das Farbschema folgt dem HSLU-Foliendesign: weisser Hintergrund,
olivfarbene Titel, petrolfarbene Kapiteltrenner.

## PDF exportieren

```bash
npx decktape reveal index.html slides.pdf --size 1280x720
```
