# Ablauf `09_hitzesommer_transformieren`

> **Ziel:** Aus täglichen Rohdaten entsteht eine begründete Vergleichseinheit:
> eine Stadt pro vollständigem Sommer. Die Klasse formuliert zuerst die Regeln
> und implementiert sie danach – bei Bedarf mit KI. Richtwert: 45 Minuten.

## Datenfrage

> Wie hat sich die Anzahl Hitzetage pro meteorologischem Sommer in Bern, Chur
> und Zürich seit 1940 verändert?

## Vor dem Code (10')

Die Frage gemeinsam in Regeln übersetzen:

- meteorologischer Sommer = Juni, Juli, August;
- Hitzetag = Tagesmaximum mindestens 30 °C;
- Vergleichseinheit = Stadt und Jahr;
- nur vollständige Sommer mit 92 Messwerten;
- Zielstruktur an die Tafel schreiben.

Fragen: Was würde sich bei «heissester Tag des Jahres» ändern? Was geht durch
die Aggregation verloren?

## Schritte im Code (25')

1. Den vorbereiteten `extract.php` ansehen: Er liefert die drei rohen
   Open-Meteo-Arrays aus Block B.
2. `time` und `temperature_2m_max` holen und prüfen, ob die parallelen Listen
   gleich lang sind.
3. Monat und Jahr aus `YYYY-MM-DD` lesen.
4. Tage ausserhalb Juni–August überspringen und im Audit zählen.
5. Pro Stadt/Jahr Messwerte und Hitzetage zählen sowie das Maximum merken.
6. Sommer mit weniger als 92 Messwerten entfernen. Dadurch wird der im Datensatz
   nur teilweise vorhandene Sommer 2026 nicht unfair verglichen.
7. Ergebnis nach Jahr und Stadt sortieren.

## Kontrolle (10')

`index.php` im Browser öffnen und nicht nur `data`, sondern auch `audit` prüfen:

- Wie viele Roh-Tage gab es?
- Wie viele lagen ausserhalb des Sommers?
- Wie viele unvollständige Sommer wurden entfernt?
- Hat jede Ergebniszeile exakt die vereinbarten Felder und Typen?

## Gesprächspunkte

- **Filtern folgt der Frage:** Sommermonate sind keine allgemeine
  Datenbereinigung.
- **Aggregation verändert die Daten:** Tageswerte werden zu Stadt-Jahr-Zeilen.
- **Teiljahre:** Der letzte Rohdatensatz endet während eines Sommers. Ohne Audit
  wäre ein auffällig tiefer Wert nur ein Datenfehler in Verkleidung.
- **Transform bleibt PHP:** `transform.php` gibt ein Array zurück. Die
  JSON-Ausgabe in `index.php` ist nur eine Kontrollansicht.
