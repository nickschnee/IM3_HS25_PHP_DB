# Lösung – 01 Airbnb-Daten holen & erkunden

Der Beispieldatensatz in [`data/listings.csv`](data/listings.csv) ist
**Zürich, Stand 30. Juni 2026** (3308 Angebote). Wenn du eine andere Stadt oder
ein anderes Datum gewählt hast, sehen deine Zahlen anders aus – die Befunde
lesen sich aber ähnlich.

Ausführen: `solution/explore.php` im Browser öffnen.

## Aufgabe 1 – Download

Die Downloadseite verlinkt pro Stadt zwei Varianten:

| Datei              | Ordner           | Inhalt                                  |
| ------------------ | ---------------- | --------------------------------------- |
| `listings.csv`     | `visualisations` | 19 Spalten, ungepackt, ca. 0,6 MB       |
| `listings.csv.gz`  | `data`           | 90 Spalten, gepackt, ca. 8 MB entpackt  |

Direkt-URL des Beispiels:

```text
https://data.insideairbnb.com/switzerland/zürich/zurich/2026-06-30/visualisations/listings.csv
```

```bash
curl "https://data.insideairbnb.com/switzerland/z%C3%BCrich/zurich/2026-06-30/visualisations/listings.csv" -o data/listings.csv
```

> Die URLs enthalten das Erhebungsdatum. Inside Airbnb aktualisiert etwa
> vierteljährlich, alte Links verschwinden. Genau deshalb liegt die
> heruntergeladene Datei im Repo und wird nicht bei jedem Aufruf neu geholt –
> dasselbe Prinzip wie beim Marktstand-Fallback.

## Aufgabe 2 – Die 19 Spalten

`id`, `name`, `host_id`, `host_profile_id`, `host_name`, `neighbourhood_group`,
`neighbourhood`, `latitude`, `longitude`, `room_type`, `price`,
`minimum_nights`, `number_of_reviews`, `last_review`, `reviews_per_month`,
`calculated_host_listings_count`, `availability_365`, `number_of_reviews_ltm`,
`license`

## Aufgabe 3 – Textspalten

`room_type` – vier saubere Kategorien, keine Schreibvarianten:

```text
  2556   77.3%  Entire home/apt
   740   22.4%  Private room
     8    0.2%  Shared room
     4    0.1%  Hotel room
```

`neighbourhood_group` – in Zürich die zwölf Kreise, vollständig gefüllt.
Kreis 3 führt mit 504 Angeboten, Kreis 12 hat nur 54.

`neighbourhood` – 34 Quartiere. Für ein Diagramm sind das zu viele Kategorien;
die Kreisebene ist die brauchbarere Gruppierung.

`license` – **in allen 3308 Zeilen leer**. Die Spalte existiert, sagt aber
nichts. Eine Story über bewilligte Vermietungen ist mit diesem Datensatz nicht
möglich.

## Aufgabe 4 – Zahlenspalten

| Spalte                           | leer | Min | Median | Max  | Befund                       |
| -------------------------------- | ---: | --: | -----: | ---: | ---------------------------- |
| `price`                          | 1680 |   0 |      0 |    1 | unbrauchbar                  |
| `minimum_nights`                 |    2 |   1 |      2 | 1125 | brauchbar, mit Ausreissern   |
| `availability_365`               |    0 |   0 |     97 |  365 | brauchbar                    |
| `number_of_reviews`              |    0 |   0 |      6 | 1479 | brauchbar                    |
| `calculated_host_listings_count` |    0 |   1 |      2 |  185 | brauchbar, sehr schief       |

Die wichtigsten Beobachtungen:

- **`price` ist im Zürcher Datensatz kaputt.** Die Hälfte der Zeilen ist leer,
  der Rest enthält nur `0` und `1`. Das ist keine Währung, das ist ein Fehler
  in der Erhebung. Wer daraus einen Durchschnittspreis rechnet, veröffentlicht
  eine erfundene Zahl. In anderen Städten (z. B. Wien) steht in derselben
  Spalte ein plausibler Preis – **prüfen statt annehmen**.
- **`minimum_nights` geht bis 1125.** Solche Werte sind keine Angebote für
  Reisende, sondern Dauermieten oder Karteileichen.
- **301 Angebote haben genau 30 als Mindestaufenthalt.** In vielen Städten
  gelten Kurzzeitvermietungs-Regeln erst unter 30 Nächten. Der Wert ist ein
  Hinweis auf Regelumgehung – und ein guter Kandidat für eine Datenfrage.
- **740 Angebote haben `availability_365` = 0.** Kein freier Tag im nächsten
  Jahr: entweder komplett ausgebucht oder vom Kalender genommen. Aus dieser
  Spalte allein lässt sich das nicht unterscheiden.
- **`calculated_host_listings_count` reicht bis 185.** Ein einzelner Account
  mit 185 Angeboten ist keine Privatperson, die ihr Gästezimmer vermietet.

## Aufgabe 5 – Zeitachse

```text
       nie    826
      2026   1509
      2025    407
      2024    222
      2023    130
      2022     76
      2021     47
      2020     32
      2019     33
      2018     13
      2017      9
      2016      3
      2015      1
```

826 Angebote (25 %) haben nie eine Bewertung erhalten, 138 wurden zuletzt vor
2022 bewertet. Wer «Airbnb-Angebote in Zürich» zählt, zählt also auch
Karteileichen mit. Ein Filter auf `last_review` ab einem bestimmten Jahr ist
eine legitime Transform-Regel – sie muss nur dokumentiert sein.

## Aufgabe 6 – Befunde

Beispielnotiz:

> Zürich, Stand 30.06.2026, 3308 Angebote. Verlässlich sind `room_type`
> (vier saubere Kategorien), `neighbourhood_group` (zwölf Kreise, vollständig)
> und `availability_365` (keine Lücken). `price` verwende ich nicht: Die Hälfte
> ist leer, der Rest enthält nur 0 und 1. Überrascht hat mich, dass 77 % der
> Angebote ganze Wohnungen sind – ich hatte mit mehr Gästezimmern gerechnet.

## Hinweise für Dozierende

- Der kaputte Preis ist kein Unfall dieser Übung, sondern ihr Kern. Die Klasse
  soll erleben, dass eine plausibel benannte Spalte trotzdem Unsinn enthalten
  kann. Wer eine Stadt mit funktionierendem Preis erwischt, hat den Vergleich –
  bitte im Plenum nebeneinanderstellen.
- Wer nur `count($listings)` anschaut, hält den Datensatz für sauber. Erst die
  Verteilungen zeigen die Probleme. Das ist die Brücke zur nächsten Übung.
