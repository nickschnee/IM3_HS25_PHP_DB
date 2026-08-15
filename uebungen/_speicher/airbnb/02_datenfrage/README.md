# 02 – Datenfrage schärfen

**Lernziel:** Du machst aus einem vagen Thema eine Datenfrage, die mit den
Spalten deines Datensatzes tatsächlich beantwortbar ist – und schreibst
gleich dazu, was sie **nicht** beantwortet.

**Richtwert:** 30 Minuten

> Diese Übung enthält **keinen PHP-Code**. Sie ist die Brücke zwischen
> [Übung 01](../01_airbnb_erkunden/) und [Übung 03](../03_airbnb_transformieren/):
> Ohne Frage weiss niemand, was der Transform wegwerfen darf.

Arbeite mit den Befunden aus Übung 01. Wenn du dort keine Notiz gemacht hast,
öffne zuerst nochmals dein `explore.php`.

## Warum zuerst die Frage?

Ein Transform ist eine Kette von Entscheidungen: Welche Zeilen fliegen raus?
Welche Spalten bleiben? Was wird zusammengefasst? Jede dieser Entscheidungen
ist nur begründbar, wenn die Frage feststeht.

«Wir machen etwas mit Airbnb-Daten» ist keine Frage. «Sind es viele Angebote?»
auch nicht – viel im Vergleich wozu?

## Aufgabe 1 – Drei Kandidaten notieren (10')

Schreibe **drei** verschiedene Fragen auf, die dich an deinem Datensatz
interessieren. Noch nicht perfekt, einfach hinschreiben.

Denkanstösse aus den Befunden von Übung 01:

- Wer bietet an: Privatpersonen oder Accounts mit vielen Wohnungen?
- Was wird angeboten: ganze Wohnungen oder Zimmer in bewohnten Wohnungen?
- Wo konzentriert sich das Angebot in der Stadt?
- Wie viele Angebote sind überhaupt noch aktiv?
- Sehen die Angebote nach Ferienwohnung aus – oder nach getarnter Dauermiete?

## Aufgabe 2 – Jede Frage prüfen (10')

Gehe jede deiner drei Fragen mit dieser Checkliste durch. Kreuze ehrlich an.

| Kriterium              | Prüffrage                                                    |
| ---------------------- | ------------------------------------------------------------ |
| **Untersuchungseinheit** | Was ist eine Zeile im Ergebnis: ein Angebot, ein Quartier, eine gastgebende Person? |
| **Kennzahl**           | Was genau wird gezählt oder gerechnet – Anzahl, Anteil, Median? |
| **Vergleich**          | Womit wird verglichen: Stadtteile untereinander, Kategorien, Zeitpunkte? |
| **Zeitbezug**          | Auf welchen Stand beziehst du dich?                            |
| **Spalten vorhanden**  | Welche Spalten brauchst du – und hast du in Übung 01 geprüft, dass sie taugen? |

Eine Frage, bei der du eine Zeile nicht ausfüllen kannst, ist noch nicht fertig.

## Aufgabe 3 – Eine Frage ausformulieren (10')

Kopiere [`datenfrage.md`](datenfrage.md) und fülle sie für **eine** Frage aus.
Wichtig sind vor allem zwei Abschnitte:

- **Was die Daten nicht sagen:** ein Satz, der eine Fehlinterpretation
  verhindert. Wer ihn nicht schreiben kann, kennt seine Daten noch nicht.
- **Zielstruktur:** wie eine Ergebniszeile aussieht. Das ist der Datenvertrag
  für Übung 03 und für dein Frontend-Team.

## Erwartetes Resultat

Eine ausgefüllte `datenfrage.md` mit:

1. einer Frage in einem Satz, mit Ort, Stand und Kennzahl;
2. den Spalten, die du dafür brauchst;
3. den Zeilen, die du ausschliessen wirst, je mit Begründung;
4. einer Beispiel-Ergebniszeile als JSON;
5. einem Satz zur Grenze der Aussage.

## Häufige Fallen

- **Kausalität behaupten.** «Airbnb verdrängt Wohnraum im Kreis 4» kannst du mit
  diesem Datensatz nicht zeigen. «Im Kreis 4 sind X % der Angebote ganze
  Wohnungen» schon.
- **Preise ohne Prüfung.** Wenn die Preisspalte in deiner Stadt leer oder kaputt
  ist, ist jede Preisfrage tot. Zurück zu Aufgabe 1.
- **Zu viele Kategorien.** 34 Quartiere ergeben ein unlesbares Diagramm. Gruppen
  bilden oder auf die Top 10 beschränken.
- **Doppelte Frage.** «Wie viele Angebote gibt es und wie teuer sind sie?» sind
  zwei Fragen. Entscheide dich.
- **Angebot mit Nutzung verwechseln.** Der Datensatz zeigt Inserate, keine
  Buchungen.

## Freiwillige Zusatzaufgaben

- Formuliere zu deiner Frage die **Schlagzeile**, die du erwartest – und
  daneben die Schlagzeile, die dich überraschen würde.
- Zeichne das Diagramm, das die Frage beantwortet, von Hand auf Papier. Welche
  Achsen brauchst du? Passt dein Datenvertrag dazu?
- Tausche deine Frage mit einer anderen Gruppe und lass sie die Checkliste aus
  Aufgabe 2 daran anwenden.
