# Kickoff (Slides)

> **Ziel:** Der Einstieg in den Kurs. Zeigt, was am Ende dasteht, benennt die
> Kette von der Datenquelle bis zur Grafik und öffnet den Blick dafür, woher
> Daten überhaupt kommen. Kein PHP. Richtwert: zwei Portionen à 25 Minuten.

## Öffnen

Die Präsentation ist eine einzelne HTML-Datei ohne Build-Schritt:

```bash
open index.html
```

Reveal.js wird über ein CDN geladen – für die Präsentation braucht es also
eine Internetverbindung. Die Bilder liegen lokal in `bilder/`.

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
| 3–8 | Ziel: eine Data-Story (zwei Beispiele, Übungsauftrag, die vier Bestandteile) |
| 9–12 | Von der Quelle zur Grafik (ETL+U, Rollen im Team, Kursverlauf) |
| 13–19 | Woher kommen die Daten: Übersicht und Datensatz |
| 20–23 | API |
| 24–26 | Reverse Engineering und Übungsauftrag |
| 27–30 | Webscraping und Einordnung für den Kurs |
| 31–36 | Euer Projekt, Meilensteine, Themenbörse, Kernaussage |

Der Foliensatz wird **in zwei Portionen** gehalten. Nach Folie 12 folgt die
Übung `01_data_story_galerie`, deren Auswertung auf Folie 7 zurückgreift.

Die drei Übungsaufträge auf den Folien 6, 19 und 26 sind nur Anrisse. Der
vollständige Auftrag steht jeweils im Übungsordner.

## Bezug zum übrigen Material

- Übungen dieses Halbtags: `uebungen/00_kickoff/`
- Direkt danach: `theorie/00_lokaler_php_server/` (Tooling)
- Vertieft die Quellenfrage technisch: `theorie/B_extract/`
- Meilensteintabelle im Original: `ablauf.md`

**Abgrenzung zu `theorie/B_extract/`:** Hier geht es um die journalistische
Quellenlandschaft – Datensatz, API, Reverse Engineering, Webscraping. Dort geht
es technisch um das Einlesen in ein PHP-Array. Die einzige bewusste
Wiederholung ist die ETL-Kette als roter Faden.

## Bildquellen

| Datei | Herkunft |
| --- | --- |
| `data-story-1kwh.jpg` | Screenshot 1kwh.ch, eigenes Projekt |
| `data-story-pudding-wine.jpg` | Screenshot pudding.cool, «The Pour-igin of Species» |
| `datensatz-zeitreihe.jpg` | AirPassengers-Zeitreihe, Standardbeispiel aus der Statistik |
| `datensatz-nachrichten.jpg` | eigene Auswertung von Chatverläufen |
| `api-portal.jpg` | Screenshot freepublicapis.com |
| `api-abfahrtsuhr.jpg` | eigenes Projekt auf Basis einer Fahrplan-API |
| `reverse-engineering-srf1.jpg` | Screenshot einer Playlist-Seite zu Radio SRF1 |
| `webscraping-homegate.jpg` | eigener Scrape von Wohnungsinseraten |
| `webscraping-meme.jpg` | Internet-Meme, unbekannte Urheberschaft |

Die Bilder stammen aus dem Foliensatz «ETL für IM3» des Durchlaufs 24HS und
sind nur für den internen Unterrichtsgebrauch gedacht.

## Offene Punkte

- Die Bildlegende zu `api-abfahrtsuhr.jpg` ist eine Rekonstruktion. Falls das
  Projekt anders hiess oder auf einer anderen Quelle beruhte, gehört das auf
  Folie 23 korrigiert.
- Zwei Screenshots (`reverse-engineering-srf1.jpg`, `api-portal.jpg`) zeigen
  Stände von 2024. Sie illustrieren ein Prinzip und müssen nicht aktuell sein –
  wenn sie zu alt wirken, lassen sie sich neu aufnehmen.
- Der Kursverlauf auf Folie 12 nennt bewusst keine Tage. Sobald der Stundenplan
  steht, könnte hier eine konkretere Übersicht stehen.

## Design

Der Foliensatz nutzt das gemeinsame **FHGR Foliendesign** aus
`theorie/_foliendesign/`. Farben, Schriftgrössen und alle Bausteine sind dort
dokumentiert. Änderungen am Design gehören in `fhgr-slides.css`, nicht in
diesen Ordner.

Dieser Foliensatz ist der erste mit Bildern. Der Baustein `figure` mit
`figcaption` und `.shot` sowie die Ablagekonvention `bilder/` sind deshalb im
gemeinsamen Design dokumentiert.

In `styles.css` steht nur eine Sonderregel: engere Tabellenzeilen für die
Meilensteinfolie.

## PDF exportieren

```bash
npx decktape reveal index.html slides.pdf --size 1280x720
```
