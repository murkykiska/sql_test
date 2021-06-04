<?php
	require_once("../db.php");
	
	$sql = 'DELETE FROM vidtc WHERE vidt = ?';
	$sth = $db->prepare($sql);
	
	$id = $_GET['vidt'];
	$sth->bind_param('d', $id);
	$sth->execute();
	
	header("Location: ../../index.php");
?>