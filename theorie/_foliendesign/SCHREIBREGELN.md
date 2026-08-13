# Schreibregeln für Folien

Diese Regeln gelten für alle Foliensätze in `theorie/`. Sie wachsen mit –
was sich im Unterricht bewährt oder stört, kommt hier rein.

> `fhgr-slides.css` regelt, **wie** eine Folie aussieht.
> Diese Datei regelt, **was** draufsteht.

---

## 1. Ein Absatz, ein Satz

Ein `<p>` enthält genau eine Aussage. Stehen zwei Sätze zusammen, werden sie
zwei Absätze.

```html
<!-- nein -->
<p>Doppelte Anführungszeichen setzen Variablen ein. Einfache nicht.</p>

<!-- ja -->
<p>Doppelte Anführungszeichen setzen Variablen ein.</p>
<p>Einfache nicht.</p>
```

Gilt auch innerhalb von `.callout` und `.box`. Der Abstand kommt automatisch
aus `p + p`.

**Ausnahme:** Wenn der zweite Satz nur ein Zusatz von zwei, drei Wörtern ist,
lieber zu einem Satz zusammenziehen als einen Mini-Absatz bauen.

```html
<!-- nein: Absatz mit einem Wort -->
<p>Erst die Regel, dann der Code. Immer.</p>

<!-- ja -->
<p>Erst die Regel, dann der Code – immer.</p>
```

**Prüfen:** Der Check unter „Vor der Abgabe prüfen" in `README.md` findet alle
Absätze mit mehr als einem Satz.

## 2. Ein Aufzählungspunkt, ein Gedanke

Dieselbe Regel für Listen. Zwei Aussagen in einem `<li>` werden zwei `<li>`.

```html
<!-- nein -->
<li>Erlaubt: Buchstaben, Zahlen, _ – aber nie mit einer Zahl beginnen</li>

<!-- ja -->
<li>Erlaubt: Buchstaben, Zahlen, _</li>
<li>Aber nie mit einer Zahl beginnen</li>
```

## 3. Keine Blockstruktur des Kurses auf den Folien

Studierende denken nicht in „Block A" und „Block C". Auf den Folien steht
„in diesem Kurs", „später", „im Projekt" – nicht die interne Kursstruktur.
Blocknamen gehören in `ablauf_studierende.md` und in die Sprechernotizen.

## 4. Titel benennt die Sache, nicht die Kategorie

„Warum Funktionen?" statt „Funktionen 1". Der Titel sagt, was die Folie
beantwortet.

## 5. Fachbegriffe beim ersten Auftreten erklären

Ein neuer Begriff bekommt direkt eine kurze Erklärung in Alltagssprache.
Danach darf er unerklärt verwendet werden.

## 6. Regeln zuerst in Alltagssprache, dann als Code

Vor einem Code-Beispiel steht, was die Regel inhaltlich besagt – erst danach
die Umsetzung.

## 7. Ein roter Faden pro Foliensatz

Alle Beispiele eines Foliensatzes nutzen denselben kleinen Datensatz. In
Block A ist das der Aare-Messwert (Ort, Temperatur, Zeitpunkt). Pro Schritt
ändert sich die Technik, nicht das Thema.

Der Code auf den Folien ist derselbe wie in den Code-Alongs – gleiche
Variablennamen, gleiche Schreibweise.

## 8. Bewusste Begrenzungen benennen

Was absichtlich weggelassen wird, wird gesagt und ins Cheatsheet verwiesen
(„`array_map` und `array_filter` stehen im Cheatsheet"). Sonst wirkt es wie
eine Lücke.

## 9. Sprechernotizen für alles, was nicht auf die Folie gehört

Fragen an die Klasse, Zeitangaben, didaktische Hinweise und Grenzwerte zum
Durchtesten kommen in `<aside class="notes">`, nicht auf die Folie.

## 10. Sprache

- Deutsch, direkt, kurze Sätze.
- Schweizer Rechtschreibung: `ss` statt `ß`.
- Studierende werden mit „du" angesprochen, Gruppen mit „ihr".
- Englische Fachbegriffe bleiben englisch (`Array`, `String`, `return`).

## 11. Interaktive Folien

Soll eine Frage in die Klasse gehen, startet die Folie leer und die Antwort
wird schrittweise eingeblendet – siehe `.code-lines` in `README.md`. Der
Ablauf gehört in die Sprechernotizen.
