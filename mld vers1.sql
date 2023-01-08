CREATE TABLE matiers(
   id_matiers INT,
   nom_matiers VARCHAR(50) NOT NULL,
   coefficient INT NOT NULL,
   PRIMARY KEY(id_matiers)
);

CREATE TABLE eleves(
   id_eleve INT,
   nom_eleve VARCHAR(255) NOT NULL,
   date_naissance DATE NOT NULL,
   lieux_naissance VARCHAR(50),
   PRIMARY KEY(id_eleve)
);

CREATE TABLE notes(
   id_note INT,
   semestre INT NOT NULL,
   note INT,
   id_eleve INT NOT NULL,
   id_matiers INT NOT NULL,
   PRIMARY KEY(id_note),
   FOREIGN KEY(id_eleve) REFERENCES eleves(id_eleve),
   FOREIGN KEY(id_matiers) REFERENCES matiers(id_matiers)
);
