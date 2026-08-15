# 01 – Airbnb-Daten holen & erkunden

**Lernziel:** Du lädst einen echten, unaufgeräumten Datensatz herunter und
findest mit einem Erkundungsskript heraus, was in den Spalten wirklich steht –
bevor du eine einzige Transform-Regel schreibst.

**Richtwert:** 45 Minuten

Diese Übung ist der erste Teil einer Dreierserie mit denselben Daten:

1. **01 – Daten holen & erkunden** (diese Übung)
2. [02 – Datenfrage schärfen](../02_datenfrage/)
3. [03 – Airbnb-Daten transformieren](../03_airbnb_transformieren/)

## Kontext: Inside Airbnb

[Inside Airbnb](https://insideairbnb.com/) ist ein Datenprojekt, das die
öffentlich sichtbaren Airbnb-Angebote einer Stadt regelmässig abgreift und als
CSV veröffentlicht. Die Daten werden weltweit im Datenjournalismus verwendet,
wenn es um Wohnraum, Tourismus und Kurzzeitvermietung geht.

Zwei Dinge musst du dabei von Anfang an mitdenken:

- Inside Airbnb ist **nicht neutral**. Das Projekt ist ausdrücklich
  wohnungspolitisch motiviert. Das macht die Daten nicht falsch, aber es gehört
  in deine Quellenangabe.
- Die Daten sind eine **Momentaufnahme der Angebotsseite**. Sie zeigen, was
  inseriert war – nicht, was tatsächlich gebucht oder bezahlt wurde.

## Aufgabe 1 – Datensatz herunterladen

1. Öffne <https://insideairbnb.com/get-the-data/> und suche eine Stadt aus.
   Zürich, Genf und die Waadt sind dabei; grosse Städte wie Wien, Berlin oder
   Barcelona haben deutlich mehr Angebote.
2. Lade aus dem Abschnitt der Stadt die Datei **`listings.csv`** unter
   *visualisations* herunter. Das ist die kleine Übersichtsdatei mit rund 20
   Spalten (ein paar hundert Kilobyte).
   - **Nicht** `listings.csv.gz` aus dem Abschnitt *data*: die hat 90 Spalten
     und ist gepackt. Für den Anfang ist sie zu unübersichtlich.
3. Speichere die Datei in dieser Übung als **`data/listings.csv`**. Der Ordner
   liegt schon leer bereit.
4. Notiere dir **Stadt und Datum** des Datensatzes (steht auf der Downloadseite
   in der Spalte *Date Compiled*). Ohne dieses Datum ist deine spätere Aussage
   nicht überprüfbar.

## Aufgabe 2 – Spalten sichtbar machen

Öffne `explore.php` im Browser. Das Skript liest die CSV über `extract.php`
ein und sagt dir zunächst nur, wie viele Zeilen darin stehen.

Löse **TODO 1** und gib alle Spaltennamen aus.

## Aufgabe 3 – Textspalten zählen

Löse **TODO 2**. Lass dir für mindestens drei Textspalten anzeigen, welche
Werte vorkommen und wie oft.

Frage dich bei jeder Spalte:

- Wie viele **verschiedene** Werte gibt es – eine Handvoll oder Hunderte?
- Gibt es Werte, die eigentlich «wir wissen es nicht» bedeuten?
- Ist die Spalte überhaupt gefüllt? (`neighbourhood_group` ist nicht in jeder
  Stadt vorhanden. Wenn sie leer ist, nimm `neighbourhood`.)

## Aufgabe 4 – Zahlenspalten prüfen

Löse **TODO 3**. Schau dir mindestens drei Zahlenspalten an.

Hier trennt sich brauchbar von unbrauchbar. Achte auf:

- **Leere Werte:** Wie viele Angebote haben gar keinen Wert?
- **Nullen:** Bedeutet `0` hier wirklich null – oder «keine Angabe»?
- **Spannweite:** Passen Minimum und Maximum zur Realität? Ein Preis von `0`
  oder eine Mindestaufenthaltsdauer von `1125` Nächten braucht eine Erklärung.

> **Wichtig:** In manchen Städten ist die Spalte `price` in der Übersichtsdatei
> unbrauchbar. Prüfe das, bevor du eine Preisstory planst.

## Aufgabe 5 – Zeitachse prüfen

Löse **TODO 4**. Zähle, in welchem Jahr ein Angebot zuletzt bewertet wurde –
und wie viele Angebote nie eine Bewertung bekommen haben.

Ein Angebot, dessen letzte Bewertung von 2017 stammt, steht im Datensatz, ist
aber vermutlich seit Jahren tot. Bei jeder naiven Auszählung zählt es trotzdem
mit.

## Aufgabe 6 – Befunde aufschreiben

Halte in einer kurzen Notiz fest (drei bis fünf Sätze reichen):

1. Stadt, Datum und Anzahl Angebote deines Datensatzes.
2. Drei Spalten, auf die du dich verlassen würdest – mit Begründung.
3. Eine Spalte, die du **nicht** verwenden würdest – mit Begründung.
4. Die Überraschung: Was hast du erwartet, was steht wirklich drin?

Diese Notiz ist der Ausgangspunkt für [Übung 02](../02_datenfrage/).

## Erwartetes Resultat

Reiner Text im Browser, etwa so (Zahlen deiner Stadt):

```text
Inside Airbnb – Datenerkundung
3308 Angebote eingelesen.

======================================================================
Spalte "room_type" – alle Werte
======================================================================
4 verschiedene Werte in 3308 Zeilen

  2556   77.3%  Entire home/apt
   740   22.4%  Private room
     8    0.2%  Shared room
     4    0.1%  Hotel room
```

## Wenn du feststeckst

- Fehlermeldung «data/listings.csv fehlt»: Die Datei liegt nicht am richtigen
  Ort oder heisst anders. Sie muss exakt `data/listings.csv` heissen.
- Alle Werte sind `(leer)`: Du hast wahrscheinlich `neighbourhood_group` in
  einer Stadt geprüft, die keine Bezirksebene hat. Nimm `neighbourhood`.
- Umlaute sehen kaputt aus: Der Header `Content-Type: text/plain; charset=utf-8`
  muss ganz oben stehen, bevor irgendetwas ausgegeben wird.
- Du willst nur schnell in eine Zeile schauen: `print_r($listings[0]);`

## Freiwillige Zusatzaufgaben

- Zähle, wie viele Angebote zu Gastgeber:innen mit mehr als einem Angebot
  gehören (`calculated_host_listings_count`).
- Lade dieselbe Stadt zu zwei verschiedenen Daten herunter und vergleiche die
  Anzahl Angebote.
- Öffne die grosse `listings.csv.gz` und schau dir an, welche Spalten dort
  zusätzlich vorhanden sind.
