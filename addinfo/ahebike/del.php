<?php
		$id=$_GET['id'];
		mysql_connect('localhost','root','JhFnZv9TmHhJ') ;
		mysql_select_db('data');
		mysql_query('set names utf8');
		$sql="delete from ahebike where id=$id";
		if(mysql_query($sql)){
			header('location:ahe.php');}
		else{
			die(mysql_error());}
?>