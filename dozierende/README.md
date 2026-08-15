# Hinweise für Dozierende

Dieses Repository enthält alle Unterlagen für den Kurs IM3.

## Das Repository

- `README.md` ist der Einstieg für die Studierenden.
- `ablauf.md` zeigt den Kursablauf.
- `theorie/` enthält die Folien.
- `code-alongs/` enthält geführte Beispiele.
- `uebungen/` enthält Aufgaben und Lösungen.
- `stift-und-papier/` enthält Übungen ohne Computer.
- `cheatsheets/` enthält kurze Nachschlagewerke.
- `dozierende/` enthält interne Unterlagen.

## Folien mit AI bearbeiten

Die Folien sind mit reveal.js gebaut.

Installiere zuerst den AI-Skill `Reveal.js` in deinem AI-Tool.

Das Paket liegt hier:
`dozierende/AI_skill_revealjs/mcpmarket-plugin-me-claude.zip`

Für Codex gehst du so vor:

1. Entpacke die ZIP-Datei.
2. Kopiere den Ordner `mcpmarket-me/skills/revealjs` nach
   `.agents/skills/revealjs` in diesem Repository.
3. Starte Codex neu, falls der Skill nicht sofort erscheint.
4. Nenne den Skill im Auftrag mit `$revealjs`.

Bei einem anderen AI-Tool kann die Installation anders sein.

Installiere dort ebenfalls den Ordner `mcpmarket-me/skills/revealjs` als
lokalen Skill.

Bitte die AI vor jeder Änderung, diese Dateien zu lesen:

- `AGENTS.md`
- `theorie/_foliendesign/README.md`
- `theorie/_foliendesign/GESTALTUNGSREGELN.md`
- `theorie/A_PHP_Basics/index.html`

Ein einfacher Auftrag an die AI kann so aussehen:

> Bearbeite die Folien in `theorie/B_extract/index.html`.
> Nutze den Skill `$revealjs`.
> Lies zuerst die Regeln für das Foliendesign.
> Prüfe danach die Folien und kontrolliere sie als Screenshots.

## Unterricht mit AI planen

Im Ordner `dozierende/unterrichtsplanung/` stehen Hinweise zur Didaktik.

Die Datei ist vor allem als Wissen für eine AI gedacht.

Bitte die AI, diese Datei vor der Planung zu lesen:

`dozierende/unterrichtsplanung/README.md`

Ein einfacher Auftrag kann so aussehen:

> Erstelle einen Ablaufplan für eine Unterrichtseinheit.
> Lies zuerst `AGENTS.md` und
> `dozierende/unterrichtsplanung/README.md`.
> Formuliere klare Lernziele.
> Plane kurze Inputs und einfache Übungen.

Prüfe den Vorschlag danach selbst.

Die AI unterstützt die Planung.

Die Verantwortung bleibt bei den Dozierenden.
