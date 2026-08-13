# TRANSFORM – Beispiel Hitzesommer

## 1. Datenfrage

Wie hat sich die Anzahl Hitzetage pro meteorologischem Sommer in Bern, Chur und
Zürich von 1940 bis zum letzten vollständigen Sommer verändert?

## 2. Was die Daten nicht beantworten

Die Tageshöchsttemperatur zeigt nicht, wie stark Menschen Hitze tatsächlich
erleben. Luftfeuchtigkeit, Nachttemperaturen, Stadtklima und Bevölkerung fehlen.

## 3. Untersuchungseinheit

Eine Zeile nach dem Transform beschreibt eine Stadt in einem vollständigen
meteorologischen Sommer.

## 4. Relevante Rohfelder

| Rohfeld | Beispielwerte | Problem oder Besonderheit |
| --- | --- | --- |
| Dateiname / Ort | `bern.json` | Ort steht nicht als klarer Name in `daily` |
| `daily.time` | `2023-07-11` | parallele Liste zur Temperatur |
| `daily.temperature_2m_max` | `31.4` | kann fehlen; Einheit laut Metadaten °C |

## 5. Transform-Regeln

| Nr. | Regel | Begründung | Möglicher Datenverlust |
| ---: | --- | --- | --- |
| 1 | Nur Monate 6, 7 und 8 behalten | Definition meteorologischer Sommer | Hitzetage ausserhalb des Sommers |
| 2 | Temperatur >= 30 °C als Hitzetag zählen | im Projekt festgelegte Definition | knapp tiefere Werte zählen nicht |
| 3 | Pro Stadt und Jahr aggregieren | Vergleichseinheit ist ein Sommer | einzelne Tagesverläufe |
| 4 | Nur Sommer mit 92 Messwerten behalten | keine Teiljahre vergleichen | Jahre mit Datenlücken |
| 5 | Maximum auf eine Dezimalstelle runden | Genauigkeit der Quelle | zusätzliche Nachkommastellen |

## 6. Datenvertrag

| Zielfeld | Typ | Beispiel | Darf `null` sein? |
| --- | --- | --- | --- |
| `city` | string | `Bern` | nein |
| `year` | int | `2023` | nein |
| `measurement_days` | int | `92` | nein |
| `hot_days` | int | `12` | nein |
| `max_temperature_c` | float | `36.3` | nein |

```json
{
  "city": "Bern",
  "year": 2023,
  "measurement_days": 92,
  "hot_days": 12,
  "max_temperature_c": 36.3
}
```

## 7. Audit

- Anzahl Tage in allen Rohdateien;
- Anzahl Tage ausserhalb Juni–August;
- Anzahl fehlende oder ungültige Temperaturen;
- ausgeschlossene unvollständige Sommer;
- Anzahl Stadt-Jahr-Zeilen im Resultat.

## 8. KI-Einsatz und Prüfung

Die KI durfte Schleife, Gruppierung und Audit implementieren. Die Definitionen
für Sommer, Hitzetag und Vollständigkeit wurden vorher vom Team festgelegt. Das
Team prüfte je einen Sommer pro Stadt von Hand und verglich die Summen.

## 9. Grenzen

Die historische Vergleichbarkeit hängt von der verwendeten Open-Meteo-Reanalyse
ab. Ein Hitzetag ausserhalb Juni–August wird wegen unserer Frage nicht gezählt.
