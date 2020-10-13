SELECT SUM(Cantidad) as Cantidad, SUM(Cantidad * Costo) as Total
FROM Entregan E, Materiales M
WHERE M.Clave = E.Clave
AND Fecha BETWEEN '1997-01-01' AND '1997-12-31'

SELECT * FROM Entregan
SELECT * FROM Materiales
SELECT * FROM Proveedores
SELECT * FROM Proyectos

SELECT RazonSocial, COUNT(E.RFC) as EntregasTotales, SUM(Cantidad*Costo) AS ImporteTotal
FROM Proveedores P, Entregan E, Materiales M
WHERE P.RFC = E.RFC AND M.Clave = E.Clave
GROUP BY P.RazonSocial

SELECT M.Clave, Descripcion, COUNT(Cantidad), MIN(cantidad), MAX(cantidad), SUM(costo*cantidad) as ImporteTotal
FROM Materiales M, Entregan E
WHERE M.Clave = E.Clave
GROUP BY M.Clave, M.Descripcion
HAVING AVG(cantidad) > 400

SELECT RazonSocial, AVG(cantidad) as Promedio, M.clave, M.descripcion
FROM Materiales M, Entregan E, Proveedores P
WHERE M.Clave = E.clave
AND E.RFC = P.RFC
GROUP BY P.RFC, P.RazonSocial, M.Clave, M.Descripcion
HAVING AVG(Cantidad) <=500

SELECT RazonSocial, AVG(cantidad) as Promedio, M.clave, M.descripcion
FROM Materiales M, Entregan E, Proveedores P
WHERE M.Clave = E.clave
AND E.RFC = P.RFC
GROUP BY P.RFC, P.RazonSocial, M.Clave, M.Descripcion
HAVING AVG(Cantidad) <=370 OR AVG(cantidad) >=450

INSERT INTO Materiales (Clave, Descripcion, Costo)
VALUES (1440,'Diamante',20000),
(1450, 'Hierro', 20),
(1460, 'Bronze', 100),
(1470, 'Plata', 150),
(1480, 'Oro', 250)

SELECT M.Clave, descripcion
FROM Materiales M
WHERE M.Clave NOT IN(SELECT E.clave FROM Entregan E)

SELECT RazonSocial 
FROM Proveedores P, Entregan E, Proyectos PY
WHERE E.RFC = P.RFC
AND E.Numero = PY.numero
AND E.Numero =
(
SELECT Numero
FROM Proyectos
WHERE Denominacion = 'Vamos Mexico'
)
OR E.numero =
(
SELECT Numero
FROM Proyectos
WHERE Denominacion = 'Queretaro limpio'

)
GROUP BY P.RazonSocial

SELECT descripcion 
FROM Materiales M
WHERE M.clave NOT IN
(
SELECT E.clave
FROM Proyectos P, Entregan E
WHERE E.numero = p.numero
AND P.Denominacion = 'CIT Yucatan'

)

SELECT P.RazonSocial, AVG(E.Cantidad) as 'Promedio Entregado'
FROM Proveedores P, Entregan E
WHERE P.RFC = E.RFC
GROUP BY P.RazonSocial, E.Cantidad
HAVING AVG(E.Cantidad) > 
(SELECT AVG(E.Cantidad)
FROM Entregan E, Proveedores p
WHERE E.RFC = P.RFC and P.RFC = 'VAGO780901'
GROUP BY E.Cantidad
)


SELECT P.RFC, RazonSocial
FROM Proveedores P, Entregan E, Proyectos PY
WHERE PY.Denominacion = 'Infonavit Durango'
AND
(
	SELECT SUM(cantidad) as 'total'
	FROM Entregan E
	WHERE Fecha BETWEEN '2000-01-01' AND '2000-12-31'
)>
(
	SELECT SUM(cantidad) as 'total'
	FROM Entregan E
	WHERE Fecha BETWEEN '2001-01-01' AND '2001-12-31'

)
GROUP BY P.RFC, P.RazonSocial





