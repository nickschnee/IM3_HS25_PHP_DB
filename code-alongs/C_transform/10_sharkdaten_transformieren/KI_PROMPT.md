# Euer KI-Auftrag für den Shark-Transform

Ihr schreibt den Prompt selbst. Dieses Blatt gibt nur die Gliederung vor.

Der Grund: «Räume die Daten auf» ergibt Code, den ihr nicht prüfen könnt, weil
ihr selbst nicht wisst, was richtig gewesen wäre. Ein brauchbarer Auftrag ist
eine **Spezifikation** – er enthält alle Entscheidungen, die die KI nicht für
euch treffen darf.

Arbeitet der Reihe nach. Jeder Abschnitt entsteht aus dem, was ihr in
`explore.php` gesehen habt.

---

## 1. Datenfragen

Schreibt eure zwei Fragen hin, so präzise, dass sie mit diesen Daten
beantwortbar sind.

Prüft jede Frage:

- Steht drin, welcher **Zeitraum** gilt?
- Steht drin, welche **Fälle** überhaupt zählen?
- Behauptet die Frage mehr, als die Daten hergeben?

```text
Frage 1:

Frage 2:

Frage 3:
```

## 2. Was das Ergebnis nicht sagt

Ein Satz, der verhindert, dass jemand aus eurem Resultat etwas Falsches liest.

```text
Einschränkung:
```

## 3. Filterregeln

Welche Zeilen fliegen raus, und woran erkennt man sie?

Für jede Regel: Spalte, Bedingung, Begründung.

```text
Filter 1:
Filter 2:
Filter 3:
```

Dazu die Anweisung an die KI, jeden Ausschluss **nach Grund getrennt** zu
zählen. Ohne diese Zahlen könnt ihr später nicht prüfen, ob der Filter das tut,
was ihr wolltet.

## 4. Normalisierung

Für jede Spalte, die ihr vereinheitlicht:

- Welche **Kategorien** soll es geben? Die Liste ist eure Entscheidung.
- An welchen **Textmustern** erkennt man sie?
- Was passiert mit Werten, die zu keiner Kategorie passen?
- Welche Werte dürfen **nicht geraten** werden?
- Gibt es Muster, die sich gegenseitig in die Quere kommen? In welcher
  **Reihenfolge** müssen sie geprüft werden?

```text
Spalte:
Kategorien:
Nicht zuordenbar, wenn:
Reihenfolge beachten bei:
```

### Sonderfall: nachschlagen statt einordnen

Bei einer Spalte läuft es anders. Wo ein Wert einen offiziellen Code hat –
ein Land, eine Währung, eine Gemeinde – erfindet ihr keine Kategorien, sondern
benutzt eine **Nachschlagetabelle**.

`data/laender_iso.json` ist so eine Tabelle. Schreibt in euren Auftrag, was
damit geschehen soll:

- Wie wird die Schreibweise vorher vereinheitlicht?
- Was passiert mit einem Namen, der nicht in der Tabelle steht?
- Woran merkt ihr, dass ein Eintrag fehlt?

```text
Nachschlagetabelle:
Vereinheitlichung vorher:
Nicht in der Tabelle:
```

## 5. Felder, die ihr nicht braucht

Nennt sie ausdrücklich. Sonst transformiert die KI Spalten, die in eurem
Datenvertrag gar nicht vorkommen.

```text
Nicht benötigt:
```

## 6. Zieldatenvertrag

Wie sieht **eine** Ergebniszeile aus? Feldnamen und Datentypen, als Beispiel
hingeschrieben.

```json

```

Dazu: Wie viele Zeilen, in welcher Sortierung, und was passiert bei
Gleichstand?

## 7. Audit

Welche Zahlen muss der Code mitliefern, damit ihr das Ergebnis prüfen könnt?

Denkt an:

- wie viele Zeilen reinkamen;
- wie viele pro Grund ausgeschlossen wurden;
- wie viele übrig blieben;
- wie viele Werte zugeordnet werden konnten und wie viele nicht;
- welche nicht zugeordneten Rohwerte am häufigsten sind;
- welche Namen in der Nachschlagetabelle fehlen.

```text
Audit-Zahlen:
```

## 8. Schlusssätze an die KI

Diese drei Anweisungen gehören ans Ende jedes Auftrags:

```text
Liste vor dem Code alle Annahmen und mehrdeutigen Entscheidungen auf.
Erfinde keine zusätzlichen Kategorien.
Schreibe kleine, einzeln prüfbare Funktionen.
```

---

## Nach der Antwort

Der Code ist noch nicht fertig, wenn er läuft. Prüft:

1. **Stichprobe:** mindestens zehn Rohwerte pro Kategorie. Sind sie richtig
   einsortiert?
2. **Falsche Treffer durch Teilwörter:** Hat ein kurzes Suchwort etwas
   erwischt, das gar nicht gemeint war?
3. **Die häufigsten nicht zugeordneten Werte:** Steht dort etwas, das ihr
   eigentlich zuordnen könntet? Dann fehlt eine Regel.
4. **Die Abdeckung:** Für wie viel Prozent eurer Fälle habt ihr überhaupt eine
   Aussage? Ist diese Zahl niedrig, gehört sie in die Story.
5. **Annahmen:** Hat die KI Entscheidungen getroffen, die ihr nicht
   aufgeschrieben hattet? Jede davon gehört geprüft und dann in eure
   Spezifikation nachgetragen.

Eine neue Regel wird **zuerst hier oben** ergänzt und erst danach im Code. Sonst
weiss nach zwei Runden niemand mehr, warum der Code tut, was er tut.

Keine Zugangsdaten und keine schützenswerten Personendaten an ein KI-Tool geben.
