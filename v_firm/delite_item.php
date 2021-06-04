<?php
	require_once("../db.php");
	
	$sql = 'DELETE FROM v_firm WHERE firmid= ?';
	$sth = $db->prepare($sql);
	
	
	$id = $_GET['firmid'];
	$sth->bind_param('d', $id);
	$sth->execute();
	
	header("Location: ../../index.php");
?>