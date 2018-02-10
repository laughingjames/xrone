<?php
	
		$username=$_GET['cd-name'];
		$number=$_GET['cd-company'];
		$notes=$_GET['cd-textarea'];
		$grade=$_GET['grade'];
		$time=date('Y-m-d H:i:s',time());
		$ip = $_SERVER["REMOTE_ADDR"];
		if($grade==0)
		 $grade='16本一';
		else if($grade==1)
		 $grade='16本二';
		else if($grade==2)
		 $grade='16统计';
		else if($grade==3)
		 $grade='16信算';
		else if($grade==4)
		 $grade='15本一';
		 else if($grade==5)
		 $grade='15本二';
		else if($grade==6)
		 $grade='15统计';
		else if($grade==7)
		 $grade='15信算';
		else if($grade==8)
		 $grade='14本一';
		else if($grade==9)
		 $grade='14本二';
		else if($grade==10)
		 $grade='14统计';
		else if($grade==11)
		 $grade='14信算';
		else if($grade==12)
		 $grade='13本一';
		 else if($grade==13)
		 $grade='13本二';
		else if($grade==14)
		 $grade='13统计';
		else if($grade==15)
		 $grade='13信算';
		 else
		 $grade='其他班级';
		
		mysql_connect('localhost','root','JhFnZv9TmHhJ');
		//mysql_connect('localhost','root','root');
	
		mysql_select_db('data');
		
		mysql_query('set names utf8');
		$sql ="insert into weixianghui values(null,'$username','$grade','$number','$notes','$time','$ip')";
		mysql_query($sql);
		

$url = "http://mp.weixin.qq.com/s/DW6qesO8qeNj5qZe6ERdCg";  
echo "<script type='text/javascript'>";  
echo "window.location.href='$url'";  
echo "</script>";  
?> 
	
