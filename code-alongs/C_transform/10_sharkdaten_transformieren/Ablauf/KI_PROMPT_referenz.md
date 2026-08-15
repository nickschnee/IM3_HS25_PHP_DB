# KI-Auftrag für den Shark-Transform – Referenz für Dozierende

> **Nicht austeilen.** Die Klasse schreibt ihre Spezifikation selbst; das
> Gerüst dafür ist `../KI_PROMPT.md`. Dieser Text hier ist eine ausformulierte
> Fassung zum Vergleich: Woran habt ihr gedacht, woran die Klasse nicht?
>
> Die Kategorien und Schwellen sind **eine** vertretbare Lösung, nicht die
> richtige. Eine Klasse, die andere Kategorien begründet, hat die Aufgabe
> ebenso gelöst. Interessant ist nur, ob die Spezifikation vollständig ist:
> Filter, Mapping, Datenvertrag, Audit, Grenzen.

Der Prompt ist eine **Spezifikation**, nicht nur «Räume die Daten auf».

```text
Erstelle in PHP 8.2+ die Transformation eines bereits eingelesenen Arrays
$rawAttacks. Verändere den Extract nicht.

Datenfragen:
1. In welchen Ländern wurden in bestätigten, unprovozierten Vorfällen von
   1950 bis 2018 die meisten Vorfälle erfasst?
2. Welche identifizierte Hai-Kategorie kommt in derselben Auswahl am
   häufigsten vor?
3. Bei welcher vereinheitlichten Aktivitätsgruppe wurden in derselben Auswahl
   die meisten Vorfälle erfasst?

Wichtige Einschränkung:
Die Resultate sind Häufigkeiten in diesem Datensatz und keine Aussage über
Risiko oder Kausalität. Länder mit langer Küste, vielen Badegästen und guter
Erfassung stehen weiter oben, ohne deswegen gefährlicher zu sein.

Filterregeln:
- Year muss numerisch und zwischen 1950 und 2018 liegen.
- Type muss nach trim() exakt "Unprovoked" sein.
- Alle Ausschlüsse müssen nach Grund gezählt werden.

Normalisierung Species:
- Ordne nur über explizite, gut prüfbare Textmuster zu.
- Kategorien: White shark; Tiger shark; Bull / Zambesi shark;
  Sand tiger / Raggedtooth / Grey nurse shark; Blacktip shark;
  Wobbegong; Blue shark; Bronze whaler / Copper shark; Lemon shark;
  Hammerhead; Mako shark.
- Angaben wie "2 m shark", leer, "unknown", "not confirmed", "possibly",
  "probably", "thought to involve" oder nur "shark" dürfen nicht geraten
  werden und werden null.
- Angaben mit mehreren möglichen Arten (z. B. "Blacktip or spinner shark")
  werden ebenfalls null und nicht der zuerst genannten Kategorie zugeschlagen.
- Gib die zehn häufigsten nicht zugeordneten Species-Rohwerte im Audit aus.

Normalisierung Activity:
- Surfing & board sports
- Swimming & wading
- Spearfishing
- Diving & snorkeling
- Fishing
- Paddling
- Boating
- Sonstige unklare Angaben werden null.
- Beachte die Reihenfolge: "spearfishing" vor "fishing" und "surf fishing"
  als Fishing, nicht als Surfing.

Normalisierung Country:
- Country wird nicht in eigene Kategorien eingeteilt, sondern in
  data/laender_iso.json nachgeschlagen: Schreibweise -> ISO-3166-Code.
- Vor dem Nachschlagen trim() und strtoupper(), damit "FIJI" und "Fiji"
  dasselbe Land sind.
- Was nicht in der Tabelle steht, bekommt iso3 = null. Der Ländername bleibt
  trotzdem im Ergebnis und wird weiterhin gezählt.
- Gib die zehn häufigsten Ländernamen ohne Eintrag im Audit aus.
- Ein Vorfall ohne Land wird gezählt, aber nicht aus den beiden Ranglisten
  entfernt.

Nicht benötigte Felder:
- Fatal (Y/N), Name, Injury, Area, Location und weitere Spalten werden für
  diese drei Fragen nicht transformiert. Keine Arbeit in Felder investieren,
  die der Datenvertrag nicht braucht.

Zieldatenvertrag, zwei Listen:

data – die beiden Ranglisten:
[
  {
    "dimension": "shark_category | activity_group",
    "rank": "int",
    "category": "string",
    "incidents": "int"
  }
]

countries – eine Zeile pro Land:
[
  {
    "country": "string",
    "iso3": "string | null",
    "incidents": "int",
    "top_species": "string | null",
    "top_activity": "string | null"
  }
]

Erzeuge pro Dimension ein absteigend sortiertes Top-10-Ranking. Bei Gleichstand
alphabetisch sortieren. Die Länderliste wird nach denselben Regeln sortiert,
aber nicht gekürzt.

Audit:
- input_rows
- excluded_invalid_year
- excluded_outside_period
- excluded_not_unprovoked
- included_incidents
- species_classified und species_unclassified
- activity_classified und activity_unclassified
- Abdeckung in Prozent für Species und Activity
- zehn häufigste nicht zugeordnete Species-Werte
- incidents_without_country und incidents_with_iso
- countries_total und countries_with_iso
- Abdeckung in Prozent für die Ländercodes
- zehn häufigste Ländernamen ohne Eintrag in der Nachschlagetabelle

Liste vor dem Code alle Annahmen oder mehrdeutigen Entscheidungen auf. Erfinde
keine zusätzlichen Kategorien. Schreibe kleine Funktionen für Normalisierung,
Ranking und häufigste unbekannte Werte.
```

## Nach der Antwort

Prüft mindestens zehn Rohwerte pro Mapping-Kategorie. Sucht besonders nach
falschen Treffern durch Teilwörter und kontrolliert die häufigsten nicht
zugeordneten Werte. Neue Regeln werden zuerst in der Spezifikation ergänzt und
erst danach in den Code übernommen.
