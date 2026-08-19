# Posten 3 – My Social Year 2024

**Story:** eigenes Projekt, dazu ein
[verwandter Post auf r/dataisbeautiful](https://www.reddit.com/r/dataisbeautiful/comments/1ib3r2m)
· **Medium:** gedruckte Neujahrskarten zum Anfassen

Ein Jahr lang festgehalten, wen ich wann treffe. Daraus sind Neujahrskarten
entstanden: pro Person eine Karte mit den gemeinsamen Tagen im Jahr.

## Aufbau

- `posten.html` ausgedruckt an die Wand.
- Die Neujahrskarten liegen offen auf der Ablage, die Studierenden dürfen sie
  in die Hand nehmen. Das ist der einzige analoge Posten – das darf man sehen.
- Kein Laptop nötig, der QR-Code führt auf den Reddit-Post.

## Antworten für die Auswertung

| Frage | Antwort |
| ----- | ------- |
| Daten | Datum, Person, Anlass |
| Quelle | selbst geführt, das ganze Jahr über nachgetragen |
| Zeitraum | ein Kalenderjahr, 2024 |

Der Posten zeigt, dass eine Data-Story weder eine API noch eine Website
braucht. Eine Tabelle mit drei Spalten und ein guter Anlass reichen.

## Material

- `qr.svg` – QR-Code auf den Reddit-Post
  `https://www.reddit.com/r/dataisbeautiful/comments/1ib3r2m`.
- `bild_reddit.png` – Screenshot dieses Posts, als Notlösung falls die eigenen
  Karten am Kurstag nicht dabei sind.

## Noch zu tun

- [ ] Foto oder Scan einer eigenen Karte als `bild.png` in diesen Ordner legen.
- [ ] In `posten.html` den Block `<div class="platzhalter">` ersetzen durch:
      `<div class="bild"><img src="bild.png" alt="…"></div>`.
- [ ] Antworten oben prüfen, sobald das Material vorliegt.
