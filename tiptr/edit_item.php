<?php
	require_once("../db.php");
	
	$vidtc = $db->query("SELECT * FROM vidtc");
	
	$tid = $_GET['tid'];
	
	$tiptr = $db->query("SELECT * FROM tiptr where tid=$tid");
	
	$data = mysqli_fetch_array($tiptr);
	
	$tname = $data['TNAME'];
	$vidt = $data['VIDT'];
	$prizngr = $data['PRIZNGR'];
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
                <input value="<?php echo $tid ?>" name="tid" readonly><br>
				<input value="<?php echo $tname ?>" type="text" placeholder="Наименование типа" name="tname"><br>
				ID вида ТС:	
				<select name="vidt">					
					<?php 
						while($data = mysqli_fetch_array($vidtc)) {
							$vidtt = $data['VIDT'];
							$fullname = $data['FULLNAME'];									
							
							if($vidt == $vidtt) {
								echo  "<option selected value='$vidtt'>$vidtt - $fullname</option>";
							}
							else {
								echo  "<option value='$vidtt'>$vidtt - $fullname</option>";
							}
							
						}
					?>
				</select><br>
				<input value="<?php echo $prizngr ?>" type="text" placeholder="Признак грузового ТС" name="prizngr"><br>
				
				<input type="submit" name="upload" value="Обновить"><br>
            </form>
        </main>
	</body>
</html>