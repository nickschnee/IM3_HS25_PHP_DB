# Lernsequenz «HTML-Werkstatt»

20-minütige Unterrichtseinheit für das CAS Hochschuldidaktik. Zielgruppe sind
Dozierende ohne jedes Vorwissen im Programmieren.

Die didaktische Planung mit Lernzielen, Alignment-Tabelle und Ablaufplan steht
in [`verlaufsplanung.md`](verlaufsplanung.md). Diese Datei hier ist die
Regieanweisung für die Durchführung.

## Idee in drei Sätzen

Die Teilnehmenden zeichnen einen gedruckten Text mit Karten aus, auf denen
HTML-Tags stehen. Ihre Lösung wird live abgetippt und im Browser gezeigt.
Danach suchen sie in einem fehlerhaften Beispiel zwei Fehler.

Gearbeitet wird auf Papier. Niemand braucht einen Laptop.

## Vorbereitung

### Drucken und schneiden

Für **jedes Paar** einmal:

| Datei | Was daraus wird |
| --- | --- |
| `material/03_werkstatt_textstreifen.html` | 8 Textstreifen, entlang der gestrichelten Linien schneiden |
| `material/04_tag_karten.html` | 18 Tag-Karten, schneiden und mischen |
| `material/05_werkstatt_auftrag.html` | 1 Auftragsblatt, bleibt ganz |
| `material/10_fehlerjagd_arbeitsblatt.html` | 1 Arbeitsblatt, bleibt ganz |

Alle vier passen auf je eine A4-Seite. Fertig ausgegeben liegen sie als PDF in
`druckvorlagen/`; das ist der schnellste Weg zum Drucker und die Fassung für
den Austauschordner. Wer etwas ändern will, bearbeitet die HTML-Datei in
`material/`, öffnet sie im Browser und druckt sie neu.

Das Schneiden dauert länger als das Drucken. Für sechs Paare sind es rund 150
Schnipsel, also etwa 30 Minuten Vorbereitung. Jedes Set gehört danach in ein
eigenes Couvert, dann ist das Material wiederverwendbar.

Wer nicht drucken kann, schreibt die 18 Tags von Hand auf Moderationskarten
und die 8 Textstreifen auf Papierstreifen. Das funktioniert genauso.

### Am Laptop vorbereiten

Vier Tabs in dieser Reihenfolge offen halten:

1. `material/01_einstieg.html` – die fertige Seite
2. `material/02_prinzip.html` – Code und Ergebnis nebeneinander
3. `material/06_live.html` – hier wird live getippt, Editor daneben offen
4. `material/08_fehlerjagd_kaputt.html` – die kaputte Seite

`material/07_loesung.html` und `material/09_fehlerjagd_korrekt.html` sind die
Rückfallebene, falls das Livetippen scheitert. Nicht als Tab offen lassen,
sondern nur bei Bedarf öffnen.

### Im Raum

Tische so stellen, dass jedes Paar etwa eine A3-Fläche frei hat. Die Streifen
liegen untereinander, die Tag-Karten links und rechts davon. Die Lösung wird
also etwa 40 cm breit und 30 cm hoch.

Flipchart für die Post-its am Schluss bereitstellen.

## Regie

| Min | Was | Womit |
| --- | --- | --- |
| 00 | Fertige Seite zeigen. Fragen: «Was steht hinter dieser Seite?» Antworten sammeln, nicht bewerten. Dann `06_live.html` im Browser öffnen: derselbe Text ohne Markierungen, alles klebt in einer Zeile. | Tab 1, dann Tab 3 |
| 02 | Prinzip zeigen: Markierung auf, Inhalt, Markierung zu. Die sechs Elemente benennen. Sagen, was gleich zu tun ist und warum es um mehr geht als um HTML. | Tab 2 |
| 05 | Material verteilen, Auftrag vorlesen lassen, Zeit ansagen. Danach herumgehen und **nicht** korrigieren, nur beobachten. | Couverts, Auftragsblatt |
| 11 | Ein Paar liest seine Lösung von oben nach unten vor. Genau das tippen, was gesagt wird, auch wenn es falsch ist. Seite neu laden. | Tab 3, Editor |
| 14 | Fehlerjagd-Blatt verteilen, kaputte Seite parallel projizieren. Zeit ansagen. | Tab 4, Arbeitsblatt |
| 18 | Post-it: «Code ist für mich …». Blitzlicht: «Wo sind Sie kurz steckengeblieben?» Post-its ans Flipchart. | Post-its, Flipchart |

Der Moment in Minute 11 trägt die ganze Sequenz. Wenn dort ein Fehler
auftaucht, ist das kein Zwischenfall, sondern das beste Material für die
Fehlerjagd unmittelbar danach.

## Dateien

```text
lernsequenz/
├── README.md                      diese Regieanweisung
├── verlaufsplanung.md             Lernziele, Alignment, Ablaufplan
├── handout_lerngruppe.md          Kurzfassung für den Austauschordner
├── druckvorlagen/                 dieselben vier Blätter als fertiges PDF
└── material/
    ├── 01_einstieg.html                  fertige Webseite, Projektion
    ├── 02_prinzip.html                   Code und Ergebnis nebeneinander, Projektion
    ├── 03_werkstatt_textstreifen.html    Druckvorlage, 8 Streifen pro Paar
    ├── 04_tag_karten.html                Druckvorlage, 18 Karten pro Paar
    ├── 05_werkstatt_auftrag.html         Druckvorlage, Auftrag für die Werkstatt
    ├── 06_live.html                      wird im Unterricht live ergänzt
    ├── 07_loesung.html                   fertige Fassung als Rückfallebene
    ├── 08_fehlerjagd_kaputt.html         kaputte Seite, Projektion
    ├── 09_fehlerjagd_korrekt.html        korrigierte Seite, Projektion
    ├── 10_fehlerjagd_arbeitsblatt.html   Druckvorlage, Fehlerjagd
    └── 11_fehlerjagd_loesung.md          Lösung und Auflösungsfragen
```

## Hinweise

Die Dateien `06_live.html`, `07_loesung.html`, `08_fehlerjagd_kaputt.html` und
`09_fehlerjagd_korrekt.html` haben bewusst **kein** CSS. Sie sehen deshalb
nackt aus. Genau das ist der Punkt: Der Unterschied zwischen den beiden
Fassungen entsteht allein durch die Struktur, nicht durch Gestaltung.

Wenn jemand fragt, wo denn nun die Farben und das Layout herkommen, ist die
Antwort ein Satz: das ist eine zweite Sprache namens CSS, und die ist heute
nicht dran. Nicht mehr dazu sagen, sonst kippt die Reduktion.
