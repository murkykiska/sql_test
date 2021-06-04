<?php
	require_once("../db.php");
	
	$sql = 'UPDATE vidtc SET shname = ?, fullname = ? where vidt= ?';
	
	$sth = $db->prepare($sql);
	
	$shname = $_GET['shname'];
	$fullname = $_GET['fullname'];	
	$vidt = $_GET['vidt'];
	
	$sth->bind_param('ssd', $shname, $fullname, $vidt);
	
	$sth->execute();
	
	header("Location: ../index.php");
	
	exit(0);
?>

