<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/12/1
 * Time: 下午7:52
 */
require_once ('../Db.php');
require_once ('../response.php');


$con=Db::getInstance()->connect();


$username=$_POST['loginName'];
//$username='julis';
$data=array();

$recent_replyiesRows=$con->query("
SELECT topic.id as id,tab,authors_id,content,title,topic.last_reply_at,username,head_url
FROM topic 
INNER JOIN user 
ON user.id=topic.authors_id 
WHERE  topic.id in(
  SELECT topic_id FROM comment 
  WHERE comment.author_id in (
    SELECT id FROM user 
    WHERE user.username='$username') 
        GROUP BY topic_id) ");

if($recent_replyiesRows){
    $data['recent_replyies']=array();
    while ($row=mysqli_fetch_array($recent_replyiesRows)){
        $data['recent_replyies'][]=$row;
    }
}

$recent_topicsRows=$con->query("SELECT id,tab,title,create_at,topic.content FROM topic
WHERE topic.authors_id in (SELECT id FROM user
WHERE user.username='$username') ");
if($recent_topicsRows){
    while ($row=mysqli_fetch_array($recent_topicsRows)){
        $data['recent_topics'][]=$row;
    }
}


if($data){
    Response::show(200,"success",$data);
}
