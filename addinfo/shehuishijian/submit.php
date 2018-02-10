<?php
	$host="localhost";
	$username="root";
	$password="JhFnZv9TmHhJ";
	//$password="root";
	$dbname="addinfo";
?>
<?php

	$name=$_POST['name'];
	$grade=$_POST['grade'];
	$tel=$_POST['tel'];
	$danfan=$_POST['danfan'];
	$sex=$_POST['sex'];
	$interest=$_POST['interest'];
	$time=date('Y-m-d h:i:s',time());
	

	
	$conn=new mysqli($host,$username,$password,$dbname);
	
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
		if(isset($_POST['name']) && isset($_POST['grade']) ){
			$conn->query('set names utf8');
			$sql ="insert into shehuishijian(id,name,grade,tel,sex,danfan,interest,time) values(null,'$name','$grade','$tel','$sex','$danfan','$interest','$time')";
			if($conn->query($sql)===true){
				$url = "http://mp.weixin.qq.com/s/orq_3yiX15YDDGC7DFhDuw";  
				echo "<script language='javascript' type='text/javascript'>";  
				echo "window.location.href='$url'";  
				echo "</script>";
				}
				else{
			
				 echo "Error: " . $sql . "<br>" . $conn->error;  
				}
			}


?> 