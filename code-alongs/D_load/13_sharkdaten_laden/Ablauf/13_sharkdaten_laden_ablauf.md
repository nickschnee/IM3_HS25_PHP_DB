# Ablauf `13_sharkdaten_laden`

> **Ziel:** Die 17 Ranking-Zeilen und die 120 Länderzeilen aus Code-Along 10
> stehen in zwei Tabellen. Unterwegs klären sich drei Fragen, die beim
> Hitzesommer nicht auftauchten. Richtwert: 45 Minuten.

## Einordnung

Zusatzmaterial. Wer Code-Along 12 gemacht hat, kennt das Gerüst und arbeitet
hier schneller. Der zweite Durchgang lohnt sich trotzdem, weil andere Daten
andere Entscheidungen verlangen:

| Frage | Hitzesommer (12) | Shark (13) |
| --- | --- | --- |
| Wie viele Tabellen? | zwei, mit Fremdschlüssel | zwei, ohne Fremdschlüssel |
| Warum zwei? | gegen Wiederholung | wegen verschiedener Form |
| Heissen alle Spalten wie im Datenvertrag? | ja | nein, `rank` geht nicht |
| Was verhindert doppelte Zeilen? | `DELETE` vor der Schleife | zusätzlich eine `UNIQUE`-Regel |
| Dürfen Spalten leer bleiben? | fast nie | ja, und `NULL` heisst dort etwas |

Diese Tabelle ist die eigentliche Botschaft des Code-Alongs: Es gibt kein
Standardvorgehen, das man auswendig lernt. Es gibt fünf Fragen an die Daten.

## Ausgangslage

Extract und Transform kommen fertig mit. `transform.php` ist eine mögliche
Lösung aus Code-Along 10.

> **Wenn die Klasse in Code-Along 10 eine eigene Fassung gebaut hat:** Diese
> statt der mitgelieferten verwenden. Solange die Felder der beiden Listen
> stimmen – `dimension`, `rank`, `category`, `incidents` sowie `country`,
> `iso3`, `incidents`, `top_species`, `top_activity` –, läuft `load.php`
> unverändert. Das ist der beste verfügbare Beweis dafür, wozu ein
> Datenvertrag gut ist – und ein guter Moment, ihn genau so zu benennen.

## Vor dem Code (10')

### Wie viele Tabellen, und warum?

Erst fragen, dann `schema.sql` zeigen. Die Frage kommt zum zweiten Mal, und die
Antwort lautet zum zweiten Mal «zwei» – aber aus einem anderen Grund. Genau
darum lohnt sie sich.

Zwei Teilfragen an die Klasse:

**Warum liegen die beiden Ranglisten in einer Tabelle?** Weil es 17 Zeilen und
zwei verschiedene `dimension`-Werte gibt. Eine eigene Tabelle pro Rangliste
brächte nichts und machte jede Abfrage länger. Die Auslagerung der Städte beim
Hitzesommer war keine Regel, sondern eine Rechnung gegen **Wiederholung**.

**Warum liegen die Länder dann nicht auch dort?** Weil sie eine andere **Form**
haben. Ein Land hat einen Ländercode und eine häufigste Art, eine Rangliste hat
einen Platz. In einer gemeinsamen Tabelle wäre in jeder Zeile die Hälfte der
Spalten leer.

An die Tafel, das ist der Merksatz für die Projekte:

```text
gegen Wiederholung  ->  auslagern    (Hitzesommer: Städte)
gegen leere Spalten ->  trennen      (Shark: Ranglisten und Länder)
```

Nachfrage, wenn Zeit ist: Warum gibt es hier keinen Fremdschlüssel? Weil die
beiden Tabellen nichts miteinander zu tun haben. «Platz 3 der Hai-Arten»
gehört zu keinem Land. Ein Fremdschlüssel würde eine Beziehung behaupten, die
es nicht gibt.

### Drei Spalten dürfen leer bleiben

Neu gegenüber allem bisher: In `shark_countries` sind `iso3`, `top_species` und
`top_activity` als `NULL` erlaubt. Die Frage an die Klasse, bevor man es
auflöst:

> Was soll dort stehen, wenn wir es nicht wissen – `0`, ein leerer Text, oder
> gar nichts?

`0` wäre falsch, denn null Vorfälle sind etwas anderes als eine unbekannte Art.
Ein leerer Text wäre ebenfalls falsch, weil man ihn später nicht mehr von einem
echten Wert unterscheiden kann. `NULL` ist die einzige Angabe, die ehrlich
sagt: Wir wissen es nicht.

Das ist keine Formalität. Auf der Karte in Block F entscheidet genau dieses
`NULL`, ob ein Land grau bleibt oder eingefärbt wird.

### Die Spalte, die nicht `rank` heissen darf

`rank` ist in MySQL ein reserviertes Wort – es gibt eine Funktion `RANK()`.
Wer es trotzdem versucht, bekommt:

```text
You have an error in your SQL syntax; check the manual ...
near 'rank SMALLINT NOT NULL)' at line 1
```

Das einmal in phpMyAdmin vorführen, es dauert zwanzig Sekunden und spart im
Projekt eine halbe Stunde Ratlosigkeit. Weitere Wörter mit demselben Problem:
`order`, `group`, `key`, `condition`, `interval`.

Die Meldung zeigt zwar auf die richtige Stelle, sagt aber «Syntaxfehler» und
nicht «reserviertes Wort». Wer den Namen anschaut und nichts Falsches sieht,
sucht sonst am falschen Ort. Merksatz: Sieht eine Spaltendefinition korrekt aus
und die Datenbank meckert trotzdem, ist der Name das Problem.

Wir nennen die Spalte `rank_position`. Der Datenvertrag behält sein Feld
`rank`; übersetzt wird an genau einer Stelle in `load.php`.

### Tabellen anlegen

`schema.sql` in phpMyAdmin ausführen – die Datei legt **beide** Tabellen an.
Die `UNIQUE`-Zeilen kurz benennen, aber noch nicht erklären; sie kommen bei
Schritt 5 zum Zug.

## Schritte im Code (25')

`load.php` enthält acht TODO-Marken:

1. `header('Content-Type: text/plain; charset=utf-8')`.
2. `require __DIR__ . '/../../../config.php';`
3. Transform-Ergebnis holen, `$result['data']` **und** `$result['countries']`
   nehmen. Hier die Frage stellen: Warum kommen `questions`, `rules` und
   `limits` nicht in die Datenbank?
4. Verbindung im `try`-Block aufbauen.
5. `DELETE` für beide Tabellen vor die Schleifen.
6. `prepare()` vor der Schleife, `execute()` darin – und dabei
   `'rank_position' => $row['rank']`.
7. Dasselbe für die Länder. Hier nichts umbenennen: Die Spalten heissen genau
   wie die Felder im Vertrag. Der Schritt fühlt sich langweilig an, und das ist
   die Aussage – die Kette bleibt dieselbe.
8. Kontrolle: `SELECT COUNT(*)`, pro `dimension` die ersten drei Plätze und die
   drei Länder mit den meisten Vorfällen.

Bei Schritt 7 die Frage stellen, bevor es jemand ausprobiert:

> Was schreibt PDO in die Spalte, wenn `iso3` im Transform `null` ist?

Antwort: ein echtes SQL-`NULL`. Wer stattdessen `?? ''` schreibt, um
«sicherzugehen», macht daraus einen leeren Text – und damit einen Wert, der
später nicht mehr von einer echten Angabe zu unterscheiden ist. Das ist der
häufigste Weg, wie Information beim Laden verloren geht.

Bei Schritt 6 lohnt sich ein absichtlicher Fehler: einmal `'rank'` statt
`'rank_position'` schreiben und die Meldung lesen.

```text
SQLSTATE[HY093]: Invalid parameter number: parameter was not defined
```

Die Meldung nennt weder den Feldnamen noch die Zeile. Deshalb ist die Regel
wichtiger als die Meldung: Links steht immer der Platzhalter aus dem SQL,
rechts der Wert aus dem Transform.

## Kontrolle (10')

- `load.php` im Browser aufrufen: 17 Ranking-Zeilen und 120 Länderzeilen,
  danach beide Ranglisten mit ihren ersten drei Plätzen und die drei
  meistgenannten Länder.
- In phpMyAdmin nachsehen: 17 Zeilen mit zwei `dimension`-Werten, 120 Länder
  mit 50 Ländercodes.
- In `shark_countries` nach `iso3 IS NULL` filtern. Ganz oben stehen `COLUMBIA`
  und `NEW BRITAIN` – dieselben Fundstücke wie im Audit aus Code-Along 10, nur
  jetzt in der Datenbank. Gute Stelle für die Frage, ob das ein Fehler ist oder
  ein korrekt festgehaltenes Nichtwissen.
- **Ein zweites Mal aufrufen.** Es bleiben 17 und 120 Zeilen.
- Der lehrreiche Versuch zum Schluss: Zeile 5 (`DELETE`) auskommentieren und neu
  laden. Jetzt bricht das Skript ab:

  ```text
  SQLSTATE[23000]: Integrity constraint violation: 1062
  Duplicate entry 'shark_category-White shark' for key 'shark_rankings.dimension'
  ```

  In der Tabelle stehen weiterhin 17 Zeilen. Das ist der Unterschied zwischen
  «wir vermeiden Duplikate» und «die Datenbank lässt keine zu». Danach die
  Zeile wieder aktivieren.

## Für Gruppen mit einer Live-Sammlung (optional, 10')

Sammelt eine Gruppe Daten über Wochen, darf sie **nicht** löschen: Die
Vergangenheit steht nirgends sonst. Sie braucht das zweite Muster, und dieses
Code-Along hat die halbe Miete bereits eingebaut – die `UNIQUE`-Regel.

```php
// statt DELETE vor der Schleife: INSERT IGNORE in der Schleife
$insertRanking = $pdo->prepare(
    'INSERT IGNORE INTO shark_rankings (dimension, rank_position, category, incidents)
     VALUES (:dimension, :rank_position, :category, :incidents)'
);
```

`INSERT IGNORE` verwandelt den Abbruch von oben in ein stilles Überspringen:
Bekannte Zeilen bleiben, neue kommen dazu. Zwei Dinge dazu sagen:

- Ohne `UNIQUE`-Regel tut `INSERT IGNORE` gar nichts – die Regel ist der Teil,
  der die Arbeit macht.
- Die `UNIQUE`-Spalten müssen zur Sammlung passen. Bei einer Messreihe ist das
  meist Zeitpunkt plus Ort, nicht Kategorie plus Rangliste.

## Gesprächspunkte

- **Vier Fragen statt einer Regel:** Was bedeutet eine Zeile? Welche Datentypen?
  Welcher Wert wiederholt sich? Woran erkennt man eine Zeile eindeutig? Die
  beiden Code-Alongs beantworten sie unterschiedlich, mit derselben Methode.
- **Die Datenbank hat ihr eigenes Vokabular:** Reservierte Wörter sind der
  erste Ort, an dem der Datenvertrag und die Tabelle auseinandergehen. Das ist
  kein Fehler im Vertrag – es wird nur übersetzt, an einer einzigen Stelle.
- **`limits` gehört in die Story, nicht in die Tabelle:** Der Satz
  «Häufigkeiten, keine Aussage über Risiko» hilft niemandem als Spalte, die in
  jeder Zeile dasselbe enthält. Er muss am Marktstand lesbar sein.
- **Ein Rang ist keine Eigenschaft der Kategorie:** `rank_position` gilt nur für
  diesen Zeitraum und diese Regeln. Ändert die Klasse in `transform.php` das
  Jahr `$yearFrom`, ändert sich die Rangfolge. Kurz vorführen.
