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
1. Welche identifizierte Hai-Kategorie kommt in bestätigten, unprovozierten
   Vorfällen von 1950 bis 2018 am häufigsten vor?
2. Bei welcher vereinheitlichten Aktivitätsgruppe wurden in derselben Auswahl
   die meisten Vorfälle erfasst?

Wichtige Einschränkung:
Die Resultate sind Häufigkeiten in diesem Datensatz und keine Aussage über
Risiko oder Kausalität.

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

Nicht benötigte Felder:
- Fatal (Y/N), Name, Injury und weitere Spalten werden für diese beiden Fragen
  nicht transformiert. Keine Arbeit in Felder investieren, die der
  Datenvertrag nicht braucht.

Zieldatenvertrag:
[
  {
    "dimension": "shark_category | activity_group",
    "rank": "int",
    "category": "string",
    "incidents": "int"
  }
]

Erzeuge pro Dimension ein absteigend sortiertes Top-10-Ranking. Bei Gleichstand
alphabetisch sortieren.

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

Liste vor dem Code alle Annahmen oder mehrdeutigen Entscheidungen auf. Erfinde
keine zusätzlichen Kategorien. Schreibe kleine Funktionen für Normalisierung,
Ranking und häufigste unbekannte Werte.
```

## Nach der Antwort

Prüft mindestens zehn Rohwerte pro Mapping-Kategorie. Sucht besonders nach
falschen Treffern durch Teilwörter und kontrolliert die häufigsten nicht
zugeordneten Werte. Neue Regeln werden zuerst in der Spezifikation ergänzt und
erst danach in den Code übernommen.
