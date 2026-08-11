# Lösung – 01 Daten finden & herunterladen

## Aufgabe 1 – Die zwei APIs von Open-Meteo

| API              | Basis-URL                    | Zweck                            |
| ---------------- | ---------------------------- | -------------------------------- |
| **Forecast-API** | `api.open-meteo.com`         | aktuelle Temperatur + Vorhersage |
| **Archiv-API**   | `archive-api.open-meteo.com` | historische Daten seit 1940      |

Beide sind kostenlos und brauchen **keinen API-Key**.

## Koordinaten der drei Städte

| Stadt  | latitude | longitude |
| ------ | -------- | --------- |
| Bern   | `46.948` | `7.447`   |
| Zürich | `47.377` | `8.541`   |
| Chur   | `46.851` | `9.532`   |

## Aufgabe 2 – Aktuelle Temperatur (Live-API)

```text
https://api.open-meteo.com/v1/forecast?latitude=46.948&longitude=7.447&current=temperature_2m&timezone=Europe/Zurich
```

Antwort (gekürzt):

```json
{ "current": { "time": "2026-08-11T13:45", "temperature_2m": 30.5 } }
```

## Aufgabe 3 – Historik seit 1940 (Download-Datensatz)

Für jede Stadt die Archiv-URL öffnen und die Antwort als Datei in `data/`
speichern. Die drei fertigen Dateien liegen bereits in [`data/`](data/).
Die URL im Browser öffnen und speichern – oder den `curl`-Befehl aus dem Ordner
dieser Übung ausführen.

### Bern

```text
https://archive-api.open-meteo.com/v1/archive?latitude=46.948&longitude=7.447&start_date=1940-01-01&end_date=2026-08-01&daily=temperature_2m_max&timezone=Europe/Zurich
```

```bash
curl "https://archive-api.open-meteo.com/v1/archive?latitude=46.948&longitude=7.447&start_date=1940-01-01&end_date=2026-08-01&daily=temperature_2m_max&timezone=Europe/Zurich" -o data/bern.json
```

### Zürich

```text
https://archive-api.open-meteo.com/v1/archive?latitude=47.377&longitude=8.541&start_date=1940-01-01&end_date=2026-08-01&daily=temperature_2m_max&timezone=Europe/Zurich
```

```bash
curl "https://archive-api.open-meteo.com/v1/archive?latitude=47.377&longitude=8.541&start_date=1940-01-01&end_date=2026-08-01&daily=temperature_2m_max&timezone=Europe/Zurich" -o data/zuerich.json
```

### Chur

```text
https://archive-api.open-meteo.com/v1/archive?latitude=46.851&longitude=9.532&start_date=1940-01-01&end_date=2026-08-01&daily=temperature_2m_max&timezone=Europe/Zurich
```

```bash
curl "https://archive-api.open-meteo.com/v1/archive?latitude=46.851&longitude=9.532&start_date=1940-01-01&end_date=2026-08-01&daily=temperature_2m_max&timezone=Europe/Zurich" -o data/chur.json
```

Jede Datei ist rund 0,5 MB gross und enthält ca. 31'000 Tageswerte.

## Hinweise

- **`end_date`:** Die Archiv-API hinkt etwa 5 Tage hinterher. Setze das Enddatum
  auf vor ca. einer Woche, sonst kommen für die letzten Tage `null`-Werte.
- **Datenmodell:** Open-Meteo liefert `time` und `temperature_2m_max` als **zwei
  parallele Arrays** (nicht als Liste von Objekten). Diese Form formen wir in den
  nächsten Schritten von Block B in unsere eigene Struktur um.
- **Fallback:** Diese drei Dateien sind unser gespeicherter Datenstand für den
  Marktstand – unabhängig davon, ob die Live-API gerade erreichbar ist.
