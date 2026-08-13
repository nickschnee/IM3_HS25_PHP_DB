# 01 – Eigene Transform-Regeln

**Lernziel:** Ihr entwickelt für eure eigene Datenfrage eine begründete
Transform-Spezifikation, lasst euch bei der Implementation von KI unterstützen
und prüft das Resultat mit Audit-Zahlen.

**Richtwert:** 60 Minuten

Diese Übung wird im Backend-Zweierteam bearbeitet. Das Frontend-Team prüft den
Datenvertrag und den Beispieldatensatz.

## 1. Plan ausfüllen (20')

Kopiert `transform-plan.md` als `TRANSFORM.md` in euer Projekt und füllt alle
Abschnitte aus. Verwendet echte Beispielwerte aus eurer Quelle.

## 2. KI-Auftrag vorbereiten (10')

Formuliert aus eurem Plan einen Auftrag. Er muss enthalten:

- Datenfrage und Untersuchungseinheit;
- relevante Rohfelder und 5–10 repräsentative Werte;
- explizite Filter-, Mapping- und Ableitungsregeln;
- Zielstruktur mit Datentypen;
- gewünschte Audit-Zahlen;
- Anweisung, bei unklaren Werten `null` zu verwenden und Annahmen aufzulisten.

Teilt keine Passwörter, Serverzugänge oder schützenswerte Personendaten.

## 3. Transform implementieren (20')

Lasst euch einen ersten PHP-Entwurf erstellen. Der Transform soll:

1. das PHP-Array aus eurem Extract übernehmen;
2. eure dokumentierten Regeln anwenden;
3. gleich aufgebaute Datensätze erzeugen;
4. ein PHP-Array zurückgeben;
5. die vereinbarten Audit-Zahlen berechnen.

Übernehmt keinen Code, den ihr nicht gemeinsam Zeile für Zeile geprüft habt.

## 4. Resultat abnehmen (10')

Backend und Frontend prüfen gemeinsam:

- Passt ein Ergebnisdatensatz exakt zum Datenvertrag?
- Sind die häufigsten unbekannten Rohwerte sichtbar?
- Stimmen Anzahl vorher, ausgeschlossen und nachher zusammen?
- Verändert eine Stichprobe von fünf Fällen sich wie geplant?
- Kann die Datenfrage mit dem Resultat tatsächlich beantwortet werden?

## Ergebnis

Zeigt bei der Tagesabnahme:

1. eure präzise Datenfrage;
2. drei begründete Transform-Regeln;
3. einen Beispieldatensatz nach Datenvertrag;
4. die wichtigsten Audit-Zahlen;
5. eine bekannte Grenze der Aussage.
