<?php
	require_once("../db.php");
	
	$tiptr = $db->query("SELECT * FROM tiptr");
	$v_firm = $db->query("SELECT * FROM v_firm");
	
	$uin = $_GET['uin'];
	
	$pts = $db->query("SELECT * FROM pts where uin=$uin");
	
	$data = mysqli_fetch_array($pts);
	
	$unts = $data['UNTS'];
	$tid = $data['TID'];
	$firmid = $data['FIRMID'];
	$grp = $data['GRP'];
	$normt = $data['NORMT'];
	$datasp = $data['DATASP'];
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
                <input value="<?php echo $uin ?>" name="uin" readonly><br>
				<input value="<?php echo $unts ?>" type="text" placeholder="Учетный номер ТС" name="unts"><br>
				ID типа ТС:
				<select name="tid">					
					<?php 
						while($data = mysqli_fetch_array($tiptr)) {
							$tidt = $data['TID'];
							$tname = $data['TNAME'];									
							
							if($vidt == $vidtt) {
								echo  "<option selected value='$tidt'>$tidt - $tname</option>";
							}
							else {
								echo  "<option value='$tidt'>$tidt - $tname</option>";
							}
							
						}
					?>
				</select><br>
				
				ID предприятия:
				<select name="firmid">					
					<?php 
						while($data = mysqli_fetch_array($v_firm)) {
							$firmidt = $data['FIRMID'];
							$tlgr = $data['TLGR'];									
							
							if($firmidt == $firmid) {
								echo  "<option selected value='$firmidt'>$firmidt - $tlgr</option>";
							}
							else {
								echo  "<option value='$firmidt'>$firmidt - $tlgr</option>";
							}
							
						}
					?>
				</select><br>
				<input value="<?php echo $grp ?>" type="text" placeholder="Грузоподъемность" name="grp"><br>
				<input value="<?php echo $normt ?>" type="text" placeholder="Норматив расхода топлива" name="normt"><br>
				<input value="<?php echo $datasp ?>" type="date" placeholder="Дата списания ТС" name="datasp"><br>
				
				<input type="submit" name="upload" value="Обновить"><br>
            </form>
        </main>
	</body>
</html>