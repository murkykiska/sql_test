<?php	
	
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		require_once("../db.php");		
		
		$tlgr = $_POST['TLGR'];
		$disloc = $_POST['DISLOC'];		

		$sth = $db->prepare('INSERT INTO v_firm (TLGR, DISLOC) VALUES (?, ?)');
		$sth->bind_param('ss', $tlgr, $disloc);	
		
		$sth->execute();
		
		header("Location: ../index.php");		
        exit(0);
    }
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>v_firm | add item</title>
		<link rel="stylesheet" href="static/styles/style.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">		
	</head>
	<body>
		<main>
			<form action="add_item.php" method="post" enctype="multipart/form-data">
				<input type="text" placeholder="Наименование" name="TLGR"><br>
				<input type="text" placeholder="Расположение" name="DISLOC"><br>
						
				<input type="submit" name="upload" value="Добавить"><br>
			</form>
        </main>
	</body>
</html>