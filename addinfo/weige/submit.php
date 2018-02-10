<?php
	
		$username=$_GET['cd-name'];
		$number=$_GET['cd-company'];
		$notes=$_GET['cd-textarea'];
		$time=date('Y-m-d H:i:s',time());
		$grade=$_GET['grade'];
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
		 else
		 $grade='其他班级';
		 
		mysql_connect('localhost','root','JhFnZv9TmHhJ');
		//mysql_connect('localhost','root','root');
		
		mysql_select_db('data');
		mysql_query('set names utf8');
		$sql ="insert into weigejiaoxue values(null,'$username','$number','$grade','$notes','$time')";
		mysql_query($sql);

$url = "http://www.xrone.cn";  
echo "<script type='text/javascript'>";  
echo "window.location.href='$url'";  
echo "</script>";  
?> 


