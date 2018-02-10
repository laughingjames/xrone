<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/11/26
 * Time: 上午9:22
 */
require_once ('Db.php');
require_once ('response.php');
require_once ('user.php');
$con=Db::getInstance()->connect();


$id=$_POST['user_id'];
$username=$_POST['username'];

$sex=strcmp($_POST['sex'],"男")?1:0;

$user=new user($id,$username,$sex,null,null);

$filepath=$user->getId().".png";

$user->setHeadUrl($filepath);



$sql="UPDATE user SET username='$username',head_url='$filepath',sex='$sex' WHERE id='$id'";


$callBackdata=array(
    'filepath'=>$filepath,
    'username'=>$user->getUsername(),
    'sex'=>$user->getSex(),
    'head_url'=>$user->getHeadUrl(),
    'sql'=>$sql
);

chmod($file , 0644);
if(isset($_POST['headimage'])){
    $file=fopen("image/user/".$filepath,'w');
    $data=base64_decode($_POST['headimage']);
    if(fwrite($file,$data)=== FALSE){
        Response::show(204,"fail",$callBackdata);
    }else{
        if($con->query($sql)){
            Response::show(200,"successWithHeadimage",$callBackdata);
        }else{
            Response::show(202,"fail",$callBackdata);
        }
    }
}else{
    if($con->query($sql)){
        Response::show(200,"successWithOutHeadimage",$callBackdata);
    }else{
        Response::show(202,"fail",$callBackdata);
    }
}


?>