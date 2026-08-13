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
Transform: Welche Daten brauchen wir für unsere Frage und was bedeuten sie?
```

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
