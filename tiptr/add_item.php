<?php	
	require_once("../db.php");	
	
	$vidtc = $db->query("SELECT * FROM vidtc");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$tname = $_POST['tname'];
		$vidt = $_POST['vidt'];		
		$prizngr = $_POST['prizngr'];		

		$sth = $db->prepare('INSERT INTO tiptr (tname, vidt, prizngr) VALUES (?, ?, ?)');
		$sth->bind_param('sds', $tname, $vidt, $prizngr);	
		
		$sth->execute();
		
		header("Location: ../index.php");		
        exit(0);
    }
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>tiptr | add item</title>
		<link rel="stylesheet" href="static/styles/style.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">		
	</head>
	<body>
		<main>

			<form action="add_item.php" method="post" enctype="multipart/form-data">
				<input type="text" placeholder="Наименование типа" name="tname"><br>
				ID вида ТС:	
				<select name="vidt">					
					<?php 
						while($data = mysqli_fetch_array($vidtc)) {
							$vidtt = $data['VIDT'];
							$fullname = $data['FULLNAME'];									
									
							echo  "<option value='$vidtt'>$vidtt - $fullname</option>";
						}
					?>
				</select><br>
				<input type="text" placeholder="Признак грузового ТС" name="prizngr"><br>
						
				<input type="submit" name="upload" value="Добавить"><br>
			</form>
        </main>
	</body>
</html>