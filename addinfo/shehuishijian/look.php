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
</style>

</head>

<body>
<?php
		
		if(mysql_connect('localhost','root','JhFnZv9TmHhJ') )
		//if(mysql_connect('localhost','root','root') )
		echo '<p style=="" 链接成功<br>';
		else
		echo '链接失败<br>';
		
		mysql_select_db('addinfo');
		mysql_query('set names utf8');
		$rs=mysql_query('select *from shehuishijian')

?>
<table style="text-align:center" class="altrowstable" id="alternatecolor" width="100%" border="1" cellpadding="2" cellspacing="0">
<tr> 
	<th>序号</th><th>姓名</th><th>学院班级</th><th>联系方式</th><th>性别</th><th>是否有单反</th><th>特长</th><th>时间</th>
 <?php
 $count=0;
 while($rows=mysql_fetch_assoc($rs))
 {
	 echo '<tr>';
	 echo '<td>'.++$count.'</td>';
	 echo '<td>'.$rows['name'].'</td>';
	 echo '<td>'.$rows['grade'].'</td>';
	 echo '<td>'.$rows['tel'].'</td>';
	 echo '<td>'.$rows['sex'].'</td>';
	  echo '<td>'.$rows['danfan'].'</td>';
	 echo '<td>'.$rows['interest'].'</td>';
	 echo '<td>'.$rows['time'].'</td>';
	 echo '</tr>';
	 }
 ?>
</tr>
</table>
</body>
</html>









