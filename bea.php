<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" /> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>考号查询</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../addinfo/css/demo.css">
	<style type="text/css">
.table-horizontal {
	background: #fff;
	border-radius: 20px;
	text-align: center;
	color: #02BCF1;
	font-size: 35px;
	font-weight: 70;
	padding: 45px 30px;
	border-bottom: 1px solid #f0f0f0;
	margin-bottom: 2px;
}
.form-horizontal {
	background: #fff;
	padding-bottom: 40px;
	border-radius: 15px;
	text-align: center;
}
.headpicture{ border-radius:15px;}

.form-horizontal .heading {
	display: block;
	color: #02BCF1;
	font-size: 35px;
	font-weight: 700;
	padding: 35px 0;
	border-bottom: 1px solid #f0f0f0;
	margin-bottom: 30px;
}


.form-horizontal .form-group {
	padding: 0 40px;
	margin: 0 0 25px 0;
	position: relative;
}

.form-horizontal .form-group i {
	position: absolute;
	top: 12px;
	left: 60px;
	font-size: 17px;
	color: #c8c8c8;
	transition: all 0.5s ease 0s;
}

.form-horizontal .form-control {
	background: #f0f0f0;
	border: none;
	border-radius: 20px;
	box-shadow: none;
	padding: 0 20px 0 45px;
	height: 40px;
	transition: all 0.3s ease 0s;
}

.form-horizontal .form-control:focus {
	background: #e0e0e0;
	box-shadow: none;
	outline: 0 none;
}
	</style>
	<!--[if IE]>
		<script src="http://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
<script type="text/javascript">

function check(){
		
		var username=document.getElementById('username');
		var number=document.getElementById('password');
		if(username.value==''||number.value=='')
		{
		alert('姓名或者学号不能为空!');
		username.focus(); 
		return false;
		
		}
		

}
function btn1(){
   	 document.getElementById('row').style.display='block'; 
	}
</script>
</head>
<body>

<?php
	function warning($flag)
	{
		if($flag==0)
			echo "<script>alert('未找到你所输入的信息".$username.''.$number."，请检查并重新输入！\\n如果你是温大或温医的学生\\n未能查到你要的数据，请联系\\n管理员：\\nQQ:1607637473 帮你手动查询\\n')</script>";
		else
		{
			btn1();
		}
			
	}
	function ConnectAndSelct()
{
		
		$username=$_POST['username'];
		$number=$_POST['password'];
		$time=date('Y-m-d H:i:s',time());
		$ip = $_SERVER["REMOTE_ADDR"];
		$flag=0;
		mysql_connect('localhost','root','JhFnZv9TmHhJ');
		mysql_select_db('data');
		mysql_query('set names utf8');
		
		
		$find="SELECT * FROM English where sex='女' and name_school='温州医科大学(茶山校区)'";
		//$sql ="insert into Look_English values(null,'$username','$number','$ip','$time')";
		//mysql_query($sql);
		$result = mysql_query($find);



		return $result;
}
	
	function OutPut()
{
		$result=ConnectAndSelct();
		$flag=0;
		while($row=mysql_fetch_array($result))
  		{
			$flag=1;
		
		?>
        <html>
 <head></head>
 <body>
<?php echo '<img   style="float:left" src="'.''.$row['Photo'].'"width="50px" height="60px"/>'?>


 </body>


</html>
<p></p> 
     </table>                 
<?php
	
		}
		warning($flag);
		
	}
	
	
	if(isset($_POST['namebtn']))
	{
		OutPut();
		
  	}
		

  
?>	

<html>
 <head></head>
 <body>
 
  <div class="demo" style="padding: 20px 0;">
   <div class="container">
    <div class="row">
     <div class="col-md-offset-3 col-md-6">
      <form id="form1" class="form-horizontal" name="form1" method="post" action="" onsubmit="return check()">
       <span class="heading">数据查询</span>
       <div class="form-group">
        <input type="text" class="form-control" name="username" id="username" placeholder="姓名" />
        <i class="fa fa-user"></i>
       </div>
       <div class="form-group">
        <input type="text" class="form-control" name="password" id="password" placeholder="学号" />
        <i class="fa fa-user"></i>
       </div>
       <input type="submit" class="btn" id="btn" name="namebtn" value="查找" />
      </form>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
                
 <?php
      if(isset($_POST['namebtn']))
{
	

//echo "<script language='javascript'>Submit();/script>";
		
//$url="http://www.xrone.cn/addinfo/thank.html";  
//echo "<script language='javascript'>";  
//echo "window.location.href='$url'";  
echo "</script>";  
	
}
	
?>			
  	
		     </div>
		</div>
	</div>
</div>
   
   
	<div style="text-align:center;"><p>来自:<a href="http://www.xrone.cn/" target="_blank">温州大学0+1工作室</a></p></div>
    <br/>
    <br/>
    
    <br/>
    <br/>
  
</body>
</html>