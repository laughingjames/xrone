

<?php
/**
 * getCultureAtricle获取文化文章内容
 */
	$connect = mysql_connect("localhost","root","JhFnZv9TmHhJ");
	mysql_query("SET NAMES 'UTF8'");
	mysql_query("SET CHARACTER SET utf8");

	if(!$connect){
		die(mysql_error());
	}
	mysql_select_db("hello",$connect);
?>
<?php
/*
*获得json数据--返回值：title desc time content_url pic_url
*/
	
	$result = mysql_query("select * from applicationInformation order by id desc");
	$n=0;
	while($row=mysql_fetch_array($result)){
		$arr[$n++]=array("id"=>$row['id'],
						 "title"=>$row['title'],
						 "from"=>$row['from'],
						 "pic_url"=>$row['pic_url'],
						 "content_url"=>$row['content_url']);
		}
		//数组转换为json字符串
	echo json_encode($arr);
		
		
?>


