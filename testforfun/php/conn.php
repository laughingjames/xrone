<?php
	mysql_connect("localhost","root","root") or die("fail");
	mysql_select_db("chat") or die("错误");
//	mysql_set_charset("utf8");
	mysql_query("set name 'utf8'")
	
?>