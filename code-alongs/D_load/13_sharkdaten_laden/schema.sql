-- Das Datenmodell für die Shark-Ranglisten.
--
-- Anlegen in phpMyAdmin: diesen Text in den Reiter «SQL» einfügen und
-- ausführen. Wie beim Hitzesommer-Beispiel wird die Struktur einmal von Hand
-- angelegt und danach nur noch von load.php gefüllt.

-- Zwei Tabellen – aber aus einem anderen Grund als beim Hitzesommer.
--
-- Beim Hitzesommer haben wir die Städte ausgelagert, weil sich ein Wert
-- WIEDERHOLT hätte: «Bern» wäre 86-mal dagestanden.
--
-- Dieser Grund gilt hier nicht. Die Ranglisten haben 17 Zeilen und genau zwei
-- verschiedene dimension-Werte; eine dritte Tabelle dafür würde mehr kosten,
-- als sie einbringt.
--
-- Der Grund hier ist die FORM. Eine Rangliste hat einen Platz, ein Land hat
-- einen Ländercode. Beides in eine Tabelle zu zwingen hiesse, in jeder Zeile
-- die Hälfte der Spalten leer zu lassen. Verschiedene Formen bekommen
-- verschiedene Tabellen.
--
-- Merksatz für eure Projekte: «Eine oder zwei Tabellen» beantwortet man
-- zweimal – einmal gegen Wiederholung, einmal gegen leere Spalten. Keine der
-- beiden Antworten ist eine Regel, beide folgen aus den Daten.

-- Eine Zeile = ein Rang in einer Rangliste.

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

-- Eine Zeile = ein Land.
--
-- Diese Tabelle füttert später die Karte. Drei ihrer Spalten dürfen NULL sein,
-- und jedes NULL bedeutet etwas anderes:
--
--   iso3 IS NULL          Der Ländername steht nicht in unserer
--                         Nachschlagetabelle. Das Land wird gezählt, aber
--                         nicht eingefärbt.
--   top_species IS NULL   In diesem Land konnte keine einzige Art bestimmt
--                         werden.
--   top_activity IS NULL  Dasselbe für die Tätigkeit.
--
-- NULL heisst hier also nie «null Vorfälle». Es heisst «wir wissen es nicht» –
-- und genau deshalb steht dort NULL und nicht 0 oder ein leerer Text. Eine 0
-- wäre eine Behauptung, NULL ist eine Auskunft.

CREATE TABLE shark_countries (
  id           INT AUTO_INCREMENT PRIMARY KEY,

  -- Die Schreibweise aus dem Datensatz, gross geschrieben: 'USA', 'BAHAMAS'.
  country      VARCHAR(60) NOT NULL,

  -- Der ISO-3166-Code, immer genau drei Zeichen. CHAR statt VARCHAR, weil die
  -- Länge feststeht – das ist der Regelfall für Codes.
  iso3         CHAR(3) NULL,

  incidents    SMALLINT NOT NULL,

  -- Dieselbe Länge wie category oben, denn hier stehen dieselben Werte drin.
  top_species  VARCHAR(80) NULL,
  top_activity VARCHAR(80) NULL,

  -- Ein Land darf es nur einmal geben. Diese Regel ist der Grund, warum ein
  -- vergessenes strtoupper() im Transform hier laut auffällt: 'FIJI' und
  -- 'Fiji' kämen als zwei Zeilen an, und die zweite würde abgewiesen.
  UNIQUE (country)
);
