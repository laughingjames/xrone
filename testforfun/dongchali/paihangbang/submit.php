<?php
	$host="localhost";
	$username="root";
	//$password="JhFnZv9TmHhJ";
	$password="root";
	$dbname="data";
?>
<?php

	$name=$_POST['cd-name'];
	$info=$_POST['cd-textarea'];
	$time=date('Y-m-d h:i:s',time());
	
	
	$conn=new mysqli($host,$username,$password,$dbname);
	
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
		if(isset($_POST['cd-name']) && isset($_POST['cd-textarea']) ){
			$conn->query('set names utf8');
			$sql ="insert into shehuishijian(id,name,info,time) values(null,'$name','$info','$time')";
			if($conn->query($sql)===true){
				$url = "http://www.xrone.cn/testforfun/dongchali/ParttimeJobimeJob.php";
				echo "<script language='javascript' type='text/javascript'>";  
				echo "window.location.href='$url'";  
				echo "</script>";
				}
				else{
			
				 echo "Error: " . $sql . "<br>" . $conn->error;  
				}
			}


?> 