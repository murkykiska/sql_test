<?php	
	
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		require_once("../db.php");		
		
		$shname = $_POST['shname'];
		$fullname = $_POST['fullname'];		

		$sth = $db->prepare('INSERT INTO vidtc (shname, fullname) VALUES (?, ?)');
		$sth->bind_param('ss', $shname, $fullname);	
		
		$sth->execute();
		
		header("Location: ../index.php");		
        exit(0);
    }
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>vidtc | add item</title>
		<link rel="stylesheet" href="static/styles/style.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">		
	</head>
	<body>
		<main>
			<form action="add_item.php" method="post" enctype="multipart/form-data">
				<input type="text" placeholder="Краткое наименование" name="shname"><br>
				<input type="text" placeholder="Полное наименование" name="fullname"><br>
						
				<input type="submit" name="upload" value="Добавить"><br>
			</form>
        </main>
	</body>
</html>