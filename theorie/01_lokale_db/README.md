# 01 Lokale Datenbank (optional)

> **Ziel:** Du kannst eine MySQL-Datenbank auf deinem eigenen Rechner betreiben
> und mit phpMyAdmin bedienen – ohne für jeden Versuch auf den Server zu laden.

Dieser Foliensatz gehört zum Zusatzmaterial. Der Kurs läuft auf dem Server:
Datenbank, phpMyAdmin und PHP sind dort eingerichtet, und dein Projekt muss am
Ende dort funktionieren. Lokal zu arbeiten ist schneller, aber freiwillig.

> **Wichtig:** Wenn dich das Einrichten länger als eine halbe Stunde aufhält,
> überspring es und arbeite auf dem Server weiter. Du verpasst nichts.

Passend dazu: [`00_lokaler_php_server`](../00_lokaler_php_server/) erklärt, wie
du PHP lokal startest. Beides zusammen ergibt die vollständige lokale Umgebung.

## Was am Ende stehen soll

- Auf deinem Rechner läuft eine MySQL-Datenbank.
- Du kannst phpMyAdmin im Browser öffnen.
- Du kennst Host, Port, Benutzername und Passwort.
- Deine `config.php` verbindet sich damit.

## Der schnelle Weg: den Agenten machen lassen

Wer mit einem Agenten arbeitet – Claude Code, Codex, Cursor, GitHub Copilot –,
gibt die Installation dorthin ab. Eine Installation ist Fleissarbeit ohne
fachliche Entscheidungen und damit ein guter Einsatz.

Auftrag zum Kopieren:

```text
Ich brauche auf diesem Rechner eine lokale MySQL-Datenbank
für ein PHP-Schulprojekt.

- Installiere MAMP und starte die Server.
- Sag mir danach Host, Port, Benutzername und Passwort.
- Sag mir die Adresse, unter der ich phpMyAdmin öffne.
- Erkläre mir jeden Schritt, bevor du ihn ausführst.

Mein Betriebssystem ist macOS.
```

Die dritte Zeile ist die wichtigste: Ohne sie bekommst du eine laufende
Installation, aber nicht die vier Werte, die du gleich brauchst.

Was du trotzdem selbst machst:

- phpMyAdmin wirklich im Browser öffnen und nicht nur der Zusage glauben.
- Die vier Werte notieren, statt sie später im Chatverlauf zu suchen.
- Jeden Befehl kurz ansehen, bevor du ihn bestätigst.
- Keine Zugangsdaten vom Kursserver in einen Chat geben.

## Der Weg von Hand

### 1. MAMP installieren

1. Auf [mamp.info](https://www.mamp.info/de/downloads/) die kostenlose Version
   herunterladen.
2. Die Datei öffnen und der Installation folgen.
3. Das Programm **MAMP** starten, nicht MAMP PRO. Der Installer legt beide an;
   PRO ist kostenpflichtig und hier nicht nötig.

MAMP bringt Apache, PHP und MySQL mit. Wir brauchen daraus nur die Datenbank.

### 2. Server starten und Port ablesen

In MAMP auf **Start** klicken. Die Anzeige für MySQL wird grün.

| Angabe | Üblicher Wert |
| --- | --- |
| Host | `127.0.0.1` |
| Port | `8889` |
| Benutzer | `root` |
| Passwort | `root` |

Auf Windows steht dort oft `3306` statt `8889`. Lies den Wert in MAMP unter
*Einstellungen → Ports* ab, statt ihn abzuschreiben. Ein falscher Port ist der
häufigste Fehler im ganzen lokalen Setup.

### 3. phpMyAdmin öffnen

In MAMP auf **WebStart** klicken, dann im Menü *Tools* auf *phpMyAdmin*. Oder
direkt im Browser:

```text
http://localhost:8888/phpMyAdmin/
```

Achtung: `8888` ist der Webserver von MAMP, `8889` die Datenbank. Zwei Ports,
zwei Zwecke.

### 4. Datenbank anlegen

1. In phpMyAdmin links auf **Neu** klicken.
2. Einen Namen eingeben, zum Beispiel `im3_hitzesommer`.
3. Als Kollation `utf8mb4_general_ci` wählen.
4. Auf **Anlegen** klicken.

Kollation heisst: nach welchen Regeln Texte verglichen und sortiert werden.
`utf8mb4` ist dieselbe Einstellung wie im DSN und sorgt dafür, dass Umlaute
heil ankommen.

### 5. `config.php` anpassen

Zwischen Server und lokal unterscheidet sich genau eine Zeile:

```php
// auf dem Server ($host = 'localhost')
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// lokal mit MAMP ($host = '127.0.0.1')
$dsn = "mysql:host=$host;port=8889;dbname=$dbname;charset=utf8mb4";
```

Benutzername und Passwort sind lokal beide `root`. Der übrige Code bleibt
unverändert. Auch die lokale `config.php` gehört nicht ins Repository.

**Lokal `127.0.0.1` und nicht `localhost`.** Bei `localhost` verbindet sich PHP
nicht über den Port, sondern über eine Socket-Datei, und sucht sie unter
`/tmp/mysql.sock` – dort legt MAMP keine an. Die Meldung lautet dann
`SQLSTATE[HY000] [2002] No such file or directory`, und `port=8889` im DSN wird
dabei ignoriert. Mit `127.0.0.1` läuft die Verbindung über den Port, und alles
stimmt.

### 6. PHP wie bisher starten

```bash
php -S localhost:8000
```

MAMP liefert die Datenbank, nicht den Webserver. Deine PHP-Dateien bleiben in
deinem Projektordner und werden über `localhost:8000` aufgerufen. So ändert
sich an deiner bisherigen Arbeitsweise nichts.

## Wenn es nicht läuft

| Meldung oder Symptom | Ursache |
| --- | --- |
| `No such file or directory` | Im DSN steht `localhost` statt `127.0.0.1` |
| `Connection refused` | MAMP läuft nicht oder der Port stimmt nicht |
| `Access denied` | Benutzer oder Passwort falsch, lokal beides `root` |
| `Unknown database` | Der Name in `config.php` passt nicht zur angelegten Datenbank |
| Seite lädt ewig | Der Webserver-Port 8888 steht im DSN statt 8889 |
| phpMyAdmin nicht erreichbar | In MAMP wurde nicht auf Start geklickt |

Vier von fünf Fällen sind Ports oder Namen. Leg deshalb zuerst die vier Werte
neben das, was in phpMyAdmin steht, bevor du im PHP-Code suchst.

## Merksatz

> Lokal ist schneller, der Server ist verbindlich. Dein Projekt muss am Ende
> auf dem Server laufen – lade deinen Stand deshalb regelmässig hoch.

---

## Der Foliensatz

`index.html` ist die Präsentation zu diesem Text – eine einzelne HTML-Datei
ohne Build-Schritt. Richtwert 15 Minuten.

```bash
open index.html
```

| Folien | Inhalt |
| --- | --- |
| 1–3 | Wofür das gut ist, was am Ende stehen soll |
| 4–8 | Der Weg über einen Agenten: Auftrag, Prüfliste, `config.php` |
| 9–15 | Der Weg von Hand: MAMP, Ports, phpMyAdmin, Datenbank, `config.php` |
| 16 | Typische Fehler |

Die Folie zur `config.php` steht bewusst zweimal im Satz – am Ende jedes der
beiden Wege. Wer den Agenten machen lässt, überspringt das Kapitel «Von Hand»
vollständig und braucht sie trotzdem.

Dieser Foliensatz trägt keinen ETL-Streifen auf den Kapiteltrennern: Er ist
Tooling und kein Schritt der Kette. Er braucht auch kein eigenes `styles.css`.

### Nach Änderungen prüfen

```bash
python3 theorie/_foliendesign/pruefe-folien.py theorie/01_lokale_db/index.html
node ~/.claude/skills/revealjs-1.0.0/scripts/check-overflow.js theorie/01_lokale_db/index.html
```

### Offene Punkte

- Die Angaben zu MAMP sind auf macOS geprüft. Für Windows ist der abweichende
  Port genannt, aber nicht am Gerät nachvollzogen.
- Screenshots der MAMP-Oberfläche und von phpMyAdmin würden die Folien 10 bis 12
  deutlich verständlicher machen.
