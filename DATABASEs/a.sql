-- a.	Отчет о количестве техники на предприятиях (с разбивкой по типам и видам техники).
SELECT v_firm.TLGR AS 'Предприятие',
vidtc.FULLNAME AS 'Вид ТС',
tiptr.TNAME AS 'Тип ТС',
COUNT(*) AS 'Количество техники' 
FROM pts
JOIN v_firm ON v_firm.FIRMID=pts.FIRMID
JOIN tiptr ON tiptr.TID=pts.TID
JOIN vidtc ON vidtc.VIDT=tiptr.VIDT

GROUP BY v_firm.TLGR, vidtc.FULLNAME, tiptr.TNAME
