<?php
	require_once("../db.php");
	
	$sql = 'UPDATE v_firm SET tlgr = ?, disloc = ? where firmid= ?';
	
	$sth = $db->prepare($sql);
	
	$tlgr = $_GET['TLGR'];
	$disloc = $_GET['DISLOC'];	
	$firmid = $_GET['FIRMID'];
	
	$sth->bind_param('ssd', $tlgr, $disloc, $firmid);
	
	$sth->execute();
	
	header("Location: ../index.php");
	
	exit(0);
?>

