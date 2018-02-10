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




$content=$_POST['content'];
$author_id=$_POST['author_id'];
$topic_id=$_POST['topic_id'];
$reply_id=$_POST['reply_id'];


$con->query("insert into comment 
values(null,'$author_id','$topic_id','$content',0,0,'$reply_id',null)");

$data=array(
    'content='=>$content,
    'author_id'=>$topic_id,
    'topic_id'=>$author_id,
    'reply_id'=>$reply_id
);
Response::show(200,"success",$data);