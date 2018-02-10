<?php
$db_user = "root";
$db_pass = "JhFnZv9TmHhJ";
$db_host = "localhost";
$db_port = 3306;
$db_name = "hello";
mysql_query("SET NAMES 'UTF8'");
mysql_query("SET CHARACTER SET utf8");
$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);	
?>
<?php

	
        $result = file_get_contents('php://input');
		$result='['.$result.']';
		$data=json_decode($result,TRUE);
		
	echo $result;
	$info =$data[0]['info'];

	$time=date('Y-m-d h:i:s',time());
	$name=$data[0]['name'];
	
	

	
	
	//$headicon_url="http://img.blog.csdn.net/20160714203223956";
	
	$connect=new mysqli($db_host,$db_user,$db_pass,$db_name);
	
	if($connect->connect_error){
		die("Connection failed: " . $connect->connect_error);
	}
		
	$connect->query('set names utf8');
	$sqlhead = "select * from `user` where username='$name'";
	$query = mysqli_query($connect, $sqlhead);
	$list = mysqli_fetch_array($query);
	if($name == $list['username'])
	{
		$headicon_url=$list['head_url'];
	}
	
	
		
			$connect->query('set names utf8');
			$sql ="insert into share(id,info,time,name,headicon_url)values(null,'$info','$time','$name','$headicon_url')";
			if($connect->query($sql)===true){
				echo "success";
				}
				else{
					echo "Error: " . $sql . "<br>" . $connect->error;  
				}

?> 