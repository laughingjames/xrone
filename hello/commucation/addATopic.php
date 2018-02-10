<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/11/22
 * Time: 上午11:07
 */
require_once ('../Db.php');
require_once ('../response.php');
$con=Db::getInstance()->connect();
$topic_id=$_POST['topic_id'];
$data=array();

$title=$_POST['title'];
$content=$_POST['content'];
$author_id=$_POST['author_id'];
$tab=$_POST['tab'];

$con->query("insert into topic 
values(null,'$author_id','$tab','$content','$title',null,0,0,0,null)");
