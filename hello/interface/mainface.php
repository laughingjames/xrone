<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/11/19
 * Time: 上午10:35
 */
require_once ('../response.php');
require_once ('../Db.php');
$page=isset($_GET['page'])?$_GET['pagesize']:1;
$pageSize=isset($_GET['pagesize'])?$_GET['pagesize']:10;
if (!is_numeric($page)||!is_numeric($pageSize)){
    return Response::show(401,"数据不合法");
}

$offset=($page-1)*$pageSize;
$sql="select *from express limit ".$offset.",".$pageSize;

try{
    $con=Db::getInstance()->connect();
}catch (Exception $e){
    Response::show(403,"数据库链接失败",$data);
}


$rows=$con->query($sql);
$data=array();
if($rows){
    while ($row=mysqli_fetch_array($rows)){
        $data[]=$row;
    }
}
if($data){
    Response::show(200,"success",$data);
}else{
    Response::show(400,"fail",$data);
}


