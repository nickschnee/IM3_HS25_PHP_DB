# 03 – Airbnb-Daten transformieren

**Lernziel:** Du baust aus rund 3000 rohen Angebotszeilen ein kurzes,
gleichmässig aufgebautes JSON, das genau deine Datenfrage beantwortet – und
lieferst die Audit-Zahlen mit, an denen man dir das nachrechnen kann.

**Richtwert:** 60 Minuten

Voraussetzungen: [Übung 01](../01_airbnb_erkunden/) (Daten erkundet) und
[Übung 02](../02_datenfrage/) (Frage und Datenvertrag stehen).

## Vorbereitung

Kopiere deine `data/listings.csv` aus Übung 01 in den `data/`-Ordner dieser
Übung. `extract.php` liest sie und ist fertig – daran musst du nichts ändern.

Die drei Dateien:

| Datei           | Rolle                                            |
| --------------- | ------------------------------------------------ |
| `extract.php`   | liest die CSV, gibt ein PHP-Array zurück (fertig) |
| `transform.php` | deine Regeln, gibt ein PHP-Array zurück           |
| `index.php`     | macht daraus JSON (fertig)                        |

Aufrufen im Browser: `index.php`.

## Aufgabe 1 – Filtern (20')

Löse **TODO 1**. Wirf die Zeilen weg, die deine Frage nicht meint. Typische
Regeln aus Übung 02:

- Angebote ohne Gebietszuordnung;
- Kategorien, die nicht zur Frage passen (z. B. Hotelzimmer bei einer Frage
  über Wohnraum);
- inaktive Angebote, erkennbar an einer alten oder fehlenden `last_review`.

**Zähle jeden Ausschlussgrund einzeln** im `$audit`-Array. Am Schluss muss
gelten:

```text
input_rows = alle excluded_* + included_listings
```

Geht die Rechnung nicht auf, hast du irgendwo ein `continue` vergessen oder
zählst doppelt.

## Aufgabe 2 – Gruppieren und zählen (20')

Löse **TODO 2** und **TODO 3**. Zähle pro Gebiet mit, was deine Kennzahl
braucht. Das Muster dafür kennst du aus dem Code-Along:

```php
$byArea[$area]['listings'] = ($byArea[$area]['listings'] ?? 0) + 1;
```

Das Gebiet ist der **Schlüssel** im Array. Deshalb musst du nicht suchen: Beim
zweiten Angebot aus demselben Kreis liegt der Zähler schon bereit.

## Aufgabe 3 – Ergebniszeilen bauen (10')

Löse **TODO 4** und **TODO 5**. Aus den Zählern entstehen Zeilen nach deinem
Datenvertrag: **jede Zeile gleich aufgebaut, gleiche Feldnamen, gleiche Typen.**

- Anteile mit `round($teil / $ganzes * 100, 1)` – eine Nachkommastelle reicht.
- Sortiere so, wie die Frage es verlangt, und lege fest, was bei Gleichstand
  gilt.
- Rechne nie durch eine Zahl, die 0 sein kann, ohne sie vorher zu prüfen.

## Aufgabe 4 – Audit und Abnahme (10')

Löse **TODO 6** und prüfe dein Resultat, bevor du es weitergibst:

1. Geht die Rechnung `input_rows = excluded + included` auf?
2. Passt eine Ergebniszeile exakt zum Datenvertrag aus Übung 02?
3. Nimm einen Kreis und rechne eine Zahl von Hand mit `explore.php` nach.
4. Ist eine Gruppe verdächtig klein? Dann hat ein Filter zu viel erwischt.
5. Steht deine Einschränkung aus Übung 02 mit im JSON?

## Erwartetes Resultat

`index.php` liefert JSON, etwa in dieser Form (die Werte sind deine):

```json
{
  "source": "Inside Airbnb, Zürich, Stand 2026-06-30",
  "rules": { "active_since": "2024-01-01", "high_availability_days": 180 },
  "limitation": "Die Daten zeigen Inserate, keine Buchungen und keine Umsätze.",
  "audit": {
    "input_rows": 3308,
    "excluded_no_area": 0,
    "excluded_hotel_room": 4,
    "excluded_inactive": 1170,
    "included_listings": 2134
  },
  "areas": [
    {
      "area": "Kreis 8",
      "listings": 234,
      "entire_homes": 208,
      "entire_homes_share": 88.9,
      "entire_homes_high_availability": 75
    }
  ]
}
```

Aus rund 3000 Zeilen mit 19 Spalten werden ein Dutzend Zeilen mit fünf
Feldern. Genau das ist Transform: Was das Frontend zeichnen soll, steht am
Schluss drin – alles andere ist begründet weg.

## Mit KI arbeiten

Du darfst diesen Transform mit KI schreiben lassen. Dann gilt dasselbe wie im
Code-Along: Zuerst deine Spezifikation, dann der Auftrag. Die Gliederung dafür
steht in
[`KI_PROMPT.md`](../../../code-alongs/C_transform/10_sharkdaten_transformieren/KI_PROMPT.md).

Deine ausgefüllte `datenfrage.md` aus Übung 02 ist bereits der halbe Prompt.
Übernimm keinen Code, den ihr nicht gemeinsam Zeile für Zeile geprüft habt, und
gib keine Zugangsdaten an ein KI-Tool.

## Wenn du feststeckst

- «Undefined array key»: Ein Feld kann fehlen. `($listing['spalte'] ?? '')`
  liefert einen leeren Text statt einer Fehlermeldung.
- Alle Anteile sind `0`: Du rechnest wahrscheinlich mit Texten. `(int)` bzw.
  `(float)` machen aus `"234"` eine Zahl.
- Division by zero: Ein Gebiet hat nach dem Filter null Angebote. Prüfe vor der
  Division oder lass leere Gebiete ganz weg.
- JSON ist leer oder die Seite weiss: Schau in `transform.php`, ob am Schluss
  wirklich `return` steht – `echo` gehört hier nicht hin.
- Umlaute erscheinen als `ä`: `JSON_UNESCAPED_UNICODE` fehlt. In der
  fertigen `index.php` ist es schon gesetzt.

## Freiwillige Zusatzaufgaben

- Ergänze pro Gebiet die Anzahl Angebote von Gastgeber:innen mit mehr als vier
  Angeboten (`calculated_host_listings_count`).
- Gib zusätzlich eine Zeile `total` über alle Gebiete aus – und überlege, ob
  sie in dieselbe Liste gehört oder daneben.
- Lade eine zweite Stadt herunter und lass denselben Transform darüber laufen.
  Was bricht?
