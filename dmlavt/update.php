<?php
	require_once("../db.php");
	
	$sql = 'UPDATE dmlavt SET uin = ?, serpl = ?, data = ?, dataret = ?, timebeg = ?,
		timeend = ?, worktime = ?, prostoy = ?, prostoytpr = ?, prostoygr = ?,
		speedb = ?, speede = ?, topid = ?, tostv = ?, tv = ?, ts = ?, tovz = ?,
		pergr = ?, pergrtkm = ? where id = ?';
	
	$sth = $db->prepare($sql);
	
	$id = $_GET['id'];
	$uin = $_GET['uin'];
	$serpl = $_GET['serpl'];								
	$data = $_GET['data'];								
	$dataret = $_GET['dataret'];								
	$timebeg = $_GET['timebeg'];								
	$timeend = $_GET['timeend'];								
	$worktime = $_GET['worktime'];								
	$prostoy = $_GET['prostoy'];								
	$prostoytpr = $_GET['prostoytpr'];								
	$prostoygr = $_GET['prostoygr'];								
	$speedb = $_GET['speedb'];								
	$speede = $_GET['speede'];								
	$topid = $_GET['topid'];								
	$tostv = $_GET['tostv'];								
	$tv = $_GET['tv'];								
	$ts = $_GET['ts'];								
	$tovz = $_GET['tovz'];								
	$pergr = $_GET['pergr'];								
	$pergrtkm = $_GET['pergrtkm'];	
	
	$sth->bind_param('ddssssdddddddddddddd', $uin, $serpl, $data, $dataret, $timebeg,
		$timeend, $worktime, $prostoy, $prostoytpr, $prostoygr, $speedb,
		$speede, $topid, $tostv, $tv, $ts, $tovz, $pergr, $pergrtkm, $id);
	
	$sth->execute();
	
	header("Location: ../index.php");
	
	exit(0);
?>

