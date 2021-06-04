<?php	
	require_once("../db.php");	
	
	$pts = $db->query("SELECT * FROM pts");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		$uin = $_POST['uin'];
		$serpl = $_POST['serpl'];								
		$data = $_POST['data'];								
		$dataret = $_POST['dataret'];								
		$timebeg = $_POST['timebeg'];								
		$timeend = $_POST['timeend'];								
		$worktime = $_POST['worktime'];								
		$prostoy = $_POST['prostoy'];								
		$prostoytpr = $_POST['prostoytpr'];								
		$prostoygr = $_POST['prostoygr'];								
		$speedb = $_POST['speedb'];								
		$speede = $_POST['speede'];								
		$topid = $_POST['topid'];								
		$tostv = $_POST['tostv'];								
		$tv = $_POST['tv'];								
		$ts = $_POST['ts'];								
		$tovz = $_POST['tovz'];								
		$pergr = $_POST['pergr'];								
		$pergrtkm = $_POST['pergrtkm'];	
		

		$sth = $db->prepare('INSERT INTO dmlavt (uin, serpl, data, dataret, timebeg, timeend,
			worktime, prostoy, prostoytpr, prostoygr, speedb, speede, topid, tostv, tv, ts, tovz,
			pergr, pergrtkm) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
		$sth->bind_param('ddssssddddddddddddd', $uin, $serpl, $data, $dataret, $timebeg,
			$timeend, $worktime, $prostoy, $prostoytpr, $prostoygr, $speedb,
			$speede, $topid, $tostv, $tv, $ts, $tovz, $pergr, $pergrtkm);	
		
		$sth->execute();
		
		header("Location: ../index.php");		
        exit(0);
    }
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>dmlavt | add item</title>
		<link rel="stylesheet" href="static/styles/style.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">		
	</head>
	<body>
		<main>

			<form action="add_item.php" method="post" enctype="multipart/form-data">
				Ссылка на номер ТС:
				<select name="uin">					
					<?php 
						while($dbdata = mysqli_fetch_array($pts)) {
							$uint = $dbdata['UIN'];									
									
							echo  "<option value='$uint'>$uint</option>";
						}
					?>
				</select><br>
				<input type="text" placeholder="Номер, серия путевого листа" name="serpl"><br>
				<input type="date" placeholder="Дата выдачи путевого листа" name="data"><br>
				<input type="date" placeholder="Дата сдачи путевого листа" name="dataret"><br>
				<input type="time" placeholder="Время выезда" name="timebeg"><br>
				<input type="time" placeholder="Время заезда" name="timeend"><br>
				<input type="text" placeholder="Общее время работы" name="worktime"><br>
				<input type="text" placeholder="Общее время простоя" name="prostoy"><br>
				<input type="text" placeholder="Простой по тех. причинам" name="prostoytpr"><br>
				<input type="text" placeholder="Простой под погрузкой/разгрузкой" name="prostoygr"><br>
				<input type="text" placeholder="Показание спидометра при выезде" name="speedb"><br>
				<input type="text" placeholder="Показание спидометра при возвращении" name="speede"><br>
				<input type="text" placeholder="Вид топлива" name="topid"><br>
				<input type="text" placeholder="Наличие топлива - остаток при выезде" name="tostv"><br>
				<input type="text" placeholder="Наличие топлива - выдано" name="tv"><br>
				<input type="text" placeholder="Наличие топлива - сдано" name="ts"><br>
				<input type="text" placeholder="Наличие топлива - остаток при возвращении" name="tovz"><br>
				<input type="text" placeholder="Объем перевезеноого груза" name="pergr"><br>
				<input type="text" placeholder="Перевезено грузов, в тоннокилометрах" name="pergrtkm"><br>

				<input type="submit" name="upload" value="Добавить"><br>
			</form>
        </main>
	</body>
</html>