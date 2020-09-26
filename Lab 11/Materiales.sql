BULK INSERT A1204695.a1204695.[Materiales]
FROM 'e:\wwwroot\rcortese\materiales.csv'
WITH
(
	CODEPAGE='ACP',
	FIELDTERMINATOR=',',
	ROWTERMINATOR='\n'
)

SELECT *FROM Materiales