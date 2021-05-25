drop TABLE if EXISTS clientes;
drop TABLE if EXISTS hoteles;
create table clientes(
    id int AUTOINCREMENT PRIMARY KEY,
    apellidos varchar(90) not NULL,
    nombre varchar(20) not null,
    email varchar(90) UNIQUE NOT null
);
create table hoteles(
    id int AUTOINCREMENT PRIMARY KEY,
    nombre varchar(80) unique not null,
    localidad varchar(100) NOT null,
    direccion varchar(100) NOT null
);
create table estancias(
    id int AUTOINCREMENT PRIMARY KEY,
    cliente_id int,
    hotel_id int,
    fecha_entrada date DEFAULT CURRENT_TIMESTAMP,
    fecha_salida date,
    CONSTRAINT estancia_cliente FOREIGN KEY(cliente_id) REFERENCES clientes(id) on delete CASCADE on UPDATE,
    CONSTRAINT estancia_hotel FOREIGN KEY(hotel_id) REFERENCES hoteles(id) on delete CASCADE on UPDATE cascade
);