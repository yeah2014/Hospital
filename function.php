<?php


require_once 'config.php';
function connectDb(){
	$conn = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PW);
	if(!$conn){
		die('Can not connect db');
	}
	mysql_select_db('hospital');
	
	return $conn;
}