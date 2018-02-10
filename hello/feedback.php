
<?php
	require_once ('con.php');

	$message=$_POST['message'];
	$ip = $_SERVER["REMOTE_ADDR"];
	if(mysqli_connect_errno()){
		echo mysqli_connect_errno();
		echo 'Could not connect to database.';
		exit;
	}else{
		$sql="insert into feedback(id,message,ip,time) values(null,'$message','$ip',null)";

		$result=$connect->query($sql);
		if($result){
			echo '1';
		}else{
            echo $sql;
		}
	}


?> 