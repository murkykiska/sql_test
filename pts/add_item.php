<?php	
	require_once("../db.php");	
	
	$tiptr = $db->query("SELECT * FROM tiptr");
	$v_firm = $db->query("SELECT * FROM v_firm");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$unts = $_POST['unts'];
		$tid = $_POST['tid'];
		$firmid = $_POST['firmid'];
		$grp = $_POST['grp'];
		$normt = $_POST['normt'];
		
		if(strcasecmp("0000-00-00", $_POST['datasp']) == 0){
			$datasp = 'NULL';
		}
		else{
			$datasp = $_POST['datasp'];
		}		

		$sth = $db->prepare('INSERT INTO pts (unts, tid, firmid, grp, normt, datasp) VALUES (?, ?, ?, ?, ?, ?)');
		$sth->bind_param('ddddds', $unts, $tid, $firmid, $grp, $normt, $datasp);	
		
		$sth->execute();
		
		header("Location: ../index.php");		
        exit(0);
    }
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>pts | add item</title>
		<link rel="stylesheet" href="static/styles/style.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">		
	</head>
	<body>
		<main>

			<form action="add_item.php" method="post" enctype="multipart/form-data">
				<input type="text" placeholder="Учетный номер ТС" name="unts"><br>
				ID типа ТС:	
				<select name="tid">					
					<?php 
						while($data = mysqli_fetch_array($tiptr)) {
							$tidt = $data['TID'];
							$tname = $data['TNAME'];									
									
							echo  "<option value='$tidt'>$tidt - $tname</option>";
						}
					?>
				</select><br>
				ID предприятия:	
				<select name="firmid">					
					<?php 
						while($data = mysqli_fetch_array($v_firm)) {
							$firmidt = $data['FIRMID'];
							$tlgr = $data['TLGR'];									
									
							echo  "<option value='$firmidt'>$firmidt - $tlgr</option>";
						}
					?>
				</select><br>
				<input type="text" placeholder="Грузоподъемность" name="grp"><br>
				<input type="text" placeholder="Норматив расхода топлива" name="normt"><br>
				<input type="date" placeholder="Дата списания ТС" name="datasp"><br>
						
				<input type="submit" name="upload" value="Добавить"><br>
			</form>
        </main>
	</body>
</html>