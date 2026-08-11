# 00 Lokaler PHP-Server (optional)

> **Ziel:** Du kannst PHP-Dateien direkt auf deinem eigenen Rechner testen,
> ohne sie jedes Mal auf den Kursserver hochzuladen.

## Warum das nützlich ist

Im Kurs lädst du deine Dateien auf einen Server hoch und rufst sie im Browser
auf. Das funktioniert gut, ist aber langsam, wenn du viel ausprobierst.

Mit einem **lokalen Server** läuft PHP direkt auf deinem Laptop. Du speicherst
eine Datei, drückst im Browser auf "Neu laden" und siehst sofort das Ergebnis.
Kein Hochladen nötig.

> **Wichtig:** Das ist ein Zusatz für schnelleres Arbeiten. Alles im Kurs
> funktioniert auch ohne. Wenn dich das Einrichten aufhält, überspring es und
> arbeite mit dem Kursserver weiter.

## Was du brauchst

Ein Programm namens **PHP** auf deinem Rechner. Prüfe zuerst, ob es schon da
ist. Öffne dein Terminal (macOS) bzw. die Eingabeaufforderung / PowerShell
(Windows) und tippe:

```bash
php -v
```

- Erscheint eine Versionsnummer wie `PHP 8.x.x` → PHP ist installiert, spring
  zu **Server starten**.
- Erscheint eine Fehlermeldung wie "command not found" / "not recognized" → du
  musst PHP zuerst installieren (siehe unten).

Wir empfehlen **PHP 8.1 oder neuer**.

---

## PHP installieren – macOS

Neuere macOS-Versionen liefern kein PHP mehr mit. Am einfachsten geht die
Installation über **Homebrew**, einen Paketmanager für den Mac.

1. Prüfe, ob Homebrew schon da ist:

   ```bash
   brew -v
   ```

   Erscheint eine Versionsnummer, spring zu Schritt 3.

2. Homebrew installieren (eine Zeile, dann den Anweisungen im Terminal folgen):

   ```bash
   /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
   ```

3. PHP installieren:

   ```bash
   brew install php
   ```

4. Prüfen:

   ```bash
   php -v
   ```

---

## PHP installieren – Windows

1. Öffne <https://windows.php.net/download/> und lade die neueste Version
   **"Zip"** unter *"VS16/VS17 x64 Thread Safe"* herunter.
2. Entpacke das Zip in einen einfachen Ordner, z. B. `C:\php`.
3. Füge diesen Ordner zum **PATH** hinzu, damit `php` überall funktioniert:
   - Windows-Suche → "Umgebungsvariablen bearbeiten" öffnen.
   - Bei *"Path"* → *Bearbeiten* → *Neu* → `C:\php` eintragen → mit *OK*
     bestätigen.
4. **Neues** Terminalfenster (PowerShell) öffnen und prüfen:

   ```powershell
   php -v
   ```

> **Alternative:** Wenn dir das zu fummelig ist, installiere **XAMPP**
> (<https://www.apachefriends.org/>). Das bringt PHP komplett mit. Du kannst
> danach trotzdem den eingebauten Server (unten) nutzen.

---

## Server starten

1. Öffne im Terminal den Ordner, in dem deine PHP-Dateien liegen. Beispiel:

   ```bash
   cd Pfad/zu/meinem/kursordner
   ```

   Tipp: Tippe `cd ` (mit Leerzeichen) und zieh den Ordner aus dem Finder /
   Explorer ins Terminal – der Pfad wird automatisch eingefügt.

2. Server starten:

   ```bash
   php -S localhost:8000
   ```

3. Browser öffnen und aufrufen:

   ```
   http://localhost:8000
   ```

Liegt deine Datei in einem Unterordner, hängst du den Pfad an, z. B.
`http://localhost:8000/00_hallo_php/index.php`.

Der Server läuft, solange das Terminalfenster offen ist. **Stoppen** mit
`Ctrl` + `C`. Änderst du eine Datei, reicht im Browser ein "Neu laden" – du
musst den Server nicht neu starten.

## Was bedeutet `php -S localhost:8000`?

- `php` → das PHP-Programm.
- `-S` → starte den eingebauten Testserver (das grosse **S**).
- `localhost` → dein eigener Rechner.
- `8000` → die Portnummer, quasi die "Tür". Ist `8000` belegt, nimm eine
  andere, z. B. `php -S localhost:8080`.

## Häufige Probleme

- **"command not found" / "not recognized":** PHP ist nicht installiert oder
  nicht im PATH. Terminal neu öffnen, sonst Installation oben prüfen.
- **"Failed to listen on localhost:8000":** Der Port ist belegt (Server läuft
  vielleicht schon in einem anderen Fenster). Andere Portnummer nehmen.
- **Browser zeigt PHP-Code als Text statt Ergebnis:** Du hast die Datei per
  Doppelklick geöffnet (`file://...`) statt über `http://localhost:8000`.
  Immer über die `localhost`-Adresse aufrufen.
- **"Not Found":** Der Dateiname oder Pfad stimmt nicht. Gross-/Kleinschreibung
  und den Ordner prüfen, in dem du den Server gestartet hast.
