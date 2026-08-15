# Lösung – 03 Airbnb-Daten transformieren

Diese Lösung beantwortet die Beispielfrage aus
[Übung 02](../../02_datenfrage/solution/datenfrage.md):

> In welchen Zürcher Kreisen besteht das Airbnb-Angebot am stärksten aus ganzen
> Wohnungen – und wie viele davon sind mindestens ein halbes Jahr im Voraus
> buchbar? (Inside Airbnb, Zürich, Stand 30.06.2026)

Ausführen: `solution/index.php` im Browser öffnen. Der Datensatz liegt in
[`data/listings.csv`](data/listings.csv).

**Deine Lösung sieht anders aus, und das ist richtig so.** Deine Frage ist eine
andere, also sind es auch die Regeln. Prüfbar ist jede Lösung an denselben drei
Punkten: Filter einzeln gezählt, Ergebniszeilen gleich aufgebaut, Audit geht auf.

## Die Regeln

| Nr. | Regel                                      | Begründung                                       | Wirkung |
| ---: | ----------------------------------------- | ------------------------------------------------ | ------: |
| 1 | `neighbourhood_group` leer → raus            | ohne Kreis kein Vergleich                         |       0 |
| 2 | `room_type` = `Hotel room` → raus            | ein Hotelzimmer ist kein Wohnraum                 |       4 |
| 3 | `last_review` leer oder vor 2024 → raus      | Angebot gilt als inaktiv                          |    1170 |

Regel 1 greift in Zürich kein einziges Mal. Sie bleibt trotzdem im Code: In
anderen Städten ist `neighbourhood_group` leer, und ein Filter, der nichts
findet, ist billiger als ein Fehler, den niemand sieht.

Regel 3 ist die folgenreichste Entscheidung: Sie wirft **über ein Drittel** des
Datensatzes weg. Sie ist begründbar (826 Angebote haben nie eine Bewertung, 344
zuletzt vor 2024), aber sie ist eine Annahme – keine Bewertung heisst nicht
sicher «nicht vermietet». Deshalb steht sie im Resultat unter `rules`.

## Das Resultat

```json
{
  "source": "Inside Airbnb, Zürich, Stand 2026-06-30",
  "rules": {
    "active_since": "2024-01-01",
    "high_availability_days": 180,
    "excluded_room_types": ["Hotel room"]
  },
  "limitation": "Die Daten zeigen Inserate, keine Buchungen und keine Umsätze.",
  "audit": {
    "input_rows": 3308,
    "excluded_no_area": 0,
    "excluded_hotel_room": 4,
    "excluded_inactive": 1170,
    "included_listings": 2134,
    "areas": 12,
    "entire_homes_total": 1722,
    "entire_homes_share_total": 80.7
  },
  "areas": [
    { "area": "Kreis 8", "listings": 234, "entire_homes": 208, "entire_homes_share": 88.9, "entire_homes_high_availability": 75 },
    { "area": "Kreis 1", "listings": 202, "entire_homes": 175, "entire_homes_share": 86.6, "entire_homes_high_availability": 100 },
    { "area": "Kreis 6", "listings": 228, "entire_homes": 196, "entire_homes_share": 86, "entire_homes_high_availability": 44 },
    { "area": "Kreis 4", "listings": 248, "entire_homes": 211, "entire_homes_share": 85.1, "entire_homes_high_availability": 63 },
    { "area": "Kreis 3", "listings": 290, "entire_homes": 245, "entire_homes_share": 84.5, "entire_homes_high_availability": 80 },
    { "area": "Kreis 2", "listings": 129, "entire_homes": 109, "entire_homes_share": 84.5, "entire_homes_high_availability": 49 },
    { "area": "Kreis 10", "listings": 118, "entire_homes": 89, "entire_homes_share": 75.4, "entire_homes_high_availability": 25 },
    { "area": "Kreis 11", "listings": 227, "entire_homes": 166, "entire_homes_share": 73.1, "entire_homes_high_availability": 83 },
    { "area": "Kreis 5", "listings": 100, "entire_homes": 73, "entire_homes_share": 73, "entire_homes_high_availability": 42 },
    { "area": "Kreis 9", "listings": 165, "entire_homes": 118, "entire_homes_share": 71.5, "entire_homes_high_availability": 45 },
    { "area": "Kreis 12", "listings": 26, "entire_homes": 18, "entire_homes_share": 69.2, "entire_homes_high_availability": 5 },
    { "area": "Kreis 7", "listings": 167, "entire_homes": 114, "entire_homes_share": 68.3, "entire_homes_high_availability": 39 }
  ]
}
```

Aus 3308 Zeilen mit 19 Spalten werden 12 Zeilen mit fünf Feldern.

## Die Abnahme

**Geht das Audit auf?** 0 + 4 + 1170 + 2134 = 3308 = `input_rows`. Ja.

**Sind die Anteile plausibel?** Über alle Kreise 80,7 % ganze Wohnungen, im
Einzelnen zwischen 68,3 % und 88,9 %. Die Spannweite ist da, aber kein Kreis
fällt aus dem Rahmen – bei einem Wert von 100 % oder 5 % müsste man den Filter
nochmals anschauen.

**Ist eine Gruppe zu klein geworden?** Kreis 12 hat nach dem Filter noch 26
Angebote. Ein Anteil aus 26 Fällen ist unsicher: Zwei Angebote mehr oder
weniger verschieben ihn um acht Prozentpunkte. Für die Story heisst das,
entweder die absolute Zahl mitzeigen oder Kreis 12 nicht als Extremwert
verkaufen.

**Was fällt inhaltlich auf?** Kreis 1 (Altstadt) hat den höchsten Anteil
ganzjährig verfügbarer Wohnungen: 100 von 175 ganzen Wohnungen sind mindestens
ein halbes Jahr buchbar. Das ist der interessanteste Befund des Resultats – und
er stand in keiner einzelnen Spalte des Rohdatensatzes.

## Hinweise für Dozierende

- Die Sortierung nach Anteil bringt Kreis 12 (26 Angebote) und Kreis 3 (290
  Angebote) in dieselbe Rangliste. Das ist der ideale Anlass für die Frage:
  Darf man diese Kreise nebeneinanderstellen? Antwort: nur mit den absoluten
  Zahlen daneben – deshalb steht `listings` in jeder Zeile.
- Wer Regel 3 weglässt, erhält andere Anteile. Beide Fassungen sind vertretbar,
  aber nur die dokumentierte ist überprüfbar. Ein Vergleich der beiden
  Resultate im Plenum dauert zwei Minuten und sitzt.
- Der Sprung zu Block D ist klein: Diese zwölf Zeilen sind genau das, was
  nachher per `INSERT` in die Datenbank geht.
