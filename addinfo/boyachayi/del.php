<?php
        $id=$_GET['id'];
        require_once ($_SERVER['DOCUMENT_ROOT'].'/hello/con.php');
        $connect->select_db('addinfo');


		$sql="delete from boyachayi where id=$id";


        if($connect->query($sql)){
			header('location:look.php');}
		else{
			die(mysql_error());}
?>