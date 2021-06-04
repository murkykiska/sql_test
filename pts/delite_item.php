<?php
	require_once("../db.php");
	
	$sql = 'DELETE FROM pts WHERE uin = ?';
	$sth = $db->prepare($sql);
	
	$id = $_GET['uin'];
	$sth->bind_param('d', $id);
	$sth->execute();
	
	header("Location: ../../index.php");
?>