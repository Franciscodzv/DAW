BULK INSERT a1204695.a1204695.[Proveedores]
FROM 'e:\wwwroot\rcortese\proveedores.csv'
WITH
(
	CODEPAGE='ACP',
	FIELDTERMINATOR=',',
	ROWTERMINATOR='\n'
)

SELECT*FROM Proveedores