<?php
	require_once("../db.php");
	
	$sql = 'UPDATE dmapr SET uin_pts = ?, dml_id = ?, pergr = ? where id = ?';
	
	$sth = $db->prepare($sql);
	
	$uin_pts = $_GET['uin_pts'];
	$dml_id = $_GET['dml_id'];
	$pergr = $_GET['pergr'];
	$id = $_GET['id'];
	
	$sth->bind_param('dddd', $uin_pts, $dml_id, $pergr, $id);	
	$sth->execute();
	
	header("Location: ../index.php");
	
	exit(0);
?>

