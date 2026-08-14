# Block C – Transform: Eine Frage wird zu Regeln

## Lernziel

Nach diesem Block könnt ihr erklären und dokumentieren,

- warum eine Transformation von der Datenfrage abhängt;
- welche Datensätze und Felder ihr behaltet oder entfernt;
- wie ihr uneinheitliche Werte normalisiert;
- was eine Zeile in eurem Resultat bedeutet;
- wie viele Daten durch eure Entscheidungen verloren gehen;
- wie ihr KI für die Umsetzung nutzt, ohne ihr die fachlichen Entscheidungen
  zu überlassen.

## Der zentrale Gedanke

Im Extract haben wir Rohdaten eingelesen. Sie sind noch nicht automatisch für
eine Story geeignet.

```text
Extract:   Woher kommen die Daten und wie lesen wir sie?
Transform: Welche Daten brauchen wir für unsere Frage, was bedeuten sie,
           und in welche Form bringen wir sie?
```

Säubern gehört also dazu. Es ist nur kein eigener, neutraler Arbeitsschritt:
Welche Werte falsch sind und welche Schreibweise gilt, folgt genauso aus der
Frage wie die Auswahl der Zeilen.

Es gibt keine neutrale «Aufräumfunktion». Dieselbe Spalte kann für eine Frage
wichtig und für eine andere irrelevant sein. Jede Transformation enthält
Entscheidungen.

## Die Frage bestimmt die Form

### Hitzesommer

Eine mögliche Frage lautet:

> Wie hat sich die Anzahl Hitzetage pro meteorologischem Sommer in Bern, Chur
> und Zürich seit 1940 verändert?

Daraus folgen Regeln:

- Wir behalten nur Juni, Juli und August.
- Wir definieren einen Hitzetag als Tag mit mindestens 30 °C Tagesmaximum.
- Wir zählen pro Stadt und Jahr.
- Wir schliessen einen Sommer aus, wenn er nicht vollständig ist.

Wenn die Frage stattdessen «An welchem Tag war es am heissesten?» lautet, wäre
das Filtern auf Sommermonate nicht zwingend. Eine andere Frage führt zu einer
anderen Transformation.

### Shark Attacks

Diese Rohdaten sind viel unordentlicher. In `Species` stehen zum Beispiel
Artname, Grösse und Unsicherheit im selben Textfeld. In `Activity` gibt es viele
Schreibweisen für ähnliche Tätigkeiten.

Die plakative Frage «Welcher Hai greift am häufigsten an?» behauptet mehr, als
die Daten zeigen. Besser ist:

> Welche identifizierte Hai-Kategorie kommt in bestätigten, unprovozierten
> GSAF-Vorfällen von 1950 bis 2018 am häufigsten vor?

Und als zweite Frage:

> Bei welcher vereinheitlichten Aktivitätsgruppe wurden in derselben Auswahl
> die meisten Vorfälle erfasst?

Das Resultat ist eine **Häufigkeit in diesem Datensatz**. Es ist kein Risiko.
Für ein Risiko bräuchten wir zusätzlich die Anzahl Personen pro Aktivität, Ort
und Zeitraum – also die Exposition.

## Vor dem Code: fünf Entscheidungen

### 1. Auswahl

Welche Fälle gehören zur Frage? Zeitraum, Ort, Vorfalltyp und Mindestqualität
müssen nachvollziehbar definiert sein.

### 2. Untersuchungseinheit

Was bedeutet eine Zeile nach dem Transform?

- Heat: eine Stadt in einem Sommer;
- Shark-Ranking: eine Kategorie mit ihrer Anzahl Vorfälle;
- anderes Projekt: vielleicht ein Messwert, ein Land oder eine Woche.

Beim Aggregieren verändert sich die Untersuchungseinheit. Danach kann man nicht
mehr jede Detailfrage zu den ursprünglichen Einzelereignissen beantworten.

### 3. Kategorien

Welche Rohwerte werden zusammengefasst? Ein Mapping ist eine fachliche
Behauptung. Es braucht eine Begründung und soll im Code sichtbar bleiben.

### 4. Fehlende Werte

Fehlend ist nicht gleich null, ungefähr null oder «Nein». Unbekannte Werte
werden als `null` behandelt oder bewusst ausgeschlossen. Die Anzahl muss im
Audit erscheinen.

### 5. Zielstruktur

Backend und Frontend vereinbaren Feldnamen, Datentypen und ein Beispiel. Dieser
Datenvertrag wird vor der Implementation geschrieben.

## KI-Workflow

Die KI übernimmt Fleissarbeit gut: Schleifen schreiben, Mapping-Code erzeugen,
Tests ergänzen oder unbekannte Rohwerte gruppieren. Sie kann aber nicht wissen,
welche Definition zu eurer Story passt.

### Auftrag an die KI

Ein guter Auftrag enthält:

```text
Datenfrage
Untersuchungseinheit
Eingabefelder plus repräsentative Beispielwerte
explizite Filter- und Mapping-Regeln
Zieldatenvertrag mit Datentypen
gewünschte Audit-Zahlen
unklare Fälle, die nicht geraten werden dürfen
```

Fordert die KI auf, Annahmen separat zu nennen. Wenn sie eine neue Kategorie
oder einen Filter erfindet, entscheidet ihr, ob dieser fachlich vertretbar ist.

### Was geprüft werden muss

- Stimmen die Summen vor und nach dem Transform?
- Welche Rohwerte landen in `Andere` oder `Unbekannt`?
- Wurden einzelne Wörter versehentlich falsch zugeordnet?
- Sind Zahlen wirklich Zahlen und Wahrheitswerte wirklich `bool` oder `null`?
- Lässt sich jede Regel aus der Datenfrage begründen?

## Die Transform-Notiz gehört zum Projekt

Legt im Projekt eine Datei `TRANSFORM.md` an. Darin stehen:

1. Datenfrage und Zeitraum;
2. Untersuchungseinheit;
3. alle Filter-, Mapping- und Ableitungsregeln;
4. Datenvertrag mit Beispiel;
5. Audit-Zahlen;
6. bekannte Grenzen und offene Fälle;
7. welche Teile mit KI erstellt und wie sie geprüft wurden.

Code kann geändert oder neu generiert werden. Diese Entscheidungen müssen
stabil und für andere nachvollziehbar bleiben.

## Merksatz

> Wir säubern Daten nicht «allgemein». Wir übersetzen eine Datenfrage in
> dokumentierte, überprüfbare Regeln.

---

## Der Foliensatz

`index.html` ist die Präsentation zu diesem Text – eine einzelne HTML-Datei
ohne Build-Schritt. Richtwert 30 Minuten.

```bash
open index.html
```

Reveal.js kommt über ein CDN, für die Präsentation braucht es also eine
Internetverbindung.

| Taste | Wirkung |
| --- | --- |
| `→` / `Leertaste` | nächste Folie |
| `←` | zurück |
| `S` | Referentenansicht mit Notizen |
| `F` | Vollbild |
| `Esc` | Übersicht aller Folien |

### Aufbau

| Folien | Kapitel |
| --- | --- |
| 1–3 | Titel, Inhalt, Einordnung in die ETL-Kette |
| 4–12 | Die Frage bestimmt die Form (Hitzesommer, Shark-Rohwerte, Datenerkundung, Nenner) |
| 13–19 | Sieben Transformationsformen, Untersuchungseinheit, Reihenfolge, `null`, Mapping |
| 20–24 | Datenvertrag, Audit, Abdeckung, `TRANSFORM.md` |
| 25–29 | Verkettung der Skripte, `include`/`return`, `__DIR__`, Kontrollansicht |
| 30–34 | Neue Schreibweisen: `??`, Casts, `continue`, Leseliste |
| 35–38 | KI: Spezifikation statt Zuruf, Prüfliste |
| 39–40 | Ausblick und Kernaussage |

Jeder Kapiteltrenner trägt oben einen schmalen Streifen mit der ETL-Kette und
der aktuellen Position. Er kommt aus `styles.css` in diesem Ordner; das
gemeinsame Design steht unverändert in `theorie/_foliendesign/`.

Alle Zahlen auf den Folien zu Audit und Abdeckung stammen aus den tatsächlichen
Ausgaben der beiden Code-Alongs, alle Code-Beispiele wörtlich aus deren
Lösungen.

### Was wo behandelt wird

Der Anspruch des Foliensatzes: Kein Begriff und kein PHP-Konstrukt taucht im
Code-Along zum ersten Mal auf.

| Konstrukt | wo erklärt |
| --- | --- |
| `include`, `return` in einer Datei, `__DIR__`, `.` | Folien 27 und 28 |
| `??`, `(int)`/`(float)`/`(string)`, `continue` | Folien 31 bis 33 |
| `json_encode` mit Flags, `header(...)` | Folie 29 |
| `substr`, `is_numeric`, `in_array(..., true)`, `usort`/`<=>`, `str_contains`, `arsort`, `array_slice`, `throw` | Folie 34 als Leseliste, Details im Cheatsheet |
| `preg_match` mit `\b`, Referenzen mit `&`, Spread `...` | nur Cheatsheet und mündlich im Code-Along |

### Bezug zum übrigen Material

- Vorwissen: [`theorie/B_extract/`](../B_extract/)
- Direkt danach: [`stift-und-papier/02_transform_weather/`](../../stift-und-papier/02_transform_weather/)
- Code-Alongs: [`09_hitzesommer_transformieren`](../../code-alongs/C_transform/09_hitzesommer_transformieren/)
  und [`10_sharkdaten_transformieren`](../../code-alongs/C_transform/10_sharkdaten_transformieren/)
- Projektarbeit: [`uebungen/C_transform/01_eigener_transform/`](../../uebungen/C_transform/01_eigener_transform/)
- Nachschlagewerk: [`cheatsheets/230_transform.md`](../../cheatsheets/230_transform.md)

### Nach Änderungen prüfen

```bash
python3 theorie/_foliendesign/pruefe-folien.py theorie/C_transform/index.html
node ~/.claude/skills/revealjs-1.0.0/scripts/check-overflow.js theorie/C_transform/index.html
npx decktape reveal theorie/C_transform/index.html slides.pdf --size 1280x720
```

### Offene Punkte

- Der Foliensatz ist mit 40 Folien für 30 Minuten dicht. Falls es im Unterricht
  nicht aufgeht, sind die Kapitel «Wie die Dateien zusammenhängen» und «Neue
  Schreibweisen» die Kandidaten zum Kürzen, weil beide im Code-Along ohnehin
  wieder auftauchen.
