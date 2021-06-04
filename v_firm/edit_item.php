<?php
	require_once("../db.php");
	
	$firmid = $_GET['firmid'];
	
	$v_firm = $db->query("SELECT * FROM v_firm where firmid=$firmid");
	
	$data = mysqli_fetch_array($v_firm);
	
	$tlgr = $data['TLGR'];
	$disloc = $data['DISLOC'];
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
                <input value="<?php echo $firmid ?>" name="FIRMID" readonly><br>
				<input value="<?php echo $tlgr ?>" type="text" placeholder="Наименование" name="TLGR"><br>
				<input value="<?php echo $disloc ?>" type="text" placeholder="Расположение" name="DISLOC"><br>
				
				<input type="submit" name="upload" value="Обновить"><br>
            </form>
        </main>
	</body>
</html>