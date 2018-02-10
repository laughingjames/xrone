<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/11/19
 * Time: 下午4:02
 */

require_once ('Db.php');
require_once ('response.php');
$con=Db::getInstance()->connect();
header("Content-type:text/html;charset=utf-8");
$page=0;

empty($_POST['page'])?$pageCount=5:$pageCount=3;
$offset=$page*$pageCount;
$rows=$con->query("
select t.id as id,authors_id,
ifnull(c.counts,0) as reply_count,
tab,content,title,last_reply_at,visit_count,
good,top,create_at,u.username,u.head_url
 from user u,topic t 
  left join 
      (select id ,topic_id,count(*) as counts
        from comment 
             group by t.id) c on c.topic_id = t.id 
             WHERE u.id=t.authors_id group by t.id;");



//$rows=$con->query("select
//topic.id as id,
// authors_id,tab,content,title,
// last_reply_at,good,top,
// reply_count,visit_count,
// create_at,username,head_url
//                 from topic,user WHERE
//                      user.id=topic.authors_id
//                      order by topic.id DESC
//                      limit $offset,$pageCount");

$data=array();

if($rows){
    while ($row=mysqli_fetch_array($rows)){
        $data[]=$row;
    }
}
if($data){
    Response::show(200,"success",$data);
}else{
    Response::show(202,"Empty",$data);
}
