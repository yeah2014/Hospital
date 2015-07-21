<?php
/*
 * flag=0时，没有接收到登陆信息；
 * flag=1时，帐号或密码不能空；
 * flag=2时，验证通过；
 * flag=3时，密码错误；
 */
$flag = 0;
if(isset($_GET['account']) && isset($_GET['password'])){
	$account = $_GET['account'];
	$password = $_GET['password'];
	if(!empty($account)&&!empty($password)){
		require_once 'function.php';
		connectDb();
		$result = mysql_query("SELECT * FROM ACO_INFO WHERE account = '$account' AND password = '$password'");
		$result_sign = mysql_num_rows($result);
		if($result_sign){
			$flag = 2;
			$arr[0] = array("flag" => $flag);
			echo json_encode($arr);
		}else {
			$flag = 3;
			$arr[0] = array("flag" => $flag);
			echo json_encode($arr);
		}

	}else {
		$flag = 1;
		$arr[0] = array("flag" => $flag);
		echo json_encode($arr);
	}
}else {
	$arr[0] = array("flag" => $flag);
	echo json_encode($arr);
}



