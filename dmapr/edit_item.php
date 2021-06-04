<?php
	require_once("../db.php");
	
	$pts = $db->query("SELECT * FROM pts");
	$dmlavt = $db->query("SELECT * FROM dmlavt");
	
	$id = $_GET['id'];
	
	$dmapr = $db->query("SELECT * FROM dmapr where id=$id");
	
	$data = mysqli_fetch_array($dmapr);
	
	$uin_pts = $data['UIN_PTS'];
	$pergr = $data['PERGR'];
	$dml_id = $data['DML_ID'];
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
				ID прицепа:	
				<select name="uin_pts">					
					<?php 
						while($data = mysqli_fetch_array($pts)) {
							$uin_ptst = $data['UIN'];																
							if($uin_pts == $uin_ptst) {
								echo  "<option selected value='$uin_ptst'>$uin_ptst</option>";
							}
							else {
								echo  "<option value='$uin_ptst'>$uin_ptst</option>";
							}		
							
						}
					?>
				</select><br>
				ID путевого листа:	
				<select name="dml_id">					
					<?php 
						while($data = mysqli_fetch_array($dmlavt)) {
							$dml_idtt = $data['ID'];
							
							if($dml_idt == $dml_idtt) {
								echo  "<option selected value='$dml_idtt'>$dml_idtt</option>";
							}
							else {
								echo  "<option value='$dml_idtt'>$dml_idtt</option>";
							}
						}
					?>
				</select><br>
				<input type="text" value="<?php echo $pergr ?>"placeholder="Перевезенный груз" name="pergr"><br>
				<input type="submit" name="upload" value="Обновить"><br>
            </form>
        </main>
	</body>
</html>