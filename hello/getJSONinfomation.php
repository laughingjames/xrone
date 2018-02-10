
<?php
require_once('con.php');
/*
*获得json数据--返回值：title desc time content_url pic_url
*/
	$result = $connect->query("select * from share order by id desc");
	$n=0;
	while($row=mysqli_fetch_array($result)){
		$arr[$n++]=array("id"=>$row['id'],
						 "info"=>$row['info'],
						 "name"=>$row['name'],
						 "time"=>$row['time'],
						 "head_url"=>$row['headicon_url']);
		}
		//数组转换为json字符串
	echo json_encode($arr);
?>


