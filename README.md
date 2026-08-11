# IM3 – PHP, Datenbanken und Datenstory

In Interaktive Medien 3 entwickelt ihr in Vierergruppen ein kleines
datenjournalistisches Projekt. Zwei Personen bauen mit PHP, einer Datenbank
und ETL+U den Datenweg. Zwei Personen entwickeln Story, Oberfläche und
Visualisierung. Beide Zweierteams arbeiten gegen dieselbe vereinbarte
JSON-Schnittstelle.

```text
Datenquelle -> Extract -> Transform -> Load -> Datenbank
             -> Unload/JSON -> Chart.js -> Datenstory
```

> **Tagesablauf für Studierende:**
> [`ablauf_studierende.md`](ablauf_studierende.md) – was an jedem der zehn
> Kurstage passiert.

## Lernpfad

1. PHP-Skripte lesen, ändern und schreiben.
2. JSON einlesen, filtern und als eigenen Endpunkt ausgeben.
3. Daten mit PDO in einer Datenbank lesen und verändern.
4. Einen kleinen ETL+U-Prozess aufbauen.
5. Daten mit Chart.js sichtbar und als Story verständlich machen.

## Kursmaterial

| Bereich | Verwendung |
| --- | --- |
| [Theorie](theorie/) | Gemeinsame Inputs nach Themenblock |
| [Code-Alongs](code-alongs/) | Geführte Beispiele aus dem Unterricht |
| [Digitale Übungen](uebungen/) | Selbständige Aufgaben mit Lösungen |
| [Stift und Papier](stift-und-papier/) | Datenfluss und Code zuerst ohne Computer planen |
| [Cheatsheets](cheatsheets/) | Kurze Syntax- und Themenreferenzen |
| [ETL-Boilerplate](etl-boilerplate/) | Starterkit für das Gruppenprojekt |

Die vollständigen Projektunterlagen mit Rollen, Meilensteinen, Bewertung und
Abgabe werden im Ordner `projekt/` ergänzt.

## Aktueller Materialstand

Theorieblock A ist als erste unterrichtbare Fassung vorhanden:

- Tag 1: `Hallo PHP` und Setup;
- Tag 2: PHP-Basics von Variablen bis Schleifen (Code-Alongs 01–05);
- Tag 3: Brücke zu JSON (`json_encode`, `$_GET`-Filter).

Der Tagesablauf für Studierende steht in
[`ablauf_studierende.md`](ablauf_studierende.md), der interne Zehn-Tage-Plan
für Dozierende in [`dozierende/ABLAUF.md`](dozierende/ABLAUF.md).

## Arbeitsweise im Kurs

- Code-Alongs entstehen gemeinsam; Lösungen dienen danach zum Vergleichen.
- Selbständige Übungen beginnen immer mit dem Startcode im Übungsordner.
- Vor komplexeren Schritten wird der Datenfluss zuerst auf Papier geplant.
- Historische Datensätze sind willkommen. Eine Live-API ist kein Muss.
- Projekte mit externer API benötigen für den Marktstand einen stabilen
  gespeicherten Datenstand als Fallback.

## Technische Voraussetzung

PHP läuft auf dem Kursserver. Am ersten Kurstag wird nur geprüft, ob der
persönliche Serverordner und eine minimale `.php`-Datei im Browser erreichbar
sind. Die PHP-Grundlagen beginnen erst an Tag 2.
