<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/11/18
 * Time: 下午1:31
 */
require_once ('File.php');
$data=array(
  'id'=>1,
  'name'=>'nova',
  'type'=>array(1,4,3),
    'test'=>array(153,a=>array(15,3,5))
);
$file=new File();
if($file->cacheData('index_cache',$data)){

    echo 'success';
}else{
    echo 'fail';
}