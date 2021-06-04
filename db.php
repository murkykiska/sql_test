<?php
try {
	$db = mysqli_connect("127.0.0.1", "root", "", "sql_test");
	ini_set('default_charset','utf-8');
	mysqli_set_charset( $db, 'utf8');
	}
catch (Exception $e) {
		echo "no connection to database";
	}
?>