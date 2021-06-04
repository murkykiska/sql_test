<?php
	session_start();
	require_once("db.php");

	$a = $db->query("SELECT v_firm.TLGR AS 'Предприятие',
					vidtc.FULLNAME AS 'Вид ТС',
					tiptr.TNAME AS 'Тип ТС',
					COUNT(*) AS 'Количество техники' 
					FROM pts
					JOIN v_firm ON v_firm.FIRMID=pts.FIRMID
					JOIN tiptr ON tiptr.TID=pts.TID
					JOIN vidtc ON vidtc.VIDT=tiptr.VIDT
					GROUP BY v_firm.TLGR, vidtc.FULLNAME, tiptr.TNAME");
	
?>
<html>
		<head>
			<meta charset="UTF-8">
			<title>a</title>
			<link rel="preconnect" href="https://fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
		</head>
		<body>			
		
			<header>
				<div class="content">					
					<ul>
						<li><a href="index.php"><h3>База данных</h3></a></li>
						<li><a href="a.php"><h3>Запрос a.</h3></a></li>
						<li><a href="b.php"><h3>Запрос b.</h3></a></li>
						<li><a href="c.php"><h3>Запрос c.</h3></a></li>
					</ul>
				</div>
			</header>
			
			<main>
				<div class="content">
					<table border="1">
						<tr>
							<td><b>Предприятие</b></td>
							<td><b>Вид ТС</b></td>
							<td><b>Тип ТС</b></td>
							<td><b>Количество техники</b></td>
						</tr>
						<?php
							while($data = mysqli_fetch_array($a)) {
								$firm = $data['Предприятие'];
								$vid = $data['Вид ТС'];
								$type = $data['Тип ТС'];
								$count = $data['Количество техники'];
								echo  "
									<tr>
										<td>$firm</td>
										<td>$vid</td>
										<td>$type</td>
										<td>$count</td>
									</tr>
								";
							}
						?>							
					</table>
				</div>
			</main>
		</body>
	</html>