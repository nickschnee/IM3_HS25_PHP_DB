# Ablauf `07_live_lesen`

> **Ziel:** Daten nicht aus einer Datei, sondern **live aus dem Internet**
> holen. Mit dem vorbereiteten Helfer `fetchJson($url)` rufen wir die
> Open-Meteo-API ab und lesen die stündlichen Temperaturen für heute.
> Richtwert: 30 Minuten.

## Der Unterschied zu CA 06

```text
CA 06:  Datei          ->  file_get_contents  ->  PHP-Array
CA 07:  externe API    ->  fetchJson (cURL)   ->  PHP-Array
```

Das Ergebnis ist beide Male dasselbe: ein PHP-Array. Nur die **Quelle** und die
**Extract-Technik** sind neu.

## Schritte

1. Den vorbereiteten Helfer `fetchJson($url)` ansehen. Er nutzt cURL, um eine
   URL abzurufen, und gibt die JSON-Antwort schon als PHP-Array zurück. Den
   cURL-Code muss niemand auswendig können.
2. Die API-URL für Bern zusammenbauen: `hourly=temperature_2m`,
   `forecast_days=1`, `timezone=Europe/Zurich`.
3. Mit `fetchJson($url)` die Daten holen.
4. Mit `array_keys($data['hourly'])` die Struktur ansehen: wieder **zwei
   parallele Listen** `time` und `temperature_2m`.
5. Die beiden Listen holen und mit einer `for`-Schleife alle 24 Stunden
   ausgeben.

## Gesprächspunkte

- **`$_GET` vs. cURL:** `$_GET` sind Parameter, die _unser_ Skript bekommt.
  cURL/`fetchJson` ist ein _ausgehender_ Request an eine _fremde_ API. Das wird
  oft verwechselt.
- **Gleiche Struktur wie die Datei:** Open-Meteo liefert live dasselbe Muster
  (parallele Arrays) wie die heruntergeladene Datei. Deshalb funktioniert der
  Rest (Endpunkt, Filter) gleich.
- **Live heisst abhängig:** Ohne Internet keine Daten.
- **`forecast_days=1`:** liefert genau den heutigen Tag. Morgen zeigt derselbe
  Code andere Zahlen - das ist der Sinn von „live".
