<?php
/*
 * flag=0ʱ��û�н��յ���½��Ϣ��
 * flag=1ʱ���ʺŻ����벻�ܿգ�
 * flag=2ʱ����֤ͨ����
 * flag=3ʱ���������
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



