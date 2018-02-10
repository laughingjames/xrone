<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>数据查询</title>
<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}

window.onload=function(){
	altRows('alternatecolor');
}
function jump(id)
{
	if(confirm('你确定要删除么？'))
	{
		location.href='del.php?id='+id;
	}
}
</script>


<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
@-webkit-keyframes greenPulse {
  from { background-color: #749a02; -webkit-box-shadow: 0 0 9px #333; }
  50% { background-color: #91bd09; -webkit-box-shadow: 0 0 18px #91bd09; }
  to { background-color: #749a02; -webkit-box-shadow: 0 0 9px #333; }
}
.btn {
  -webkit-animation-name: greenPulse;
  -webkit-animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
}
@-webkit-keyframes redPulse {
  from { background-color: #749a02; -webkit-box-shadow: 0 0 9px #333; }
  50% { background-color: #91bd09; -webkit-box-shadow: 0 0 18px #91bd09; }
  to { background-color: #749a02; -webkit-box-shadow: 0 0 9px #333; }
}
.alter {
  -webkit-animation-name: redPulse;
  -webkit-animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
}
</style>

</head>

<body>
<?php
		
		if(mysql_connect('localhost','root','JhFnZv9TmHhJ') )
		echo '<p style=="" 链接成功<br>';
		else
		echo '链接失败<br>';

        mysql_select_db('hellohelper');
		mysql_query('set names utf8');
		$rs=mysql_query('select name,country,phone_no,passport_no,a.time time,job_name  from wechat_parttime_job p,wechat_apply_job a WHERE a.job_id = p.id order by time desc');

?>
<h1 align="center">工作申请表</h1>
<table class="altrowstable" id="alternatecolor" width="100%" border="1" cellpadding="2" cellspacing="0">
<tr> 
	<th>序号</th><th>姓名</th><th>手机号</th><th>国家</th><th>护照号</th><th>工作名</th><th>时间</th><th>删除</th><th>修改</th>
 <?php
  $i=1;
 while($rows=mysql_fetch_assoc($rs))
 {


     echo '<tr>';
	 echo '<td>'.$i++.'</td>';
	 echo '<td>'.$rows['name'].'</td>';
	 echo '<td>'.$rows['phone_no'].'</td>';
	 echo '<td>'.$rows['country'].'</td>';
	 echo '<td>'.$rows['passport_no'].'</td>';
	 echo '<td>'.$rows['job_name'].'</td>';
	 echo '<td>'.$rows['time'].'</td>';

	 echo '<td><input type="button" class="btn" value="删除" onclick="jump('.$rows['id'].')"></td>';
	 echo '<td><input type="button" class="alter" value="修改" onclick="location.href=\'alter.php?id='.$rows['id'].'\'"></td>';
	 echo '</tr>';
	 }
 ?>
</tr>
</table>
</body>
</html>









