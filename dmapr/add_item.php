<?php	
	require_once("../db.php");	
	
	$pts = $db->query("SELECT * FROM pts");
	$dmlavt = $db->query("SELECT * FROM dmlavt");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$uin_pts = $_POST['uin_pts'];
		$dml_id = $_POST['dml_id'];		
		$pergr = $_POST['pergr'];		
		
		$sth = $db->prepare('INSERT INTO dmapr (uin_pts, dml_id, pergr) VALUES (?, ?, ?)');
		$sth->bind_param('ddd', $uin_pts, $dml_id, $pergr);	
		
		$sth->execute();
		
		header("Location: ../index.php");		
        exit(0);
    }
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>dmapr | add item</title>
		<link rel="stylesheet" href="static/styles/style.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">		
	</head>
	<body>
		<main>

			<form action="add_item.php" method="post" enctype="multipart/form-data">				
				ID прицепа:	
				<select name="uin_pts">					
					<?php 
						while($data = mysqli_fetch_array($pts)) {
							$uin_ptst = $data['UIN'];																
									
							echo  "<option value='$uin_ptst'>$uin_ptst</option>";
						}
					?>
				</select><br>
				ID путевого листа:	
				<select name="dml_id">					
					<?php 
						while($data = mysqli_fetch_array($dmlavt)) {
							$dml_idt = $data['ID'];							
									
							echo  "<option value='$dml_idt'>$dml_idt</option>";
						}
					?>
				</select><br>					
				<input type="text" placeholder="Перевезенный груз" name="pergr"><br>
				<input type="submit" name="upload" value="Добавить"><br>
			</form>
        </main>
	</body>
</html>