# Ablauf `10_sharkdaten_transformieren`

> **Ziel:** Eine komplexe Transformation mit KI-Unterstützung fachlich planen,
> implementieren und auditieren. Der Fokus liegt auf Definitionen, Mappings und
> Aussagegrenzen – nicht auf dem Abtippen des Codes. Richtwert: 60 Minuten.

## Einstieg: Die Frage ist Teil des Transforms (10')

An die Tafel:

```text
Welcher Hai greift am häufigsten an?
Welche Aktivität führt zu den meisten Angriffen?
```

Gemeinsam kritisieren: Der Datensatz enthält aufgezeichnete Vorfälle, aber
keine Exposition. Viele Haiarten fehlen oder sind unsicher. Die Fragen deshalb
präzisieren:

1. Welche identifizierte Hai-Kategorie kommt in bestätigten, unprovozierten
   Vorfällen von 1950–2018 am häufigsten vor?
2. Bei welcher vereinheitlichten Aktivitätsgruppe wurden in derselben Auswahl
   die meisten Vorfälle erfasst?

## Rohwerte untersuchen (10')

Nicht sofort Code schreiben. Zuerst häufige und schwierige Werte aus `Species`
und `Activity` sammeln:

- `White shark` und `5 m [16.5'] white shark`;
- `2 m shark` ohne identifizierte Art;
- `Possibly a white shark` als unsichere Zuordnung;
- `Surfing`, `Body boarding`, `Surf fishing`;
- leere und nicht bestätigte Angaben.

Besprechen: Warum darf `2 m shark` nicht einer Art zugeordnet werden? Warum muss
`Surf fishing` vor dem allgemeinen Suchwort `surf` geprüft werden?

## KI-Auftrag statt Zuruf (10')

`KI_PROMPT.md` lesen. Die Klasse markiert darin:

- Entscheidungen, die von uns kommen;
- Fleissarbeit, die die KI übernehmen kann;
- Resultate, die wir danach kontrollieren müssen.

Keine Zugangsdaten oder schützenswerten Personendaten an ein KI-Tool geben.

## Code und Audit (20')

1. `normalizeSpecies`: kleines, explizites Mapping; unbekannt bleibt `null`.
2. `normalizeActivity`: Reihenfolge der Regeln beachten.
3. `Fatal (Y/N)`, Name und Verletzung bewusst weglassen: Die beiden Fragen
   brauchen diese Felder nicht.
4. Zeitraum und `Unprovoked` filtern; Ausschlüsse nach Grund zählen.
5. Kategorien zählen, sortieren und zwei Top-10-Rankings nach demselben
   Datenvertrag erzeugen.
6. Abdeckung und häufigste unbekannte Artangaben ins Audit aufnehmen.

Die Lösung ist **eine mögliche Klassifikation**, keine Naturwahrheit. Änderungen
am Mapping müssen in `TRANSFORM.md` dokumentiert werden.

## Abnahme (10')

Im JSON gemeinsam prüfen:

- Wie viel Prozent der eingeschlossenen Fälle haben eine zugeordnete
  Hai-Kategorie?
- Welche häufigen Rohwerte blieben unklassifiziert – und warum?
- Addieren sich klassifiziert und unklassifiziert zu eingeschlossen?
- Enthält jede Ranking-Zeile nur `dimension`, `rank`, `category`, `incidents`?
- Welche Aussage darf die spätere Story machen, welche nicht?

## Gesprächspunkte

- **Unknown ist ein Ergebnis:** Niedrige Abdeckung darf nicht versteckt werden.
- **Mappings sind Modellierung:** Kategorien vereinfachen die Wirklichkeit.
- **Häufigkeit ist nicht Risiko:** Ohne Anzahl Schwimmer:innen, Surfer:innen
  usw. fehlt der Nenner.
- **KI braucht Aufsicht:** Sie schreibt Regeln schnell, kann aber plausible und
  fachlich falsche Zuordnungen erzeugen.

## Quelle

Global Shark Attack File (GSAF), via Kaggle:
<https://www.kaggle.com/datasets/felipeesc/shark-attack-dataset>
