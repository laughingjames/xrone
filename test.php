<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/3/17
 * Time: 下午3:50
 */
mysql_connect('localhost','root','JhFnZv9TmHhJ');
mysql_select_db('data');
mysql_query('set names utf8');


$find="SELECT * FROM English where sex='女' ";
//$sql ="insert into Look_English values(null,'$username','$number','$ip','$time')";
//mysql_query($sql);
$result = mysql_query($find);
while($row=mysql_fetch_array($result)){

echo '<img style="float:left" src="'.''.$row['Photo'].'"width="100px" height="120px">';


}
