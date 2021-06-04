<?php
	require_once("../db.php");
	
	$sql = 'UPDATE tiptr SET tname = ?, vidt = ?, prizngr = ? where tid = ?';
	
	$sth = $db->prepare($sql);
	
	$tid = $_GET['tid'];
	$tname = $_GET['tname'];
	$vidt = $_GET['vidt'];	
	$prizngr = $_GET['prizngr'];
	
	$sth->bind_param('sdsd', $tname, $vidt, $prizngr, $tid);
	
	$sth->execute();
	
	header("Location: ../index.php");
	
	exit(0);
?>

