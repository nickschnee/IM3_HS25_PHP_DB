# Ablauf `04_arrays`

> **Ziel:** Ein indexiertes und ein assoziatives Array erstellen, einzelne
> Werte gezielt auslesen und mehrere Orte mit ihren Temperaturen in einem
> assoziativen Array ablegen. Richtwert: 45 Minuten.

## Schritte

1. In `$temperatures` drei vorbereitete Kommazahlen speichern.
2. Den Wert am Index `1` ausgeben und die Indexierung ab `0` erklären.
3. Mit `$temperatures[] = 20.3` einen vierten Wert ergänzen.
4. In `$measurement` einen Datensatz mit den Schlüsseln `location`,
   `temperature_c` und `measured_at` anlegen.
5. Ort und Temperatur über ihre Schlüssel ausgeben.
6. In `$stations` mehrere Orte speichern: der Schlüssel ist der Ort, der Wert
   die Wassertemperatur (z. B. `'Bern' => 19.4`).
7. Einen einzelnen Ort gezielt über seinen Schlüssel ausgeben
   (z. B. `$stations['Thun']`).
8. Mit `$stations['Interlaken'] = 17.5` einen weiteren Ort ergänzen und den
   Unterschied zum indexierten `[]` aus Schritt 3 besprechen.
9. Mit einer Bedingung (`if`/`else`) prüfen, ob das Wasser in Bern
   `>= 18` °C ist, und eine passende Meldung ausgeben.
10. Das ganze assoziative Array mit `print_r` untersuchen.

## Bewusste Begrenzung

Array-Funktionen wie `map`, `filter`, `reduce` und `splice` sind kein Muss in
diesem Einstieg. Zuerst müssen Liste, Index, Schlüssel und Wert sicher sitzen.

Auch **Schleifen** setzen wir hier bewusst noch nicht ein: Jeder Ort wird über
seinen Schlüssel einzeln ausgegeben. Das automatische Durchlaufen aller
Einträge folgt im nächsten Code-Along `05_schleifen`. Die Bedingung aus
Schritt 9 knüpft an `03_bedingungen` an.

## Erwartetes Resultat

- Der zweite Temperaturwert erscheint.
- Ort und Temperatur des strukturierten Messwerts erscheinen.
- Ein einzelner Ort aus `$stations` erscheint über seinen Schlüssel.
- Die Bedingung gibt für Bern eine passende Meldung aus.
- `print_r` zeigt alle Orte inklusive des ergänzten Eintrags.
