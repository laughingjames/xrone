<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/11/19
 * Time: 下午7:02
 */

require_once ('../Db.php');
require_once ('../response.php');
$con=Db::getInstance()->connect();
$topic_id=$_POST['topic_id'];
$data=array();
$content=$con->query("
select username,head_url,content,
title,create_at,tab,visit_count,top,good
  from topic,user where user.id=topic.authors_id and topic.id='$topic_id'");
if($content){
    while ($row=mysqli_fetch_array($content)){
        $data['content']=$row['content'];
        $data['title']=$row['title'];
        $data['create_at']=$row['create_at'];
        $data['content']=$row['content'];
        $data['top']=$row['top'];
        $data['good']=$row['good'];
        $data['tab']=$row['tab'];
        $data['visit_count']=$row['visit_count'];
        $author=array(
            'username'=>$row['username'],
            'head_url'=>$row['head_url']
        );
        $data['author']=$author;
    }

}
$commentsFind=$con->query("
select comment.content as content,
comment.is_uped as is_uped,
comment.uped_count as uped_count,
comment.create_at as create_at,
user.head_url as head_url,
user.username as username,
comment.reply_id as reply_id,
comment.id as id
from comment,user,topic 
WHERE comment.author_id=user.id 
AND topic.id=comment.topic_id 
AND topic.id='$topic_id'");

if($commentsFind){
    $n=0;

    while ($row=mysqli_fetch_array($commentsFind)){
        $comments[$n++]=array(
            'author_name'=>$row['username'],
            'author_head_url'=>$row['head_url'],
            'is_uped'=>$row['is_uped'],
            'uped_count'=>$row['uped_count'],
            'create_at'=>$row['create_at'],
            'content'=>$row['content'],
            'reply_id'=>$row['reply_id'],
            'id'=>$row['id']
        );
    }
    $data['comments']=$comments;
    if($data['comments']==null){
        $data['comments']=array();
    }



}
if($data){
    Response::show(200,"success",$data);
}
