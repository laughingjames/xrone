<?php
	
		$username=$_GET['cd-name'];
		$number=$_GET['cd-company'];
		$notes=$_GET['cd-textarea'];
		$time=date('Y-m-d H:i:s',time());
		$ip = $_SERVER["REMOTE_ADDR"];
	
		mysql_connect('localhost','root','JhFnZv9TmHhJ');
		mysql_connect('localhost','root','root');
	
		mysql_select_db('data');
		
		mysql_query('set names utf8');
		$sql ="insert into recruit values(null,'$username','$number','$notes','$time','$ip')";
		mysql_query($sql);
		
$url = "http://mp.weixin.qq.com/s/DW6qesO8qeNj5qZe6ERdCg";  
echo "<script type='text/javascript'>";  
echo "window.location.href='$url'";  
echo "</script>";  

?> 
	
