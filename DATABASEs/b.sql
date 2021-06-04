-- b.	Вывести список грузовых транспортных средств упорядоченных по объемам перевезенного груза за заданный период (учитывая, что за смену транспортное средство может сменить несколько прицепов).
SELECT 
	V.UIN,
	SUM(V.PERGR)
	FROM
	(SELECT
	dmlavt.UIN,
	SUM(dmlavt.PERGR) AS PERGR
	FROM dmlavt
    WHERE DATA > '2021-01-01' AND DATARET < '2021-06-10'
	GROUP BY dmlavt.UIN
	UNION
		SELECT
	dmlavt.UIN,
	SUM(dmapr.PERGR)
	FROM dmapr
	JOIN dmlavt ON dmlavt.ID=dmapr.DML_ID
    WHERE DATA > '2021-01-01' AND DATARET < '2021-06-10'
	GROUP BY dmlavt.UIN) AS V
	GROUP BY V.UIN
    ORDER BY PERGR