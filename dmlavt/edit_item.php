<?php
	require_once("../db.php");
	
	$pts = $db->query("SELECT * FROM pts");
	
	$id = $_GET['id'];
	
	$dmlavt = $db->query("SELECT * FROM dmlavt where id=$id");
	
	$dbdata = mysqli_fetch_array($dmlavt);
	
	$uin = $dbdata['UIN'];
	$serpl = $dbdata['SERPL'];								
	$data = $dbdata['DATA'];								
	$dataret = $dbdata['DATARET'];								
	$timebeg = $dbdata['TIMEBEG'];								
	$timeend = $dbdata['TIMEEND'];								
	$worktime = $dbdata['WORKTIME'];								
	$prostoy = $dbdata['PROSTOY'];								
	$prostoytpr = $dbdata['PROSTOYTPR'];								
	$prostoygr = $dbdata['PROSTOYGR'];								
	$speedb = $dbdata['SPEEDB'];								
	$speede = $dbdata['SPEEDE'];								
	$topid = $dbdata['TOPID'];								
	$tostv = $dbdata['TOSTV'];								
	$tv = $dbdata['TV'];								
	$ts = $dbdata['TS'];								
	$tovz = $dbdata['TOVZ'];								
	$pergr = $dbdata['PERGR'];								
	$pergrtkm = $dbdata['PERGRTKM'];
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>edit item</title>
		<link rel="stylesheet" href="../static/styles/style.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
	</head>
	<body>
		<main>
            <form action="../update.php">
                <input value="<?php echo $id ?>" name="id" readonly><br>
				Ссылка на номер ТС:
				<select name="uin">					
					<?php 
						while($dbdata = mysqli_fetch_array($pts)) {
							$uint = $dbdata['UIN'];	

							if($uint == $uin) {
								echo  "<option selected value='$uint'>$uint</option>";
							}
							else {
								echo  "<option value='$uint'>$uint</option>";
							}
									
							
						}
					?>
				</select><br>
				
				<input value="<?php echo $serpl ?>" type="text" placeholder="Ссылка на номер ТС" name="serpl"><br>
				<input value="<?php echo $data ?>" type="date" placeholder="Дата выдачи путевого листа" name="data"><br>
				<input value="<?php echo $dataret ?>" type="date" placeholder="Дата сдачи путевого листа" name="dataret"><br>
				<input value="<?php echo $timebeg ?>" type="time" placeholder="Время выезда" name="timebeg"><br>
				<input value="<?php echo $timeend ?>" type="time" placeholder="Время заезда" name="timeend"><br>
				<input value="<?php echo $worktime ?>" type="text" placeholder="Общее время работы" name="worktime"><br>
				<input value="<?php echo $prostoy ?>" type="text" placeholder="Общее время простоя" name="prostoy"><br>
				<input value="<?php echo $prostoytpr ?>" type="text" placeholder="Простой по тех. причинам" name="prostoytpr"><br>
				<input value="<?php echo $prostoygr ?>" type="text" placeholder="Простой под погрузкой/разгрузкой" name="prostoygr"><br>
				<input value="<?php echo $speedb ?>" type="text" placeholder="Показание спидометра при выезде" name="speedb"><br>
				<input value="<?php echo $speede ?>" type="text" placeholder="Показание спидометра при возвращении" name="speede"><br>
				<input value="<?php echo $topid ?>" type="text" placeholder="Вид топлива" name="topid"><br>
				<input value="<?php echo $tostv ?>" type="text" placeholder="Наличие топлива - остаток при выезде" name="tostv"><br>
				<input value="<?php echo $tv ?>" type="text" placeholder="Наличие топлива - выдано" name="tv"><br>
				<input value="<?php echo $ts ?>" type="text" placeholder="Наличие топлива - сдано" name="ts"><br>
				<input value="<?php echo $tovz ?>" type="text" placeholder="Наличие топлива - остаток при возвращении" name="tovz"><br>
				<input value="<?php echo $pergr ?>" type="text" placeholder="Объем перевезеноого груза" name="pergr"><br>
				<input value="<?php echo $pergrtkm ?>" type="text" placeholder="Перевезено грузов, в тоннокилометрах" name="pergrtkm"><br>
				
				<input type="submit" name="upload" value="Обновить"><br>
            </form>
        </main>
	</body>
</html>