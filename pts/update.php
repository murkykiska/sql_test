<?php
	require_once("../db.php");
	
	$sql = 'UPDATE pts SET unts = ?, tid = ?, firmid = ?, grp = ?, normt = ?, datasp = ? where uin = ?';
	
	$sth = $db->prepare($sql);
	
	$uin = $_GET['uin'];
	$unts = $_GET['unts'];
	$tid = $_GET['tid'];
	$firmid = $_GET['firmid'];
	$grp = $_GET['grp'];
	$normt = $_GET['normt'];
	$datasp = $_GET['datasp'];
	
	$sth->bind_param('dddddsd', $unts, $tid, $firmid, $grp, $normt, $datasp, $uin);
	$sth->execute();
	
	header("Location: ../index.php");
	
	exit(0);
?>

