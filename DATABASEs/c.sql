-- c.	Вычислить количество выданного топлива и его расход для заданного транспортного средства за указанный период. 
SELECT dmlavt.UIN AS "ТС",
SUM(dmlavt.TV) AS "Выдано",
SUM(dmlavt.TOSTV + dmlavt.TV - dmlavt.TS) AS "Расход"
FROM dmlavt
WHERE dmlavt.UIN = 8 AND DATA > '2021-01-01' AND DATARET < '2021-06-10'