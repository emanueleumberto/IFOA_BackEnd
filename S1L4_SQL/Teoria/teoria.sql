/* DDL - Data Definition Language */ 

CREATE DATABASE miodb; -- Crea un DB di nome miodb;
USE miodb; -- Seleziona il DB da utilizzare;
DROP DATABASE miodb; -- Cancella un DB di nome miodb;

CREATE TABLE IF NOT EXISTS miatab ( -- Crea una tabella di nome miatab se non esiste;
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, -- Crea una PRIMARY KEY con valori generati in automatico e auto incrementanti
    name VARCHAR(255) NOT NULL, -- Crea una colonna di tipo stringa non vuota
    age INT UNSIGNED NOT NULL, -- Crea una colonna di tipo int non vuota con valori positivi
    email VARCHAR(100) NOT NULL UNIQUE -- Crea una colonna di tipo stringa con valori univoci
);

DROP TABLE miatab; -- Cancella una tabella di nome miatab;

ALTER TABLE miatab ADD cf VARCHAR(16) NOT NULL UNIQUE; -- Modifico la struttura della tabella aggiungendo un nuovo campo
ALTER TABLE miatab RENAME COLUMN cf TO fiscal_code; -- Modifico la struttura della tabella rinominando un campo esistente
ALTER TABLE miatab DROP fiscal_code; -- Modifico la struttura della tabella cancellando un campo esistente

/* DML - Data Manipulation Language */ 

INSERT INTO miatab (name, age, email) -- Inserisco un RECORD nella tabella maitab nei campi (name, age, email)
    VALUES ('Mario', 25, 'm.rossi@gmail.com'); -- con questi valori VALUES ('Mario', 25, 'm.rossi@gmail.com')

-- Modifica i valori del campo age ed email con dei nuovi valori per tutte le righe che hanno un id uguale a quello inserito
UPDATE miatab SET age = 26, email = 'mario.rossi@gmail.com' WHERE id = 1; -- attenzione ad inserire sempre la clausola WHERE altrimenti vengono modificati tutti i record della tabella

-- Cancello tutti i valori della mia tabella per tutte le righe che hanno un id uguale a quello inserito
DELETE FROM miatab WHERE id = 1; -- attenzione ad inserire sempre la clausola WHERE altrimenti vengono eliminati tutti i record della tabella


/* DQL - Data Query Language */

SELECT name, email FROM miatab; -- Restituisce nome ed email di tutti i record presenti nella tabella
SELECT * FROM miatab; -- Restituisce tutti i campi di tutti i record presenti nella tabella
SELECT * FROM miatab WHERE name = 'Mario'; -- Restituisce tutti i campi di tutti i record che corrispondono alla clausola WHERE nella tabella
SELECT * FROM miatab WHERE name = 'Mario' AND age = 30; -- Restituisce tutti i campi di tutti i record che corrispondono alla clausola WHERE nella tabella
SELECT * FROM miatab WHERE age > 18;
SELECT * FROM miatab WHERE email LIKE '%.com'; -- Restituisce tutti i campi in cui il campo email finisca con .com
SELECT * FROM miatab WHERE email LIKE '%ro%'; -- Restituisce tutti i campi in cui il campo email contenga i caratteri 'ro'
SELECT * FROM miatab WHERE email LIKE 'ma%'; -- Restituisce tutti i campi in cui il campo email cominci con 'ma'
SELECT * FROM miatab WHERE email LIKE 'm%.com'; -- Restituisce tutti i campi in cui il campo email cominci con 'm' e finisca con .com
SELECT * FROM miatab WHERE email LIKE 'm_rio@example.com'; -- Restituisce tutti i campi in cui il campo email nel secondo carattere può avere qualsiasi cosa



-- Vincoli di Foreign Keys
-- Soluzione 1 Creo il vincolo di FK quando creo la tabella
CREATE TABLE IF NOT EXISTS miatab_fk ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL, 
    date DATE NOT NULL, 
    miatab_id INT NOT NULL,
    CONSTRAINT FK_miatab_fk_miatab -- Vado a scrivere il nome della FK
        FOREIGN KEY (miatab_id) -- Vado ad indicare alla FK il campo della tabella in cui mi trovo
        REFERENCES miatab (id) -- Vado a scrivere la tabella e il campo a cui mi voglio collegare
        ON DELETE CASCADE ON UPDATE CASCADE; -- Metto i vincoli della FK
);

-- Soluzione 2 Creo prima la tabella e successivamente tramite un ALTER TABLE aggiungo il vincolo di FK
CREATE TABLE IF NOT EXISTS miatab_fk ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL, 
    date DATE NOT NULL, 
    miatab_id INT NOT NULL
);

ALTER TABLE miatab_fk 
    ADD CONSTRAINT FK_miatab_fk_miatab 
    FOREIGN KEY (miatab_id) 
    REFERENCES miatab(id) 
    ON DELETE RESTRICT ON UPDATE RESTRICT;

-- Relazioni tra tabelle sono di tipo
-- Uno a Uno
-- Uno a Molti
-- Molti a Molti

-- JOIN / INNER JOIN / LEFT JOIN / RIGHT JOIN
SELECT * FROM tab1 INNER JOIN tab2 ON tab1.id = tab2.tab1_id; -- restituisce tutti i dati della tab1 uniti alla tab2 sul vincolo di relazione tra tabelle
SELECT * FROM tab1 LEFT JOIN tab2 ON tab1.id = tab2.tab1_id; -- restituisce tutti i dati della tab1 uniti alla tab2 sul vincolo di relazione tra tabelle
SELECT * FROM tab1 RIGHT JOIN tab2 ON tab1.id = tab2.tab1_id; -- restituisce tutti i dati della tab1 uniti alla tab2 sul vincolo di relazione tra tabelle
SELECT * FROM tab1 FULL JOIN tab2 ON tab1.id = tab2.tab1_id; -- MYSQL non lo supporta

-- Paginazione con LIMIT e OFFSET
SELECT * FROM tab LIMIT 10 OFFSET 5;

-- Ordinamento con ORDER BY
SELECT * FROM tab ORDER BY col ASC/DESC

SELECT * FROM tab1 INNER JOIN tab2 
    ON tab1.id = tab2.tab1_id
    INNER JOIN tab3 ON tab1.id = tab3.tab1_id
    INNER JOIN tab4 ON tab1.id = tab4.tab1_id
    ORDER BY col ASC
    LIMIT 10 OFFSET 0
    ;