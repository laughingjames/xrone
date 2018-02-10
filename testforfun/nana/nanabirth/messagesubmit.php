<?php
		
		$things=$_POST['message'];
		$name=$_POST['name'];
		echo $name;
		echo $name;
		$time=date('Y年m月d日 H:i:s',time());
		if(mysql_connect('localhost','root','JhFnZv9TmHhJ') )
		echo '链接成功<br>';
		else
		echo '链接失败<br>';
		
		mysql_select_db('nanabirth');
		mysql_query('set names utf8');
		$sql ="insert into message values(null,'$time','$things','$name')";
		mysql_query($sql);
		
?>