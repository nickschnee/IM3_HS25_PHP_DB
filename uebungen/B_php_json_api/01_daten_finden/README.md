# 01 – Daten finden & herunterladen

**Lernziel:** Du kannst eine offene Datenquelle im Netz finden, verstehst den
Unterschied zwischen einer **Live-API** und einem **Download-Datensatz** und
speicherst echte Daten als JSON-Datei auf deinem Rechner.

**Richtwert:** 45 Minuten

> Diese Übung enthält ausnahmsweise **keinen PHP-Code**. Es geht ums Finden,
> Verstehen und Herunterladen von Daten – die Grundlage für den ganzen Rest von
> Block B.

## Kontext: Hitzesommer

Unsere Datenstory dreht sich um den **Hitzesommer**. Wir wollen zeigen, wie
sich die Temperatur über die Jahrzehnte verändert hat – und zwar in drei
Schweizer Städten: **Chur, Bern und Zürich**.

Dafür brauchen wir zwei Dinge:

1. die **aktuelle Temperatur** (kommt später live über eine API in unser PHP);
2. die **Höchsttemperaturen der Vergangenheit** als Datei, die wir jederzeit
   lesen können (auch wenn das Internet am Marktstand streikt).

## Aufgabe 1 – Datenquelle finden

Suche im Netz nach einer **kostenlosen Wetter-API ohne Anmeldung / ohne
API-Key**. Ein sehr gutes Angebot ist **Open-Meteo** (`open-meteo.com`).

Öffne die Seite und finde heraus:

- Open-Meteo bietet **zwei verschiedene APIs** an. Wie heissen sie ungefähr und
  worin unterscheiden sie sich?
- Welche liefert die **aktuelle / kommende** Temperatur, welche die
  **historischen** Daten aus der Vergangenheit?

## Aufgabe 2 – Aktuelle Temperatur abrufen

Baue dir für **eine** der drei Städte den Link zur aktuellen Temperatur
zusammen und öffne ihn im Browser.

- Du brauchst die **Koordinaten** der Stadt (Breitengrad / `latitude` und
  Längengrad / `longitude`).
- In der Open-Meteo-Doku findest du, mit welchem Parameter man die aktuelle
  Temperatur bekommt.

Wenn es klappt, zeigt der Browser eine kleine JSON-Antwort mit einem Feld wie
`temperature_2m` und der aktuellen Uhrzeit.

## Aufgabe 3 – Historik herunterladen

Jetzt das Wichtigste: Lade für **deine Stadt** die **tägliche
Höchsttemperatur seit Messbeginn (1940)** herunter.

1. Wechsle in der Doku zur **Archiv-API** (historische Daten).
2. Wähle als Zeitraum **`1940-01-01`** bis heute (ein paar Tage Rückstand sind
   normal) und als Tageswert die **Höchsttemperatur** (`temperature_2m_max`).
3. Öffne die fertige URL im Browser und **speichere die Antwort als Datei** im
   Ordner `data/` dieser Übung (er liegt schon leer bereit, neben dieser
   Anleitung):
   - `data/bern.json`
   - `data/zuerich.json`
   - `data/chur.json`

> **Speichern im Browser:** Rechtsklick → „Seite speichern unter …" bzw.
> `Cmd`/`Ctrl` + `S`, dann als `.json` benennen. Alternativ mit dem Terminal
> und `curl` (siehe Lösung).

## Erwartetes Resultat

Im `data/`-Ordner der Übung liegen drei JSON-Dateien. Jede enthält zwei lange Listen: ein
Feld `time` mit den Datumsangaben und ein Feld `temperature_2m_max` mit den
Höchsttemperaturen. Beim Öffnen siehst du am Anfang etwa:

```json
{ "daily": { "time": ["1940-01-01", ...], "temperature_2m_max": [-0.7, ...] } }
```
