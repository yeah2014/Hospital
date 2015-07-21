<?php
/*
 * 默认信用度为3；
 *
 * flag=1时，帐号密码姓名电话不能为空；
 * flag=2时，数据库出错；
 * flag=3时，成功注册；
 */
if(!isset($_GET['account'])||!isset($_GET['password'])||!isset($_GET['name'])||!isset($_GET['phone'])){
	$flag = 1;
	$arr[0] = array("flag" => $flag);
	echo json_encode($arr);
}else {
	$account = $_GET['account'];
	$password = $_GET['password'];
	$name = $_GET['name'];
	//$number = $_GET['number'];
	$phone = $_GET['phone'];
	require_once 'function.php';
	connectDb();
	mysql_query("INSERT INTO aco_info (account,password) VALUE ('$account','$password')");
	$account_id = mysql_insert_id();
	$believable=3;
	$believable = intval($believable);
	mysql_query("INSERT INTO per_info (Account_Id,name,phone,believable) VALUE
				($account_id,'$name','$phone',$believable)");
	if(mysql_errno()){
		$flag = 2;
		$arr[0] = array("flag" => $flag);
		echo json_encode($arr);
	}
	$flag = 3;
	$arr[0] = array("flag" => $flag);
	echo json_encode($arr);
}


