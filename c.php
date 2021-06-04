<?php
	session_start();
	require_once("db.php");	
	
	$pts = $db->query("SELECT * FROM pts");
	
	function cQuery(){
		global $db;
		
		$uin = $_POST['uin'];
		$t1 = $_POST['t1'];
		$t2 = $_POST['t2'];		
		
		$c = $db->query("SELECT dmlavt.UIN AS 'ТС',
						SUM(dmlavt.TV) AS 'Выдано',
						SUM(dmlavt.TOSTV + dmlavt.TV - dmlavt.TS) AS 'Расход'
						FROM dmlavt
						WHERE dmlavt.UIN = $uin AND DATA > '$t1' AND DATARET < '$t2'");		

		
		echo "
		<table border='1'>
			<tr>
				<td>Транспортное средство</td>
				<td>Выдано</td>
				<td>Расход</td>				
			</tr>";
		
		while($data = mysqli_fetch_array($c)) {
			$uin = $data['ТС'];
			$issued = $data['Выдано'];
			$consumption = $data['Расход'];
			
			echo "
			<tr>
				<td>$uin</td>
				<td>$issued</td>
				<td>$consumption</td>
			</tr>
			";
		}
		echo "</table>";
	}
?>
<html>
		<head>
			<meta charset="UTF-8">
			<title>с</title>
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
            <form method="post">
				Транспортное средство: <br>
				<select name="uin">					
					<?php 
						while($data = mysqli_fetch_array($pts)) {
							$uin = $data['UIN'];									
									
							echo  "<option value='$uin'>$uin</option>";
						}
					?>
				</select><br>
				Левый предел: <br>
				<input type="date" value="<?php echo $t1 ?>"placeholder="Левый предел" name="t1"><br><br>
				Правый предел: <br>
				<input type="date" value="<?php echo $t2 ?>" placeholder="Правый предел" name="t2"><br><br>				
				
				<input type="submit" name="run" id="run" value="Выполнить"><br><br>
            </form>
			
			<?php 
				if(array_key_exists('run',$_POST)){
					cQuery();
				}
			?>
        </main>
		</body>
	</html>