<?php
	session_start();
	require_once("db.php");	
	
	function bQuery(){
		global $db;
		
		$t1 = $_POST['t1'];
		$t2 = $_POST['t2'];
		
		$b = $db->query("SELECT 
						V.UIN,
						SUM(V.PERGR)
						FROM
						(SELECT
						dmlavt.UIN,
						SUM(dmlavt.PERGR) AS PERGR
						FROM dmlavt
						WHERE DATA > '$t1' AND DATARET < '$t2'
						GROUP BY dmlavt.UIN
						UNION
							SELECT
						dmlavt.UIN,
						SUM(dmapr.PERGR)
						FROM dmapr
						JOIN dmlavt ON dmlavt.ID=dmapr.DML_ID
						WHERE DATA > '$t1' AND DATARET < '$t2'
						GROUP BY dmlavt.UIN) AS V
						GROUP BY V.UIN
						ORDER BY PERGR");		

		echo "
		<table border='1'>
			<tr>
				<td>Транспортное средство</td>
				<td>Перевезенный груз</td>
			</tr>";
		
		while($data = mysqli_fetch_array($b)) {
			$uin = $data['UIN'];
			$pergr = $data['SUM(V.PERGR)'];
			
			echo "
			<tr>
				<td>$uin</td>
				<td>$pergr</td>
			</tr>
			";
		}
		echo "</table>";
	}
?>
<html>
		<head>
			<meta charset="UTF-8">
			<title>b</title>
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
				Левый предел: <br>
				<input type="date" value="<?php echo $t1 ?>"placeholder="Левый предел" name="t1"><br><br>
				Правый предел: <br>
				<input type="date" value="<?php echo $t2 ?>" placeholder="Правый предел" name="t2"><br><br>				
				
				<input type="submit" name="run" id="run" value="Выполнить"><br><br>
            </form>
			
			<?php 
				if(array_key_exists('run',$_POST)){
					bQuery();
				}
			?>
        </main>
		</body>
	</html>