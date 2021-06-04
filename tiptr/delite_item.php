<?php
	require_once("../db.php");
	
	$sql = 'DELETE FROM tiptr WHERE tid = ?';
	$sth = $db->prepare($sql);
	
	$id = $_GET['tid'];
	$sth->bind_param('d', $id);
	$sth->execute();
	
	header("Location: ../../index.php");
?>