BULK INSERT a1204695.a1204695.[Proyectos]
FROM  'e:\wwwroot\rcortese\proyectos.csv'
WITH
(
	CODEPAGE='ACP',
	FIELDTERMINATOR=',',
	ROWTERMINATOR='\n'
)

SELECT*FROM Proyectos