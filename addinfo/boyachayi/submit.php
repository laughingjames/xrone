<?php

		require_once ($_SERVER['DOCUMENT_ROOT'].'/hello/con.php');
		$username=$_GET['cd-name'];
		$number=$_GET['cd-company'];
		$notes=$_GET['cd-textarea'];
		$grade=$_GET['grade'];
		$major=$_GET['major'];
		$time=date('Y-m-d H:i:s',time());
		$ip = $_SERVER["REMOTE_ADDR"];
		$connect->select_db('addinfo');

		$sql ="insert into boyachayi values(null,'$username','$grade','$number','$notes','$time','$ip','$major')";
		echo $sql;
		$connect->query($sql);

		

		$url = "http://www.xrone.cn/addinfo/thank.html";
		echo "<script type='text/javascript'>";
		echo "window.location.href='$url'";
		echo "</script>";
?> 
	
