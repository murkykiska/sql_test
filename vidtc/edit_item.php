<?php
	require_once("../db.php");
	
	$vidt = $_GET['vidt'];
	
	$vidtc = $db->query("SELECT * FROM vidtc where vidt=$vidt");
	
	$data = mysqli_fetch_array($vidtc);
	
	$shname = $data['SHNAME'];
	$fullname = $data['FULLNAME'];
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
                <input value="<?php echo $vidt ?>" name="vidt" readonly><br>
				<input value="<?php echo $shname ?>" type="text" placeholder="Краткое наименование" name="shname"><br>
				<input value="<?php echo $fullname ?>" type="text" placeholder="Полное наименование" name="fullname"><br>
				
				<input type="submit" name="upload" value="Обновить"><br>
            </form>
        </main>
	</body>
</html>