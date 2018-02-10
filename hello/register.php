<?php
require_once('con.php');
require_once('api.php');
$username=$_POST['username'];
$password=$_POST['password'];
$sex=$_POST['sex'];
if($sex='女'){
	$sex=1;
	}else{$sex=0;}
if($username!= "" && $password != "") 
{
	$password = md5($password);
	$sql = "select * from user where username='$username'";
	$query = mysqli_query($connect, $sql);
	$row = mysqli_num_rows($query);
	if($row == 0) {
			$token = $obj->token;

			$sql2 = "insert into user(id,username,password,sex) values(null,'$username','$password', '$sex')";
			$query = mysqli_query($connect, $sql2);
			
			$result = array("status"=>"success", "token"=>$token,"username"=>$username,"password"=>$password,"sex"=>$sex);
			echo json_encode($result);
		
	}
	else {
		$result = array("status"=>"exists");
		echo json_encode($result);
	}
}else{
	$result = array('status'=>"error");
	echo json_encode($result);
}
?>








