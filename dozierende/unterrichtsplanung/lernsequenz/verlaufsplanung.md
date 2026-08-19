# Verlaufsplanung: «HTML-Werkstatt»

**Kontext:** CAS Hochschuldidaktik, Lernsequenz aus dem eigenen Fachgebiet
**Zielgruppe:** Dozierende, mehrheitlich fachfremd, kein Vorwissen im Programmieren
**Dauer:** 20 Minuten
**Material:** Projektor, Laptop, ausgedruckte Arbeitsblätter, Tag-Karten, Post-its

## Ausgangslage und didaktische Reduktion

Wer noch nie programmiert hat, hält Code für eine Geheimsprache. Diese
Vorstellung blockiert den Einstieg stärker als jede fehlende Fachkenntnis.

Die Sequenz reduziert deshalb radikal: Sie behandelt nicht «Webentwicklung»,
sondern genau ein Prinzip.

> Eine Webseite ist gewöhnlicher Text, in dem markiert ist, welche Rolle jeder
> Teil spielt.

Alles andere wird weggelassen: keine Gestaltung, kein CSS, kein Editor, keine
Installation. Gearbeitet wird auf Papier. Der Computer erscheint nur dort, wo
er einen Mehrwert hat, nämlich als sofortige Rückmeldung auf ein selbst
erstelltes Produkt.

Es werden fünf Elemente eingeführt: Überschrift, Absatz, Liste, Listenpunkt,
Hervorhebung.

## Lernziele

Die Teilnehmenden können nach dieser Sequenz:

| Nr. | Lernziel | Bloom-Stufe |
| --- | --- | --- |
| LZ1 | mit eigenen Worten erklären, dass eine Webseite aus Inhalt und zusätzlichen Markierungen der Struktur besteht | 2 Verstehen |
| LZ2 | einen vorgegebenen unformatierten Text mit den fünf Grundelementen vollständig und korrekt auszeichnen | 3 Anwenden |
| LZ3 | in einem fehlerhaften HTML-Ausschnitt zwei Fehler lokalisieren und deren sichtbare Wirkung benennen | 4 Analysieren |
| LZ4 | beschreiben, welche Rolle Präzision und unmittelbare Rückmeldung beim Lernen einer formalen Sprache spielen | 2 Verstehen |

LZ1 bis LZ3 sind die fachlichen Ziele. LZ4 ist das Transferziel für dieses
Publikum: Die Teilnehmenden erleben in vier Minuten selbst, woran Novizinnen
und Novizen scheitern, statt es erzählt zu bekommen.

## Constructive Alignment

| Lernziel | Lernaktivität | Beobachtbarer Nachweis |
| --- | --- | --- |
| LZ1 | Vergleich von gestalteter Seite und Quelltext, danach Kurzinput | Die Teilnehmenden benennen im Plenum, welcher Teil Inhalt und welcher Teil Markierung ist. |
| LZ2 | Werkstatt in Partnerarbeit: gedruckten Text mit Tag-Karten auszeichnen | Auf dem Blatt liegt eine vollständige Auszeichnung; sie wird abgetippt und erzeugt im Browser die erwartete Struktur. |
| LZ3 | Fehlerdiagnose in Partnerarbeit an einem kaputten Ausschnitt | Beide Fehler sind auf dem Arbeitsblatt markiert und die Wirkung ist in einem Satz notiert. |
| LZ4 | One-Sentence Summary auf Post-it und kurze Blitzlichtfrage | Die Post-its nennen Präzision, Verschachtelung oder Rückmeldung als Kern der Erfahrung. |

Keines der Ziele wird durch blosses Zuhören erreicht. LZ2 und LZ3 liegen auf
den Stufen Anwenden und Analysieren, entsprechend führen die Teilnehmenden die
Handlung in beiden Fällen selbst aus.

## Ablaufplan

| Min | Dauer | Lerninhalt und Lernphase | Methode und Sozialform | LZ | Material | Beobachtung oder Nachweis |
| --- | ---: | --- | --- | --- | --- | --- |
| 00 | 2' | **Einstieg.** Fertige Webseite zeigen, danach denselben Inhalt als Quelltext. Frage: «Was steht da eigentlich?» Irritation und Vorwissen aktivieren. | Impulsfrage im Plenum | LZ1 | `01_einstieg.html`, Projektor | Teilnehmende erkennen im Quelltext ihren eigenen Text wieder. |
| 02 | 3' | **Input.** Ein Prinzip: Markierung auf, Inhalt, Markierung zu. Die fünf Elemente an einem Dreizeiler zeigen. Lernziel und Relevanz in einem Satz. | Interaktiver Kurzinput im Plenum | LZ1 | `01_einstieg_roh.html`, Projektor | Zwischenfrage: «Was fehlt hier?» wird korrekt beantwortet. |
| 05 | 6' | **Werkstatt.** Jedes Paar zeichnet den gedruckten Text mit den Tag-Karten aus. Integrieren und verarbeiten. | Werkstattarbeit in Partnerarbeit | LZ2 | `02_werkstatt_text.pdf`, Tag-Karten | Rundgang: liegen Karten paarweise und in richtiger Reihenfolge? |
| 11 | 3' | **Sicherung.** Ein Paar liest seine Lösung vor, die Lehrperson tippt sie live ab und lädt die Seite. Unmittelbare Rückmeldung am eigenen Produkt. | Ergebnissicherung im Plenum | LZ2 | `live/index.html`, Browser | Die projizierte Seite zeigt Überschrift, Absätze und Liste korrekt. |
| 14 | 4' | **Fehlerjagd.** Kaputter Ausschnitt und kaputtes Resultat nebeneinander, zwei Fehler suchen. Vertiefen und übertragen. | Fehlerdiagnose in Partnerarbeit | LZ3 | `03_fehlerjagd_arbeitsblatt.pdf` | Beide Fehler sind markiert; die Wirkung ist benannt. |
| 18 | 2' | **Abschluss.** Post-it: «Code ist für mich …». Blitzlicht: «An welcher Stelle sind Sie kurz steckengeblieben?» | One-Sentence Summary in Einzelarbeit, danach Blitzlicht im Plenum | LZ4 | Post-its, Flipchart | Post-its am Flipchart; sie sind der Einstieg in die Feedbackrunde. |

Der Ablauf enthält 5 Minuten Input und 15 Minuten aktive Auseinandersetzung.
Das Sandwich-Prinzip ist zweimal umgesetzt: Input, Anwendung, Rückmeldung,
Analyse, Reflexion.

## Verwendung der formativen Rückmeldungen

Die beiden Aktivitäten sind zugleich Classroom Assessment Techniques.

- **Rundgang während der Werkstatt:** Zeigt sofort, ob das Prinzip «Markierung
  auf und zu» verstanden ist. Fehlen bei mehreren Paaren die schliessenden
  Karten, wird die Sicherung genau an diesem Punkt aufgehängt statt an der
  Gesamtlösung.
- **One-Sentence Summary am Schluss:** Die Post-its zeigen, ob die Sequenz als
  Sprachlektion oder als Erfahrung über Präzision und Rückmeldung angekommen
  ist. In einer längeren Veranstaltung wäre das der Anschlusspunkt für die
  nächste Einheit.

## Vorbereitete Antworten auf erwartbare Fragen

**«Ist HTML überhaupt Programmieren?»**
Streng genommen nicht, es ist eine Auszeichnungssprache ohne Logik. Für die
hier verfolgten Lernziele ist das der Vorteil: Die Regeln formaler Sprachen –
strikte Syntax, Verschachtelung, sofortiges Scheitern bei Ungenauigkeit –
gelten identisch, aber das Ergebnis ist nach dreissig Sekunden sichtbar. Diese
Einordnung wird im Abschluss offen benannt.

**«Macht das heute nicht die KI?»**
Sie schreibt den Code, aber sie beurteilt nicht, ob das Ergebnis stimmt. Genau
das haben die Teilnehmenden in der Fehlerjagd getan.

## Wenn die Zeit knapp wird

Die Fehlerjagd wird auf einen Fehler gekürzt und im Plenum statt in
Partnerarbeit gelöst. Die Werkstatt wird nicht gekürzt, sie trägt das
Hauptlernziel.

## Wenn Zeit übrig bleibt

Zwei Paare vergleichen, welchen Textteil sie hervorgehoben haben, und
begründen die Entscheidung. Das öffnet den Übergang zur Frage, wo bei formalen
Sprachen der Gestaltungsspielraum liegt.
