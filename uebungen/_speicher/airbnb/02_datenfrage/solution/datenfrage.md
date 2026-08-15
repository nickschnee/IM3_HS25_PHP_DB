# Datenfrage – ausgefülltes Beispiel

Dies ist **eine** mögliche Antwort, nicht die richtige. Sie gehört zum
Zürcher Datensatz aus [Übung 01](../../01_airbnb_erkunden/solution/) und wird in
[Übung 03](../../03_airbnb_transformieren/solution/) implementiert.

## 1. Datensatz

- Quelle: Inside Airbnb, <https://insideairbnb.com/get-the-data/>
- Stadt: Zürich
- Stand (Date Compiled): 30.06.2026
- Anzahl Angebote: 3308

## 2. Meine Frage

In welchen Zürcher Kreisen besteht das Airbnb-Angebot am stärksten aus ganzen
Wohnungen – und wie viele davon sind mindestens ein halbes Jahr im Voraus
buchbar? (Stand 30.06.2026)

## 3. Untersuchungseinheit

Eine Zeile im Ergebnis beschreibt **einen Stadtkreis**, nicht ein Angebot. Aus
3308 Angeboten werden zwölf Zeilen.

## 4. Kennzahl

Zwei Kennzahlen pro Kreis:

1. der **Anteil** ganzer Wohnungen an allen aktiven Angeboten des Kreises,
   in Prozent mit einer Nachkommastelle;
2. die **Anzahl** ganzer Wohnungen mit `availability_365` von mindestens 180
   Tagen.

Die absolute Anzahl Angebote steht daneben, sonst ist der Anteil nicht lesbar:
80 % von 26 Angeboten ist etwas anderes als 80 % von 290.

## 5. Spalten, die ich brauche

| Spalte                | Wofür                                    | In Übung 01 geprüft?                          |
| --------------------- | ---------------------------------------- | --------------------------------------------- |
| `neighbourhood_group` | Gruppierung nach Kreis                    | ja, zwölf Kreise, vollständig gefüllt         |
| `room_type`           | ganze Wohnung ja/nein                     | ja, vier saubere Kategorien                   |
| `availability_365`    | Verfügbarkeit im nächsten Jahr            | ja, keine Lücken, 740-mal der Wert 0          |
| `last_review`         | aktiv oder Karteileiche                   | ja, 826 Angebote ohne jede Bewertung          |

Bewusst **nicht** verwendet: `price` (in Zürich unbrauchbar) und `license`
(in allen Zeilen leer).

## 6. Zeilen, die ich ausschliesse

| Nr. | Bedingung                                | Begründung                          | Wie viele ungefähr? |
| ---: | --------------------------------------- | ----------------------------------- | ------------------: |
| 1 | `neighbourhood_group` ist leer             | ohne Kreis kein Vergleich            |                   0 |
| 2 | `room_type` ist `Hotel room`               | ein Hotelzimmer ist kein Wohnraum    |                   4 |
| 3 | `last_review` fehlt oder liegt vor 2024    | Angebot gilt als inaktiv             |                1170 |

Regel 3 ist die grösste Entscheidung: Sie entfernt gut ein Drittel des
Datensatzes. Sie muss deshalb im Resultat sichtbar sein.

## 7. Zielstruktur (Datenvertrag)

| Zielfeld                         | Typ    | Beispiel   | Darf `null` sein? |
| -------------------------------- | ------ | ---------- | ----------------- |
| `area`                           | string | `Kreis 8`  | nein              |
| `listings`                       | int    | `234`      | nein              |
| `entire_homes`                   | int    | `208`      | nein              |
| `entire_homes_share`             | float  | `88.9`     | nein              |
| `entire_homes_high_availability` | int    | `75`       | nein              |

Eine Beispielzeile:

```json
{
  "area": "Kreis 8",
  "listings": 234,
  "entire_homes": 208,
  "entire_homes_share": 88.9,
  "entire_homes_high_availability": 75
}
```

Sortierung und Anzahl Zeilen: zwölf Zeilen, nach `entire_homes_share`
absteigend; bei Gleichstand zuerst der Kreis mit mehr Angeboten.

## 8. Was die Daten nicht sagen

Der Datensatz zeigt **Inserate, keine Buchungen**: Ein hoher Anteil ganzer
Wohnungen belegt weder, dass diese Wohnungen tatsächlich vermietet wurden, noch
dass sie dem Wohnungsmarkt entzogen sind.

## 9. Audit-Zahlen

- Zeilen rein, pro Ausschlussgrund getrennt gezählt, Zeilen drin
  (`input_rows` muss der Summe entsprechen);
- Anzahl Kreise im Ergebnis (Erwartung: 12 – wird es weniger, hat ein Filter
  einen ganzen Kreis geleert);
- Gesamtanteil ganzer Wohnungen über alle Kreise als Vergleichswert für die
  einzelnen Kreise.

---

## Warum diese Frage taugt

| Kriterium              | Antwort                                             |
| ---------------------- | --------------------------------------------------- |
| Untersuchungseinheit   | ein Stadtkreis                                       |
| Kennzahl               | Anteil in Prozent, plus zwei absolute Zahlen         |
| Vergleich              | die zwölf Kreise untereinander                       |
| Zeitbezug              | Stand 30.06.2026, aktiv seit 2024                    |
| Spalten vorhanden      | alle vier in Übung 01 geprüft                        |

## Drei Fragen, die es nicht geworden sind

- **«Wie haben sich die Airbnb-Preise in Zürich entwickelt?»** – Zwei Probleme:
  Die Preisspalte ist im Zürcher Datensatz unbrauchbar, und eine Entwicklung
  bräuchte mehrere Erhebungsstände.
- **«Verdrängt Airbnb Wohnraum in Zürich?»** – Eine gute Story-Frage, aber keine
  Datenfrage für diesen Datensatz. Dafür bräuchte es Wohnungsbestand und
  Leerstandsziffer als zweite Quelle.
- **«Wer sind die grössten Anbieter?»** – Wäre mit `host_id` und
  `calculated_host_listings_count` machbar, betrifft aber Personen. Die Frage
  bleibt als Zusatzaufgabe offen; ins Ergebnis gehören dann keine Namen.
