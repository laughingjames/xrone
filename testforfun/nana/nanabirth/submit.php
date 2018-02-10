<?php
		
		$things=$_GET['things'];
		mysql_connect('localhost','root','root');
		if(mysql_connect('localhost','root','root') )
		echo '链接成功<br>';
		else
		echo '链接失败<br>';
		
		mysql_select_db('chat');
		mysql_query('set names utf8');
		$sql ="insert into forwu values(null,'$things')";
		mysql_query($sql);
		
?>
