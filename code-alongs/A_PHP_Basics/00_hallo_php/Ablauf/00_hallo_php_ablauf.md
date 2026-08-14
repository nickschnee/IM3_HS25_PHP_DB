# Ablauf `00_hallo_php`

> **Ziel:** Der technische Weg vom Kursordner über den lokalen PHP-Server bis in
> den Browser funktioniert.

## Vorbereitung

- PHP ist installiert und `php -v` zeigt eine Versionsnummer
  (siehe [`theorie/00_lokaler_php_server`](../../../../theorie/00_lokaler_php_server/index.html)).

## Schritte

1. Den Ordner `00_hallo_php` im Editor öffnen.
2. Die Datei `index.php` so verändern, dass "Hallo PHP" ausgegeben wird.
3. Im Terminal in diesen Ordner wechseln und den Server starten:
   ```bash
   php -S localhost:8000
   ```
4. `http://localhost:8000` im Browser aufrufen.
5. Prüfen, ob `Hallo PHP` erscheint.
6. Falls nichts erscheint, gemeinsam Startordner, Dateiname und Adresse prüfen.
   Steht in der Adresszeile nicht `localhost`, läuft kein PHP.

## Abnahme

Jede Person zeigt `Hallo PHP` im Browser unter `localhost:8000`. Der PHP-Code
wird an diesem Tag nicht erklärt; er ist nur das Prüfwerkzeug.

Auf einen Webserver kommt das Projekt erst im Deployment-Teil am Ende des
Kurses. Bis dahin läuft alles auf dem eigenen Rechner.
