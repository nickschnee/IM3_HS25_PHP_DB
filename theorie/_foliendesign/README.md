# FHGR Foliendesign

Gemeinsames Design für alle Foliensätze in `theorie/`. Die Foliensätze sind
reveal.js-Präsentationen als einzelne HTML-Datei – kein Build-Schritt.

| Datei | Zweck |
| --- | --- |
| `fhgr-slides.css` | Das Design. Wird von jedem Foliensatz verlinkt, **nicht kopiert**. |
| `vorlage.html` | Startpunkt für einen neuen Foliensatz, zeigt alle Bausteine. |
| [`SCHREIBREGELN.md`](SCHREIBREGELN.md) | Was auf eine Folie kommt und wie es formuliert wird. |
| `pruefe-folien.py` | Prüft einen Foliensatz gegen die Schreibregeln. |

## Neuen Foliensatz anlegen

```bash
mkdir theorie/B_extract
cp theorie/_foliendesign/vorlage.html theorie/B_extract/index.html
```

Danach in `index.html` den Pfad zum Stylesheet anpassen – aus einem
Unterordner ist es eine Ebene höher:

```html
<link rel="stylesheet" href="../_foliendesign/fhgr-slides.css">
```

Braucht ein Foliensatz eine Sonderregel, kommt sie in ein eigenes
`styles.css` im Ordner des Foliensatzes, eingebunden **nach** dem
Foliendesign. Das gemeinsame Stylesheet dafür nicht verändern.

## Das Design

| Element | Wert |
| --- | --- |
| Hintergrund | Weiss, viel Weissraum, alles linksbündig |
| Titel | Oliv `#8B8A6E` |
| Fliesstext | Grau `#575757` |
| Akzent | Petrol `#4B93A4` |
| Kapiteltrenner | Vollflächig Petrol, weisser Titel unten links |
| Aufzählung | Gedankenstrich statt Punkt |
| Foliennummer | Unten links (unten rechts sitzen die Navigationspfeile) |
| Schrift | Helvetica Neue / Helvetica / Arial |

Alle Werte stehen als CSS-Variablen zuoberst in `fhgr-slides.css`.
Schriftgrössen immer in `pt`.

## Bausteine

| Klasse | Wofür |
| --- | --- |
| `title-slide` + `data-state="is-title"` | Titelfolie, blendet die Foliennummer aus |
| `section-divider` + `data-state="is-section-divider"` | Kapiteltrenner in Petrol |
| `.content` | Inhaltsbereich unter dem Folientitel (Pflicht auf Standardfolien) |
| `.callout` `.callout-blue/-orange/-green/-gray` | Hinweisboxen |
| `.box` `.box-outlined` | neutrale Container |
| `.flow` mit `.flow-step` / `.flow-arrow` | Ablauf oder Pipeline |
| `.output` | Ausgabe von Terminal oder Browser |
| `.code-label` | kleine Beschriftung über Code oder Ausgabe |
| `split-slide` mit `.split-half.split-good/.split-bad` | Gegenüberstellung |
| `.footnote` | Quellenangabe unten |
| `.text-sm` … `.text-4xl`, `.text-muted` | Schriftgrösse und Farbe anpassen |
| `.big-statement` | Kernaussage auf der Schlussfolie |
| `.next-step` | Pille „Nächster Schritt: …" |

Mehrspaltige Layouts direkt am Element setzen, nicht als Utility-Klasse:

```html
<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: start;">
```

## Code auf Folien

```html
<pre class="code-sm"><code data-trim data-noescape class="language-php">
&lt;?php
echo "Hallo";
</code></pre>
```

- `data-trim` entfernt Leerzeilen am Anfang und Ende.
- `data-noescape` ist nötig, weil `<` im Code als `&lt;` geschrieben wird.
- `code-sm` verkleinert, `code-lg` vergrössert den Block.

## Code Zeile für Zeile einblenden

Für Folien, auf denen zuerst eine Frage in die Klasse geht: `.code-lines`
statt `<pre><code>`. Jede Zeile ist ein reveal.js-Fragment, erscheint also
auf Klick. Reveal hält den Platz der noch unsichtbaren Zeilen frei – der
Kasten springt beim Einblenden nicht.

```html
<div class="code-lines code-lg fragment" data-fragment-index="0">
  <div class="line fragment" data-fragment-index="0">$zahl = <span class="n">42</span>;   <span class="c">// int</span></div>
  <div class="line fragment" data-fragment-index="1">$text = <span class="s">"Bern"</span>; <span class="c">// string</span></div>
</div>
```

- Der Kasten selbst als Fragment mit `data-fragment-index="0"`: die Folie
  startet dann leer, nur mit dem Titel.
- Token-Klassen: `k` Schlüsselwort, `s` String, `n` Zahl/Literal,
  `c` Kommentar. Es gibt hier kein automatisches Highlighting.
- Ausrichtung mit Leerzeichen funktioniert, die Zeilen sind `white-space: pre`.

Beispiel im Einsatz: Folie „Datentypen" in `theorie/A_PHP_Basics/`.

## Steuerung beim Präsentieren

| Taste | Wirkung |
| --- | --- |
| `→` / `Leertaste` | nächste Folie |
| `S` | Referentenansicht mit Notizen (`<aside class="notes">`) |
| `F` | Vollbild |
| `Esc` | Übersicht aller Folien |

## Vor der Abgabe prüfen

Schreibregeln prüfen (Absätze mit mehr als einem Satz, Blocknamen auf Folien):

```bash
python3 theorie/_foliendesign/pruefe-folien.py theorie/<ordner>/index.html
```

Überlaufende Folien finden (braucht `puppeteer`):

```bash
node ~/.claude/skills/revealjs-1.0.0/scripts/check-overflow.js theorie/<ordner>/index.html
```

PDF exportieren:

```bash
npx decktape reveal theorie/<ordner>/index.html slides.pdf --size 1280x720
```
