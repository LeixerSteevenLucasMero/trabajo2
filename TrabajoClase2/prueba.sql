CREATE DATABASE login;


-- Crear la tabla nivel
CREATE TABLE nivel (
    id_nivel INT AUTO_INCREMENT PRIMARY KEY,
    nom_nivel VARCHAR(255)
);

-- Insertar 10 registros de ejemplo en la tabla nivel
INSERT INTO nivel (nom_nivel) VALUES
    ('Universidad 1'),
    ('Universidad 2'),
    ('Universidad 3'),
    ('Universidad 4'),
    ('Universidad 5');


	




-- Crear la tabla provincia
CREATE TABLE provincia (
    id_provincia INT AUTO_INCREMENT PRIMARY KEY,
    nom_provincia VARCHAR(255)
);

-- Insertar las provincias de Panamá
INSERT INTO provincia (nom_provincia) VALUES
    ('Bocas del Toro'),
    ('Coclé'),
    ('Colón'),
    ('Chiriquí'),
    ('Darién'),
    ('Herrera'),
    ('Los Santos'),
    ('Panamá'),
    ('Veraguas'),
    ('Panamá Oeste');


CREATE TABLE distrito (
    id_distrito INT AUTO_INCREMENT PRIMARY KEY,
    nom_distrito VARCHAR(255),
    id_provincia INT,
    FOREIGN KEY (id_provincia) REFERENCES provincia(id_provincia)
);



INSERT INTO distrito (nom_distrito, id_provincia) VALUES
-- Insertar los distritos de la provincia de Bocas del Toro 4

 	('Changuinola', 1), 
    ('Chiriquí Grande', 1), 
    ('Almirante', 1), 
    ('Bocas del Toro', 1),
    
    -- Insertar los distritos de la provincia de Coclé 6

    ('Aguadulce', 2),
    ('Antón', 2),
    ('La Pintada', 2),
    ('Natá', 2),
    ('Olá', 2),
    ('Penonomé', 2),
    
    
    -- Insertar los distritos de la provincia de Colon 6
	('Colón', 3),
	('Chagres', 3),
	('Donoso', 3),
	('Portobelo', 3),
	('Santa Isabel', 3),
    ('Omar Torrijos Herrera', 3),
    
    
   -- Insertar los distritos de la provincia de Chiriquí 14

    ('David', 4),
    ('Alanje', 4),
    ('Barú', 4),
    ('Boquerón', 4),
    ('Boquete', 4),
    ('Bugaba', 4),
    ('Dolega', 4),
    ('Gualaca', 4),
    ('Remedios', 4),
    ('Renacimiento', 4),
    ('San Félix', 4),
    ('San Lorenzo', 4),
    ('Tierras Altas', 4),
    ('Tolé', 4),
    
     -- Insertar los distritos de la provincia de Darién 4
     ('Chepigana', 5),
     ('Santa Fe', 5),
     ('Pinogana', 5),
     ('Guna de Wargandí', 5),
     
     
     -- Insertar los distritos de la provincia de Herrera 7
     ('Chitré', 6),
     ('Las Minas', 6),
     ('Ocú', 6),
     ('Los Pozos', 6),
     ('Parita', 6),
     ('Pesé', 6),
     ('Santa María', 6),
     
     
     -- Insertar los distritos de la provincia de Los Santos 7
     ('Tonosí', 7),
     ('Guararé', 7),
     ('Las Tablas', 7),
     ('Los Santos', 7),
     ('Macaracas', 7),
     ('Pedasí', 7),
     ('Pocrí', 7),
     
     -- Insertar los distritos de la provincia de Panamá 6
     ('Balboa', 8),
     ('Chepo', 8),
     ('Chimán', 8),
     ('Panamá', 8),
     ('San Miguelito', 8),
     ('Taboga', 8),
     
     -- Insertar los distritos de la provincia de Veraguas 12
     ('Atalaya', 9),
     ('Calobre', 9),
     ('Cañazas', 9),
     ('La Mesa', 9),
     ('Las Palmas', 9),
     ('Mariato', 9),
     ('Montijo', 9),
     ('Río de Jesús', 9),
     ('San Francisco', 9),
     ('Santa Fe', 9),
     ('Santiago', 9),
     ('Santiago', 9),
     
     
     
     
      -- Insertar los distritos de la provincia de Panamá Oeste 5
	 ('Arraiján', 10),
     ('Capira', 10),
     ('Chame', 10),
     ('La Chorrera', 10),
     ('San Carlos', 10);

    


CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    apellido VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    foto BLOB,
    id_nivel INT,
    id_distrito INT,
    FOREIGN KEY (id_nivel) REFERENCES nivel(id_nivel),
    FOREIGN KEY (id_distrito) REFERENCES distrito(id_distrito)
);

    
    
    
    
    
    
