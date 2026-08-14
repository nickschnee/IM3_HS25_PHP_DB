# Ablauf `10_sharkdaten_transformieren`

> **Ziel:** Die Klasse formuliert eigene Datenfragen, erkundet die Rohdaten,
> schreibt daraus selbst eine Spezifikation und lässt die KI den Code
> erzeugen. Der Fokus liegt auf Definitionen, Mappings und Aussagegrenzen –
> nicht auf dem Abtippen von Code. Richtwert: 60 Minuten.

**Voraussetzung:** Code-Along
[09 Hitzesommer](../../09_hitzesommer_transformieren) ist gelaufen. Dort war die
Datenfrage vorgegeben. Hier stellen die Studierenden sie selbst.

**Was ihr NICHT verteilt:** `Ablauf/KI_PROMPT_referenz.md` und `solution/`. Die
Klasse entwickelt Fragen, Kategorien und Prompt selbst. Die Referenz ist zum
Vergleich in der Abnahme da, nicht als Vorlage.

## Der Bogen

```text
Frage stellen  ->  Daten anschauen  ->  Frage korrigieren
               ->  Regeln schreiben ->  KI beauftragen  ->  prüfen
```

Der Rücksprung nach dem Anschauen ist der Kern dieser Lektion. Die erste Frage
überlebt den Kontakt mit den Daten nie unverändert – und das ist kein Fehler,
sondern der normale Verlauf.

## 1. Eigene Fragen stellen (10')

An die Tafel, als Provokation:

```text
Welcher Hai greift am häufigsten an?
Welche Aktivität ist am gefährlichsten?
```

Kurz sammeln, was an diesen Fragen nicht stimmt. Der entscheidende Einwand:
Der Datensatz enthält **aufgezeichnete Vorfälle**, aber nicht, wie viele
Menschen überhaupt im Wasser waren. Ohne diesen Nenner gibt es keine Gefahr,
nur Häufigkeit.

Dann der Auftrag an Zweiergruppen:

> Formuliert zwei Fragen, die dieser Datensatz ehrlich beantworten kann.

Leitfragen dazu an die Tafel:

- Was wollen wir herausfinden?
- Welche Fälle zählen überhaupt dazu?
- Welchen Zeitraum brauchen wir?
- Ist die Frage offen, also nicht mit Ja oder Nein zu beantworten?
- Behauptet die Frage mehr, als die Daten hergeben?

Zwei bis drei Fragen vorlesen lassen, nicht bewerten. Sie werden gleich selbst
merken, was fehlt.

## 2. Daten anschauen (10')

`explore.php` im Browser öffnen. Das Skript transformiert nichts, es zählt nur
Rohwerte.

Die Klasse liest in Zweiergruppen und notiert drei Beobachtungen. Die Zahlen,
die dabei auffallen sollen:

| Beobachtung | Zahl | Was sie bedeutet |
| --- | ---: | --- |
| Zeilen gesamt | 8702 | |
| verschiedene Werte in `Species` | 1468 | ein Mapping «für alle» ist unmöglich |
| davon leer | 5244 | die Mehrheit sagt gar nichts über die Art |
| verschiedene Werte in `Activity` | 1504 | dasselbe Problem, andere Spalte |
| Zeilen ohne gültiges Jahr | 2528 | ein Zeitfilter wirft viel weg |
| Werte in `Type` | 9 | überschaubar – hier lohnt ein exakter Filter |

Zum Nachschauen anregen: `Boatomg` in `Type` ist ein Tippfehler im Datensatz.
`Shark involvement not confirmed` steht in der Artenspalte, ist aber gar keine
Art. `6' shark`, `2 m shark` und `1.8 m [6'] shark` sagen dasselbe und nennen
trotzdem keine Art.

**Frage an die Klasse:** Was passiert mit eurer Frage aus Schritt 1, wenn 60
Prozent der Artangaben leer sind?

## 3. Fragen korrigieren (5')

Dieselben Gruppen überarbeiten ihre zwei Fragen. Typischerweise kommen jetzt
dazu: ein Zeitraum, die Einschränkung auf einen Vorfalltyp, und das Wort
**identifiziert** oder **erfasst**.

Eine mögliche Fassung – nicht vorgeben, nur zum Abgleich im Kopf behalten:

> Welche identifizierte Hai-Kategorie kommt in unprovozierten Vorfällen von
> 1950 bis 2018 am häufigsten vor?

Wer eine andere begründete Fassung hat, arbeitet damit weiter. Ab hier gilt für
jede Gruppe ihre eigene Frage.

## 4. Spezifikation schreiben (15')

`KI_PROMPT.md` ist das Gerüst: Überschriften und Leitfragen, keine Antworten.
Die Gruppen füllen es aus.

Beim Herumgehen auf drei Dinge achten:

- **Kategorienliste zu lang.** Wer 30 Haiarten auflistet, hat nicht in die
  Daten geschaut. Zurückverweisen auf `explore.php`: Welche Arten kommen
  überhaupt oft genug vor?
- **Kein Umgang mit Unsicherem.** `Possibly a white shark` – was macht ihr
  damit? Die Antwort «zu White shark» ist eine Behauptung, die im Datensatz
  ausdrücklich verneint wird.
- **Reihenfolge übersehen.** Wer `Surfing` über das Suchwort `surf` erkennt,
  fängt auch `Surf fishing` ein. Diese Kollisionen finden die Gruppen selten
  von allein – gezielt danach fragen.

## 5. KI beauftragen und Code prüfen (15')

Die Gruppen geben ihre Spezifikation an ein KI-Tool und lassen sich
`transform.php` erzeugen. Vorher laut sagen:

- Der Extract bleibt unverändert, die KI schreibt nur den Transform.
- Keine Zugangsdaten und keine schützenswerten Personendaten in ein KI-Tool.
- Was zurückkommt, wird gelesen, nicht nur ausgeführt.

Die Prüfliste steht am Ende von `KI_PROMPT.md`. Der wichtigste Punkt: Die KI
listet ihre eigenen Annahmen auf. Jede Annahme, die nicht in der Spezifikation
stand, ist eine Entscheidung, welche die Gruppe hätte treffen müssen.

## 6. Abnahme (5')

Zwei Gruppen zeigen ihr JSON. Gemeinsam prüfen:

- Wie viel Prozent der eingeschlossenen Fälle haben eine zugeordnete
  Hai-Kategorie? (Erfahrungswert: rund ein Drittel.)
- Addieren sich klassifiziert und unklassifiziert zu eingeschlossen? Und die
  Ausschlüsse plus die Eingeschlossenen zur Gesamtzahl?
- Welche häufigen Rohwerte blieben unklassifiziert – und ist das richtig so?
- Hat jede Ergebniszeile genau die Felder aus dem eigenen Datenvertrag?
- Welche Aussage darf die spätere Story machen, welche nicht?

Jetzt – und erst jetzt – kann `Ablauf/KI_PROMPT_referenz.md` als Vergleich
gezeigt werden: nicht als richtige Lösung, sondern als eine weitere. Interessant
ist, was dort steht und in keiner Spezifikation der Klasse vorkam.

## Gesprächspunkte

- **Die Frage ist Teil des Transforms:** Verschiedene Gruppen haben
  verschiedene Ergebnisse, weil sie verschiedene Fragen gestellt haben. Keines
  davon ist falsch, solange die Regeln dokumentiert sind.
- **Unknown ist ein Ergebnis:** Niedrige Abdeckung darf nicht versteckt werden.
- **Mappings sind Modellierung:** Kategorien vereinfachen die Wirklichkeit.
- **Häufigkeit ist nicht Risiko:** Ohne Anzahl Schwimmer:innen, Surfer:innen
  usw. fehlt der Nenner.
- **KI braucht Aufsicht:** Sie schreibt Regeln schnell, kann aber plausible und
  fachlich falsche Zuordnungen erzeugen. Wer die Spezifikation nicht selbst
  geschrieben hat, merkt es nicht.

## Material in diesem Ordner

| Datei | für wen |
| --- | --- |
| `explore.php` | Klasse, Schritt 2 |
| `KI_PROMPT.md` | Klasse, Schritt 4 – Gerüst zum Ausfüllen |
| `extract.php` | vorbereitet, wird nicht verändert |
| `transform.php` | Startgerüst, falls ohne KI gearbeitet wird |
| `index.php` | Kontrollansicht |
| `Ablauf/KI_PROMPT_referenz.md` | nur Dozierende |
| `solution/` | nur Dozierende |

## Quelle

Global Shark Attack File (GSAF), via Kaggle:
<https://www.kaggle.com/datasets/felipeesc/shark-attack-dataset>
