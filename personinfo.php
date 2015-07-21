<?php
/*
 * 客户端接收json时，先获取flag进行判断；
 */
if(!isset($_GET['account'])){
	$flag = 0;
	$arr[0] = array("flag" => $flag);
	echo json_encode($arr);
}else {
	require_once 'function.php';
	connectDb();
	$account = $_GET['account'];
	$result = mysql_query("SELECT Account_Id FROM aco_info WHERE account='$account'");
	$acc_id = mysql_fetch_array($result);
	$id = $acc_id['Account_Id'];
	echo $id;
	$result = mysql_query("SELECT * FROM per_info WHERE Account_Id=$id");
	$personInfo = mysql_fetch_array($result);
	$flag = 1;
	$personInfoArr = array("name" => $personInfo['name'],
						"number" => $personInfo['number'],
						"phone"	=> $personInfo['phone'],
						"believable" =>$personInfo['believable'],
						"flag" => $flag
	);
	echo json_encode($personInfoArr);
}