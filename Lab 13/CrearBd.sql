
CREATE TABLE Materiales
(
	Clave numeric(5) not null,
	Descripcion varchar(50),
	Costo numeric(8,2)
)


CREATE TABLE Proveedores
(
  RFC char(13) not null,
  RazonSocial varchar(50)
)


CREATE TABLE Proyectos
(
  Numero numeric(5) not null,
  Denominacion varchar(50)
)




CREATE TABLE Entregan
(
  Clave numeric(5) not null,
  RFC char(13) not null,
  Numero numeric(5) not null,
  Fecha DateTime not null,
  Cantidad numeric (8,2)
)

BULK INSERT a1204695.a1204695.[Materiales]
FROM 'e:\wwwroot\rcortese\Materiales.csv'
with
(
	CODEPAGE='ACP',
	FIELDTERMINATOR=',',
	ROWTERMINATOR='\n'
)

BULK INSERT a1204695.a1204695.[Proyectos]
FROM 'e:\wwwroot\rcortese\Proyectos.csv'
with
(
	CODEPAGE='ACP',
	FIELDTERMINATOR=',',
	ROWTERMINATOR='\n'
)

BULK INSERT a1204695.a1204695.[Proveedores]
FROM 'e:\wwwroot\rcortese\Proveedores.csv'
with
(
	CODEPAGE='ACP',
	FIELDTERMINATOR=',',
	ROWTERMINATOR='\n'
)

SET DATEFORMAT dmy

BULK INSERT a1204695.a1204695.[Entregan]
FROM 'e:\wwwroot\rcortese\Entregan.csv'
with
(
	CODEPAGE='ACP',
	FIELDTERMINATOR=',',
	ROWTERMINATOR='\n'
)

INSERT INTO Materiales values(1000,'xxx',1000)

SELECT*FROM Materiales

Delete from Materiales where Clave=1000 and Costo=1000

ALTER TABLE Materiales add constraint llaveMateriales PRIMARY KEY(Clave)

INSERT INTO Materiales values(1000,'xxx',1000)

sp_helpconstraint materiales


ALTER TABLE Proveedores add constraint llaveProveedores PRIMARY KEY(RFC)

ALTER TABLE Proyectos add constraint llaveProyectos PRIMARY KEY (Numero)

ALTER TABLE Entregan add constraint llaveEntregan PRIMARY KEY (Clave, RFC, Numero, Fecha)

SELECT*FROM Materiales

SELECT*FROM Proveedores

SELECT*FROM Proyectos

INSERT INTO entregan values(0,'xxx',0,'1-jan-02',0);

SELECT *FROM entregan

Delete from Entregan where Clave=0

ALTER TABLE entregan add constraint cfentreganclave
foreign key (clave)references materiales(clave);

INSERT INTO entregan values (0, 'xxx', 0, '1-jan-02', 0);

SELECT *FROM entregan

ALTER TABLE entregan add constraint rfcEntregan
foreign key (rfc)references Proveedores(rfc);

ALTER TABLE entregan add constraint numEntregan
foreign key (numero)references Proyectos(numero);

sp_helpconstraint Materiales
sp_helpconstraint Proveedores
sp_helpconstraint Proyectos
sp_helpconstraint Entregan

INSERT INTO entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0);

SELECT*FROM Entregan

Delete from Entregan where Cantidad=0

ALTER TABLE entregan add constraint cantidad check (cantidad > 0);

INSERT INTO entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0);


sp_helpconstraint Materiales
sp_helpconstraint Proveedores
sp_helpconstraint Proyectos
sp_helpconstraint Entregan






