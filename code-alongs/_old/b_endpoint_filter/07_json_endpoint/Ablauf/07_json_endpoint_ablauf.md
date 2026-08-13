# Ablauf `07_json_endpoint`

> **Ziel:** Aus den drei Rohdateien einen eigenen JSON-Endpunkt bauen. Statt
> 31'000 Tageswerte pro Stadt geben wir pro Jahr den Höchstwert aus und liefern
> das Ganze nach unserem Datenvertrag als `application/json`. Richtwert: 35 Min.

## Datenvertrag

Ein Eintrag sieht immer gleich aus:

```json
{ "stadt": "Bern", "jahr": 2022, "temperatur_max": 34.6 }
```

Der Endpunkt liefert eine Liste solcher Einträge für alle drei Städte
(≈ 87 Jahre × 3 = 261 Einträge).

## Schritte

1. Am Modell erinnern: `JSON rein → PHP-Array → auswählen → JSON raus`. CA 06
   war „rein", jetzt kommt „auswählen" und „raus".
2. Die Zuordnung `$staedte` (Stadtname → Dateiname) ansehen. So können wir mit
   einem `foreach` alle drei Dateien gleich behandeln.
3. Pro Stadt die Datei lesen und dekodieren (wie CA 06).
4. Die parallelen Listen `time` und `temperature_2m_max` holen.
5. **Kernstück:** mit einer `for`-Schleife pro Jahr den Höchstwert bilden.
   - Jahr aus dem Datum schneiden: `(int) substr($datum, 0, 4)`.
   - In `$maxProJahr[$jahr]` nur den grösseren Wert behalten.
   - Fehlende Tage (`null`) mit `continue` überspringen.
6. Aus `$maxProJahr` fertige Einträge nach Datenvertrag bauen und an
   `$messungen` anhängen.
7. Header `Content-Type: application/json` setzen und `json_encode($messungen)`
   ausgeben. Im Browser neu laden: eine saubere JSON-Liste erscheint.

## Gesprächspunkte

- **Auswählen statt alles ausgeben:** Rohdaten sind riesig. Ein guter Endpunkt
  liefert genau das, was die Story braucht - hier den Jahres-Höchstwert.
- **Eigene Struktur (Datenvertrag):** Open-Meteo nennt das Feld
  `temperature_2m_max` und liefert parallele Arrays. Wir formen daraus unsere
  eigenen, klaren Felder `stadt`, `jahr`, `temperatur_max`. Genau diese Struktur
  baut später das Frontend nach - deshalb ist der Datenvertrag so wichtig.
- **`Content-Type: application/json`:** sagt dem Browser (und später `fetch()`),
  dass es sich um Daten handelt, nicht um eine Webseite.
- **`JSON_PRETTY_PRINT`:** nur zur besseren Lesbarkeit im Unterricht.
  `JSON_UNESCAPED_UNICODE` sorgt dafür, dass „Zürich" korrekt erscheint.
- **Ausblick:** Dieser Endpunkt liefert noch immer alle Städte. Im nächsten
  Schritt filtern wir ihn mit `$_GET`.
