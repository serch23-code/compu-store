CREATE TABLE IF NOT EXISTS category(
	id INT AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	description VARCHAR(150) DEFAULT NULL,
	PRIMARY KEY(id)
);


CREATE TABLE IF NOT EXISTS sub_category(
	id INT AUTO_INCREMENT,
	name VARCHAR(100),
	category_id INT NOT NULL,
	
	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS product(
	id INT AUTO_INCREMENT,
	name VARCHAR(100),
	model VARCHAR(60) NOT NULL,
	price DECIMAL(12,2) NOT NULL,
	stock INT(11) NOT NULL,
	specification VARCHAR(120) NOT NULL,
	category_id INT NOT NULL,
	
	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS comments(
	id INT AUTO_INCREMENT,
	text LONGTEXT NOT NULL,
	name VARCHAR(100) NOT NULL,
	rating INT NOT NULL,
	product_id INT NOT NULL,
	
	PRIMARY KEY(id)
);


CREATE TABLE IF NOT EXISTS accessory(
	id INT AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	category_id INT NOT NULL,
	
	PRIMARY KEY(id)
);

ALTER TABLE category 
	ADD CONSTRAINT category_name_uk UNIQUE KEY(name);

ALTER TABLE sub_category
 	ADD CONSTRAINT sub_category_name_uk UNIQUE KEY(name),
 	ADD CONSTRAINT sub_category_category_id_fk FOREIGN KEY (category_id) REFERENCES category(id);

ALTER TABLE product
	ADD CONSTRAINT product_category_fk FOREIGN KEY (category_id) REFERENCES category(id);
	
ALTER TABLE comments
	ADD CONSTRAINT commnet_product_fk FOREIGN KEY (product_id) REFERENCES product(id);

ALTER TABLE accessory
	ADD CONSTRAINT accesory_category_fk FOREIGN KEY (category_id) REFERENCES category(id)


ALTER TABLE product
 	ADD COLUMN total_visits INT AFTER stock;
 	
 INSERT INTO category(name, description)
 VALUES('PC','Computadoras de escritorio'),
 ('Servidor','Servidores'),
 ('Laptop','Computadoras de portatil'),
 ('CPU','Unidad de proceso'),
 ('Chromebooks','Chromebooks'),
 ('Funda portatil','Prueba de categoria'),
 ('Accesorios moviles','Accesorios de celulares'),
 ('Work station','Work station'),
 ('Ultrabooks','Ultrabooks'),
 ('Accesorios pc','Accesorios para computadora');
 
INSERT INTO sub_category(name, category_id)values
('Manos libres',7),
('Protector',7),
('Monitor',10),
('Test categoria',5),
('Subactegoria 2',7),
('Baterias',6),
('Sonido',8),
('Audio',3),
('Almacenamiento',2),
('Test 2',7);

INSERT INTO product(name,model,price,stock,total_visits, specification,category_id) VALUES
('Pc HP','model 1',12000,10,20,'Test', 1),
('Laptop HP','model 2',15000,10,20,'Test', 1),
('Dell inspirom','model 1',12000,10,20,'Test', 1),
('Lenovo 1','model 1',12000,10,20,'Test', 1),
('Lenovo tink pad','model 1',12000,10,20,'Test', 1),
('Asus','model 1',12000,10,20,'Test', 1),
('Lenovo idea pad','model 1',12000,10,20,'Test', 3),
('Pc HP inspiron','model 1',12000,10,20,'Test', 3),
('Asus chomebook','model 1',12000,10,20,'Test', 3),
('Huawei','model 1',12000,10,20,'Test', 3);

INSERT INTO comments(text,name,rating,product_id) VALUES
('Excelente producto','comentario 1', 8,1),
('Buen producto','comentario 1', 7,1),
('Regular producto','comentario 1', 9,1),
('Lorem','comentario 1', 8,1),
('Prueba comentario','comentario 1', 9,1),
('Test test','comentario 1', 9,1),
('Prueba','comentario 1', 9,1),
('Excelente dispositivo','comentario 1', 9,1),
('Null','comentario 1', 9,1),
('Me agrado producto','comentario 1', 9,1);

INSERT INTO accessory(name, category_id) VALUES
('Audifonos xaiomi',7),
('Funda',7),
('Mica',7),
('Teclado',1),
('Raton',1),
('Antena wifi',1),
('Memorias RAM',1),
('Monitor',1),
('Soporte monitor',1),
('Ventilador laptop',3);

CREATE VIEW productComments AS
SELECT
	p.name AS product_name,
	c.name AS comment_name,
	AVG(c.rating) as score
FROM
	product p
INNER JOIN comments c ON
	c.product_id = p.id
GROUP BY
	p.name ,
	c.name,
	c.rating
ORDER BY
	c.rating DESC;