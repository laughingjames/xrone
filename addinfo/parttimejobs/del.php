<?php
		$id=$_GET['id'];
		mysql_connect('localhost','root','JhFnZv9TmHhJ') ;
		mysql_select_db('hellohelper');
		mysql_query('set names utf8');
		$sql="delete from wechat_parttime_job where id=$id";
		if(mysql_query($sql)){
			header('location:query.php');}
		else{
			die(mysql_error());}
?>