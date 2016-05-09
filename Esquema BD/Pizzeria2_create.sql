-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-05-09 03:10:17.676

-- tables
-- Table: Especial
CREATE TABLE Especial (
    id int NOT NULL AUTO_INCREMENT,
    precio int NOT NULL,
    Pizza_id int NOT NULL,
    nombre varchar(30) NOT NULL,
    CONSTRAINT Especial_pk PRIMARY KEY (id)
);

-- Table: Ingrediente
CREATE TABLE Ingrediente (
    id int NOT NULL AUTO_INCREMENT,
    nombre int NOT NULL,
    precio int NOT NULL,
    CONSTRAINT Ingrediente_pk PRIMARY KEY (id)
);

-- Table: Operacion
CREATE TABLE Operacion (
    id int NOT NULL AUTO_INCREMENT,
    Orden_id int NOT NULL,
    fecha_hora datetime NOT NULL,
    lat double(11,5) NOT NULL,
    lon double(11,5) NOT NULL,
    CONSTRAINT Operacion_pk PRIMARY KEY (id)
);

-- Table: Orden
CREATE TABLE Orden (
    id int NOT NULL,
    fecha_hora datetime NOT NULL,
    direccion varchar(200) NOT NULL,
    Sucursal_id int NOT NULL,
    Repartidor_id int NOT NULL,
    lat double(11,5) NOT NULL,
    lon double(11,5) NOT NULL,
    nombre_cliente varchar(50) NOT NULL,
    CONSTRAINT Orden_pk PRIMARY KEY (id)
);

-- Table: Orden_producto
CREATE TABLE Orden_producto (
    Orden_id int NOT NULL,
    Producto_id int NOT NULL,
    precio int NOT NULL,
    cantidad int NOT NULL,
    CONSTRAINT Orden_producto_pk PRIMARY KEY (Orden_id,Producto_id)
);

-- Table: Paquete
CREATE TABLE Paquete (
    Producto_id int NOT NULL,
    Refresco_Producto_id int NOT NULL,
    Especial_id int NOT NULL,
    nombre varchar(30) NOT NULL,
    CONSTRAINT Paquete_pk PRIMARY KEY (Producto_id)
);

-- Table: Pizza
CREATE TABLE Pizza (
    Producto_id int NOT NULL,
    tamano int NOT NULL,
    CONSTRAINT Pizza_pk PRIMARY KEY (Producto_id)
);

-- Table: Producto
CREATE TABLE Producto (
    id int NOT NULL AUTO_INCREMENT,
    tipo int NOT NULL,
    precio double(6,2) NOT NULL,
    CONSTRAINT Producto_pk PRIMARY KEY (id)
);

-- Table: Refresco
CREATE TABLE Refresco (
    Producto_id int NOT NULL,
    nombre int NOT NULL,
    CONSTRAINT Refresco_pk PRIMARY KEY (Producto_id)
);

-- Table: Repartidor
CREATE TABLE Repartidor (
    id int NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    tel varchar(20) NOT NULL,
    CONSTRAINT Repartidor_pk PRIMARY KEY (id)
);

-- Table: Status
CREATE TABLE Status (
    id int NOT NULL AUTO_INCREMENT,
    descripcion int NOT NULL,
    CONSTRAINT Status_pk PRIMARY KEY (id)
);

-- Table: Sucursal
CREATE TABLE Sucursal (
    id int NOT NULL AUTO_INCREMENT,
    direccion varchar(200) NOT NULL,
    lat double(11,5) NOT NULL,
    lon double(11,5) NOT NULL,
    nombre varchar(30) NOT NULL,
    CONSTRAINT Sucursal_pk PRIMARY KEY (id)
);

-- Table: inv_ingrediente
CREATE TABLE inv_ingrediente (
    Sucursal_id int NOT NULL,
    Ingrediente_id int NOT NULL,
    CONSTRAINT inv_ingrediente_pk PRIMARY KEY (Sucursal_id,Ingrediente_id)
);

-- Table: inv_refresco
CREATE TABLE inv_refresco (
    Sucursal_id int NOT NULL,
    Refresco_id int NOT NULL,
    CONSTRAINT inv_refresco_pk PRIMARY KEY (Sucursal_id,Refresco_id)
);

-- Table: pizza_ingrediente
CREATE TABLE pizza_ingrediente (
    Ingrediente_id int NOT NULL,
    Pizza_Producto_id int NOT NULL,
    CONSTRAINT pizza_ingrediente_pk PRIMARY KEY (Ingrediente_id)
);

-- Table: status_operacion
CREATE TABLE status_operacion (
    Status_id int NOT NULL,
    Operacion_id int NOT NULL,
    CONSTRAINT status_operacion_pk PRIMARY KEY (Status_id,Operacion_id)
);

-- foreign keys
-- Reference: Especial_Pizza (table: Especial)
ALTER TABLE Especial ADD CONSTRAINT Especial_Pizza FOREIGN KEY Especial_Pizza (Pizza_id)
REFERENCES Pizza (Producto_id);

-- Reference: Operacion_Orden (table: Operacion)
ALTER TABLE Operacion ADD CONSTRAINT Operacion_Orden FOREIGN KEY Operacion_Orden (Orden_id)
REFERENCES Orden (id);

-- Reference: Orden_Repartidor (table: Orden)
ALTER TABLE Orden ADD CONSTRAINT Orden_Repartidor FOREIGN KEY Orden_Repartidor (Repartidor_id)
REFERENCES Repartidor (id);

-- Reference: Orden_Sucursal (table: Orden)
ALTER TABLE Orden ADD CONSTRAINT Orden_Sucursal FOREIGN KEY Orden_Sucursal (Sucursal_id)
REFERENCES Sucursal (id);

-- Reference: Orden_producto_Orden (table: Orden_producto)
ALTER TABLE Orden_producto ADD CONSTRAINT Orden_producto_Orden FOREIGN KEY Orden_producto_Orden (Orden_id)
REFERENCES Orden (id);

-- Reference: Orden_producto_Producto (table: Orden_producto)
ALTER TABLE Orden_producto ADD CONSTRAINT Orden_producto_Producto FOREIGN KEY Orden_producto_Producto (Producto_id)
REFERENCES Producto (id);

-- Reference: Paquete_Especial (table: Paquete)
ALTER TABLE Paquete ADD CONSTRAINT Paquete_Especial FOREIGN KEY Paquete_Especial (Especial_id)
REFERENCES Especial (id);

-- Reference: Paquete_Producto (table: Paquete)
ALTER TABLE Paquete ADD CONSTRAINT Paquete_Producto FOREIGN KEY Paquete_Producto (Producto_id)
REFERENCES Producto (id);

-- Reference: Paquete_Refresco (table: Paquete)
ALTER TABLE Paquete ADD CONSTRAINT Paquete_Refresco FOREIGN KEY Paquete_Refresco (Refresco_Producto_id)
REFERENCES Refresco (Producto_id);

-- Reference: Pizza_Producto (table: Pizza)
ALTER TABLE Pizza ADD CONSTRAINT Pizza_Producto FOREIGN KEY Pizza_Producto (Producto_id)
REFERENCES Producto (id);

-- Reference: Refresco_Producto (table: Refresco)
ALTER TABLE Refresco ADD CONSTRAINT Refresco_Producto FOREIGN KEY Refresco_Producto (Producto_id)
REFERENCES Producto (id);

-- Reference: inv_ingrediente_Ingrediente (table: inv_ingrediente)
ALTER TABLE inv_ingrediente ADD CONSTRAINT inv_ingrediente_Ingrediente FOREIGN KEY inv_ingrediente_Ingrediente (Ingrediente_id)
REFERENCES Ingrediente (id);

-- Reference: inv_ingrediente_Sucursal (table: inv_ingrediente)
ALTER TABLE inv_ingrediente ADD CONSTRAINT inv_ingrediente_Sucursal FOREIGN KEY inv_ingrediente_Sucursal (Sucursal_id)
REFERENCES Sucursal (id);

-- Reference: inv_refresco_Refresco (table: inv_refresco)
ALTER TABLE inv_refresco ADD CONSTRAINT inv_refresco_Refresco FOREIGN KEY inv_refresco_Refresco (Refresco_id)
REFERENCES Refresco (Producto_id);

-- Reference: inv_refresco_Sucursal (table: inv_refresco)
ALTER TABLE inv_refresco ADD CONSTRAINT inv_refresco_Sucursal FOREIGN KEY inv_refresco_Sucursal (Sucursal_id)
REFERENCES Sucursal (id);

-- Reference: pizza_ingrediente_Ingrediente (table: pizza_ingrediente)
ALTER TABLE pizza_ingrediente ADD CONSTRAINT pizza_ingrediente_Ingrediente FOREIGN KEY pizza_ingrediente_Ingrediente (Ingrediente_id)
REFERENCES Ingrediente (id);

-- Reference: pizza_ingrediente_Pizza (table: pizza_ingrediente)
ALTER TABLE pizza_ingrediente ADD CONSTRAINT pizza_ingrediente_Pizza FOREIGN KEY pizza_ingrediente_Pizza (Pizza_Producto_id)
REFERENCES Pizza (Producto_id);

-- Reference: status_operacion_Operacion (table: status_operacion)
ALTER TABLE status_operacion ADD CONSTRAINT status_operacion_Operacion FOREIGN KEY status_operacion_Operacion (Operacion_id)
REFERENCES Operacion (id);

-- Reference: status_operacion_Status (table: status_operacion)
ALTER TABLE status_operacion ADD CONSTRAINT status_operacion_Status FOREIGN KEY status_operacion_Status (Status_id)
REFERENCES Status (id);

-- End of file.
