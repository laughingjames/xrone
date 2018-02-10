<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/1/10
 * Time: 下午8:57
 */

    $title=$_POST['title'];
    $detail=$_POST['detail'];
    $price=$_POST['price'];
    $pic_url=$_POST['pic_url'];

    mysql_connect('localhost','root','JhFnZv9TmHhJ');
    if(mysql_connect('localhost','root','JhFnZv9TmHhJ') )
        echo '链接成功<br>';
    else
        echo '链接失败<br>';

    mysql_select_db('hellohelper');
    mysql_query('set names utf8');
    $sql ="insert into wechat_house_renting values(null,'$title','$detail','$pic_url','$price',0,null)";
    echo $sql;
    if(mysql_query($sql)){
        echoURL();
        echo '写入成功！';
    }else{
        echoURL();
        echo '写入error! 请检查数据类型';
    }



function echoURL(){
    if(isset($_POST['btn'])) {
        echo "<script language='javascript'>Submit();</script>";
        $url="http://www.xrone.cn/addinfo/thank.html";
        echo "<script language='javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
}