sql.php

CREATE DATABASE todo_list;
USE todo_list;

CREATE TABLE gora (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_namn VARCHAR(50) NOT NULL,
    plats VARCHAR(100) NOT NULL,
    antal_personer_involverade VARCHAR(50) NOT NULL,
    datum DATETIME NOT NULL,
    klart_datum DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);