CREATE TABLE Clientes_Banca
(
	NoCuenta varchar(5) not null Primary KEY,
	Nombre varchar(30),
	Saldo numeric(10,2)

)

BEGIN TRANSACTION PRUEBA1
INSERT INTO Clientes_Banca VALUES('001','Manuel Rios Maldonado',9000);
INSERT INTO Clientes_Banca VALUES ('002','Pablo Perez Ortiz',5000);
INSERT INTO Clientes_Banca VALUES ('003','Luis Flores Alvarado',8000);
COMMIT TRANSACTION PRUEBA1

SELECT * FROM Clientes_Banca

BEGIN TRANSACTION PRUEBA2
INSERT INTO CLIENTES_BANCA VALUES('004','Ricardo Rios Maldonado',19000);
INSERT INTO CLIENTES_BANCA VALUES('005','Pablo Ortiz Arana',15000);
INSERT INTO CLIENTES_BANCA VALUES('006','Luis Manuel Alvarado',18000);

ROLLBACK TRANSACTION PRUEBA2

SELECT * FROM TiposMovimiento

SELECT * FROM Realizan

CREATE PROCEDURE REGISTRAR_RETIRO_CAJERO
    @noCuenta varchar(255),
    @Monto numeric(10,2)
AS
    BEGIN TRANSACTION RetiroCajero
    INSERT INTO Realizan VALUES(GETDATE(),@Monto,@noCuenta, 'A')
	UPDATE Clientes_Banca SET Saldo = Saldo - @Monto
	WHERE NoCuenta = @noCuenta

    IF @@ERROR = 0
    COMMIT TRANSACTION RetiroCajero
    ELSE
    BEGIN
    PRINT 'A transaction needs to be rolled back'
    ROLLBACK TRANSACTION RetiroCajero
    END
GO




Execute REGISTRAR_RETIRO_CAJERO '001',2

CREATE PROCEDURE REGISTRAR_DEPOSITO_VENTANILLA
    @noCuenta varchar(255),
    @Monto numeric(10,2)
AS
    BEGIN TRANSACTION DepositoVentanilla
    INSERT INTO Realizan VALUES(GETDATE(),@Monto,@noCuenta, 'B')
	UPDATE Clientes_Banca SET Saldo = Saldo + @Monto
	WHERE NoCuenta = @noCuenta

    IF @@ERROR = 0
    COMMIT TRANSACTION DepositoVentanilla
    ELSE
    BEGIN
    PRINT 'No pudo realizarse el deposito'
    ROLLBACK TRANSACTION DepositoVentanilla
    END
GO




Execute REGISTRAR_DEPOSITO_VENTANILLA '001',5

SELECT * FROM Clientes_Banca

SELECT * FROM Realizan

