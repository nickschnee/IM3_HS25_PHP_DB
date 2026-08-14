# Ablauf `11_datenbank_testen`

> **Ziel:** Jede Person hat eine funktionierende Datenbankverbindung und hat
> einmal selbst Zeilen geschrieben und wieder gelesen.
>
> Der Code selbst dauert rund 30 Minuten. Im Ablauf steht eine Stunde, weil
> erfahrungsgemäss die halbe Zeit in Zugängen, Ports und Tippfehlern steckt.

## Warum dieser Schritt zuerst

Beim Laden der Hitzesommer-Daten gehen erfahrungsgemäss zwei Dinge gleichzeitig
schief: die Verbindung und die Logik. Hier wird nur die Verbindung geprüft.
Wenn diese Seite Zeilen ausgibt, ist alles Nachfolgende reine Programmierung.

## Vorbereitung (10')

Wir arbeiten auf dem Server. Datenbank und Benutzer stehen aus dem
Tooling-Block davor bereits – hier geht es nur noch um diesen Ordner.
Gemeinsam durchgehen, jede Person auf dem eigenen Zugang:

1. Zugangsdaten aus dem Hostpoint-Panel bereitlegen: Datenbankname, Benutzer,
   Passwort.
2. `config.template.php` zu `config.php` kopieren:
   ```bash
   cp config.template.php config.php
   ```
3. Die drei Werte eintragen. `$host` bleibt `localhost`: Die Datenbank läuft auf
   demselben Server wie die PHP-Dateien, «localhost» meint also den Server und
   nicht den eigenen Laptop.
4. Prüfen, dass `config.php` nicht im Git landet:
   ```bash
   git status
   ```
   Die Datei darf dort **nicht** auftauchen.
5. Tabelle anlegen: phpMyAdmin aus dem Hostpoint-Panel öffnen und `schema.sql`
   im Reiter «SQL» ausführen – oder dieselben Spalten im Reiter «Struktur»
   zusammenklicken.
6. Den Ordner auf den Server laden, in den eigenen Projektordner.

> **Für Schnelle:** Wer zusätzlich lokal arbeiten will, startet MAMP und nutzt
> daraus nur MySQL. Benutzer und Passwort sind dort beide `root`, und im DSN
> muss `port=8889` stehen (die auskommentierte Zeile unten in
> `config.template.php`). PHP läuft weiterhin über `php -S localhost:8000`.
> Für den Kurs ist das nicht nötig – der Server ist der Standardweg.

## Schritte im Code (15')

`index.php` enthält sechs TODO-Marken. Der Reihe nach:

1. `header('Content-Type: text/plain; charset=utf-8')` – die Ausgabe ist eine
   Kontrollansicht, keine Webseite.
2. `require __DIR__ . '/config.php';`
3. Verbindung im `try`-Block aufbauen und `Verbindung steht.` ausgeben. Den
   `catch`-Block bewusst gemeinsam schreiben und einmal absichtlich ein falsches
   Passwort eintragen, um die Meldung zu sehen.
4. Einen Messwert mit `prepare()` und `execute()` schreiben. Der Zeitpunkt kommt
   aus `date('Y-m-d H:i:s')`.
5. Drei weitere Werte in einer `foreach`-Schleife schreiben – `prepare()` steht
   vor der Schleife, `execute()` darin.
6. Mit `query()` und `fetchAll()` alles wieder auslesen und Zeile für Zeile
   ausgeben.

## Kontrolle (5')

- Die eigene Server-URL im Browser öffnen: Es erscheinen vier Zeilen mit Ort,
  Temperatur und Zeitpunkt.
- Dieselbe Tabelle in phpMyAdmin öffnen: dort stehen dieselben vier Zeilen.
  Dieser Doppelblick ist der eigentliche Test – die Daten sind wirklich in der
  Datenbank und nicht nur in der Ausgabe.
- **Die Seite ein zweites Mal aufrufen.** Jetzt sind es acht Zeilen. Diese
  Beobachtung stehen lassen und nicht sofort lösen – sie ist der Aufhänger für
  das Thema «zweimal laden» im nächsten Code-Along.
- Aufräumen, wer will: `DELETE FROM measurements;` in phpMyAdmin.

## Gesprächspunkte

- **Zwei Fehlerquellen trennen:** Erst die Verbindung, dann die Logik. Wer diese
  Reihenfolge einhält, spart sich im Projekt viel Sucherei.
- **`config.php` gehört niemandem sonst:** Die Datei steht in `.gitignore`, im
  Repository liegt nur die Vorlage.
- **Fehlermeldungen lesen:** `Access denied` heisst Zugangsdaten,
  `Unknown database` heisst Datenbankname, `Unknown column` heisst Tippfehler in
  der Tabelle. Alle drei einmal absichtlich provozieren.
- **Das Muster bleibt:** `prepare()` einmal, `execute()` oft – im nächsten
  Schritt mit 258 statt vier Zeilen.
- **`measurements` ist eine Wegwerf-Tabelle:** Das richtige Datenmodell kommt
  im nächsten Code-Along.
