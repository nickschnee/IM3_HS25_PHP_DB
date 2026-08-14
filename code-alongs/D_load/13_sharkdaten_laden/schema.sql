-- Das Datenmodell für die Shark-Ranglisten.
--
-- Anlegen in phpMyAdmin: diesen Text in den Reiter «SQL» einfügen und
-- ausführen. Wie beim Hitzesommer-Beispiel wird die Struktur einmal von Hand
-- angelegt und danach nur noch von load.php gefüllt.

-- Eine Zeile = ein Rang in einer Rangliste.
--
-- Hier genügt EINE Tabelle. Beim Hitzesommer haben wir die Städte ausgelagert,
-- weil «Bern» 86-mal dagestanden hätte. Hier gibt es 17 Zeilen und genau zwei
-- verschiedene dimension-Werte. Eine zweite Tabelle würde mehr kosten, als sie
-- einbringt – die Antwort auf die Frage «eine oder zwei Tabellen» hängt an den
-- Daten und nicht an einer Regel.

CREATE TABLE shark_rankings (
  id            INT AUTO_INCREMENT PRIMARY KEY,

  -- Welche der beiden Ranglisten: 'shark_category' oder 'activity_group'.
  dimension     VARCHAR(40) NOT NULL,

  -- Achtung: Die Spalte heisst NICHT rank.
  --
  -- `rank` ist in MySQL ein reserviertes Wort (es gibt eine Funktion RANK()).
  -- CREATE TABLE bricht sonst mit «You have an error in your SQL syntax» ab.
  -- Die Meldung sagt «Syntaxfehler» und nicht «reserviertes Wort» – deshalb
  -- sucht man erfahrungsgemäss lange am falschen Ort. Andere Wörter mit
  -- demselben Problem: order, group, key, condition, interval.
  --
  -- Im Datenvertrag heisst das Feld weiterhin rank. Übersetzt wird an genau
  -- einer Stelle, im execute()-Array in load.php.
  rank_position SMALLINT NOT NULL,

  -- Die längste Kategorie im Beispiel hat 43 Zeichen.
  category      VARCHAR(80) NOT NULL,
  incidents     SMALLINT NOT NULL,

  -- Ein Paar aus Rangliste und Kategorie darf es nur einmal geben. Damit ist
  -- ein doppelter Eintrag nicht mehr bloss unerwünscht, sondern unmöglich:
  -- Die Datenbank weist ihn ab.
  UNIQUE (dimension, category)
);
