<?php
	require_once("../db.php");
	
	$sql = 'DELETE FROM dmlavt WHERE id = ?';
	$sth = $db->prepare($sql);
	
	$id = $_GET['id'];
	$sth->bind_param('d', $id);
	$sth->execute();
	
	header("Location: ../../index.php");
?>