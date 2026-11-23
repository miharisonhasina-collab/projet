CREATE DATABASE energie;
USE energie;

CREATE TABLE salle (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50)
);

CREATE TABLE consommation (
    id INT PRIMARY KEY AUTO_INCREMENT,
    salle_id INT NOT NULL,
    mois VARCHAR(20),
    annee INT,
    jirama FLOAT,
    solaire FLOAT,
    groupe FLOAT,
    CONSTRAINT fk_consommation_salle
        FOREIGN KEY (salle_id) REFERENCES salle(id)
        ON DELETE CASCADE
);

INSERT INTO salle (nom) VALUES
('Amphi A'),
('Amphi B'),
('Salle 1'),
('Salle 2'),
('Labo'),
('Conference');

