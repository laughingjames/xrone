<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" /> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>数据修改(管理员界面)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/demo.css">
	<style type="text/css">
		.form-horizontal{
		    background: #fff;
		    padding-bottom: 40px;
		    border-radius: 15px;
		    text-align: center;
		}
		.form-horizontal .heading{
		    display: block;
			color:red;
		    font-size: 35px;
		    font-weight: 700;
		    padding: 35px 0;
		    border-bottom: 1px solid #f0f0f0;
		    margin-bottom: 30px;
		}
		.form-horizontal .form-group{
		    padding: 0 40px;
		    margin: 0 0 25px 0;
		    position: relative;
		}
		.form-horizontal .form-control{
		    background: #f0f0f0;
		    border: none;
		    border-radius: 20px;
		    box-shadow: none;
		    padding: 0 20px 0 45px;
		    height: 40px;
		    transition: all 0.3s ease 0s;
		}
		.form-horizontal .form-control:focus{
		    background: #e0e0e0;
		    box-shadow: none;
		    outline: 0 none;
		}
		.form-horizontal .form-group i{
		    position: absolute;
		    top: 12px;
		    left: 60px;
		    font-size: 17px;
		    color: #c8c8c8;
		    transition : all 0.5s ease 0s;
		}
		.form-horizontal .form-control:focus + i{
		    color: #00b4ef;
		}
		.form-horizontal .fa-question-circle{
		    display: inline-block;
		    position: absolute;
		    top: 12px;
		    right: 60px;
		    font-size: 20px;
		    color: #808080;
		    transition: all 0.5s ease 0s;
		}
		.form-horizontal .fa-question-circle:hover{
		    color: #000;
		}
		.form-horizontal .main-checkbox{
		    float: left;
		    width: 20px;
		    height: 20px;
		    background: #11a3fc;
		    border-radius: 50%;
		    position: relative;
		    margin: 5px 0 0 5px;
		    border: 1px solid #11a3fc;
		}
		.form-horizontal .main-checkbox label{
		    width: 20px;
		    height: 20px;
		    position: absolute;
		    top: 0;
		    left: 0;
		    cursor: pointer;
		}
		.form-horizontal .main-checkbox label:after{
		    content: "";
		    width: 10px;
		    height: 5px;
		    position: absolute;
		    top: 5px;
		    left: 4px;
		    border: 3px solid #fff;
		    border-top: none;
		    border-right: none;
		    background: transparent;
		    opacity: 0;
		    -webkit-transform: rotate(-45deg);
		    transform: rotate(-45deg);
		}
		.form-horizontal .main-checkbox input[type=checkbox]{
		    visibility: hidden;
		}
		.form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{
		    opacity: 1;
		}
		.form-horizontal .text{
		    float: left;
		    margin-left: 7px;
		    line-height: 20px;
		    padding-top: 5px;
		    text-transform: capitalize;
		}
		.form-horizontal .btn{
		   
		    font-size: 14px;
		    color: #fff;
		    background: #00b4ef;
		    border-radius: 30px;
		    padding: 10px 90px;
		    border: none;
		
		    text-transform: capitalize;
		    transition: all 0.5s ease 0s;
		}
		.form-horizontal .reset{
		   
		    font-size: 14px;
		    color: red;
		    background: #00b4ef;
		    border-radius: 30px;
		    padding: 10px 90px;
		    border: none;
		    text-transform: capitalize;
			
		    transition: all 0.5s ease 0s;
		}
		@media only screen and (max-width: 479px){
		    .form-horizontal .form-group{
		        padding: 0 25px;
		    }
		    .form-horizontal .form-group i{
		        left: 45px;
		    }
		    .form-horizontal .btn{
		        padding: 10px 80px;
		    }
			.form-horizontal .reset{
		        padding: 10px 80px;
		    }
		}
	</style>
	<!--[if IE]>
		<script src="http://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
<script type="text/javascript">

function check(){
		
		var username=document.getElementById('username');
		if(document.getElementById('username').value=='')
		{
		alert('姓名不能为空!');
		username.focus(); 
		return false;
		
		}
		var birthday=document.getElementById('phonenum');
		if(document.getElementById('phonenum').value==''||birthday.value.length!=11)
		{
			alert(' 手机号不正确！！');
			birthday .focus(); 
			return false;
		}
		
		var password=document.getElementById('sno');
		if(password.value==''||password.value.length!=11)
		{
			
			if(password.value=='0')
			{
			return ture;
			}
			alert('你确定是你的学号？如果没有学号请输入一个0');
			password.select(); 
			return false;
		}
		var email=document.getElementById('bikenum');
		if(document.getElementById('email').value=='')
		{
			alert(' 车号不能为空！');
			email.focus(); 
			return false;
		}
		
		
		

}
function Submit(){
		
		alert("数据修改成功！\n");
		
}

</script>
</head>
<body>
<?php
$id=$_GET['id'];//获取修改商品的编号
mysql_connect('localhost','root','JhFnZv9TmHhJ');
mysql_select_db('data');
mysql_query('set names utf8');
	if(isset($_POST['btn']))//数据修改
	{
		$username=$_POST['username'];
		$phonenum=$_POST['phonenum'];
		$sno=$_POST['sno'];
		$bikenum=$_POST['bikenum'];
		$notes=$_POST['notes'];
		$time=date('Y-m-d H:i:s',time());
		//拼接sql语句
		$sql="update ahebike set username='$username',sno='$sno',bikenum='$bikenum',phonenum='$phonenum',notes='$notes',time='$time' where id=$id"; 
		mysql_query($sql);
	}
//取出id对应的数据
$sql="select * from ahebike where id=$id";
$rs=mysql_query($sql);
$rows=mysql_fetch_assoc($rs);
?> 
<p>
  <?php
	
?>	
</p>
<p>&nbsp;</p>
    <div class="demo" style="padding: 20px 0;">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					
                <form id="form1" class="form-horizontal" name="form1" method="post" action="" onSubmit="return check()"> 
						<span class="heading">保管车数据修改(管理员)</span>
					
                    
                 <div class="form-group"><input type="text" class="form-control" name="username" id="username" placeholder="姓名" value="<?php echo  $rows['username'] ?>"><i class="fa fa-user"></i> </div>
                 <div class="form-group"><input type="text" class="form-control" name="phonenum" id="phonenum" placeholder="手机号码" value="<?php echo  $rows['phonenum'] ?>"><i class="fa fa-user"></i> </div>
				 <div class="form-group"> <input type="text" class="form-control" name="sno" id="sno" placeholder="学号(没有学号请输入一个0)" value="<?php echo  $rows['sno'] ?>"><i class="fa fa-user"></i> </div>
                 <div class="form-group"> <input type="text" class="form-control" name="bikenum" id="bikenum" placeholder="车号" value="<?php echo  $rows['bikenum'] ?>"> <i class="fa fa-user"></i> </div>
				 <div class="form-group"> <input type="text" class="form-control" name="notes" id="notes" placeholder="备注说明(填写押金等)" value="<?php echo  $rows['notes'] ?>"><i class="fa fa-user"></i> </div> 	
                 <p>&nbsp; </p>					                 
                 <p><input type="submit" class="btn" id="btn" name="btn" value="修改"/></p>
				<p><input type="reset" class="reset" id="reset" name="reset" value="重置"/></p>	    
					  
		        </form>
  <?php
      if(isset($_POST['btn']))
{
echo "<script language='javascript'>Submit();</script>";
	
$url="http://www.xrone.cn/ahebike/query.php";
echo "<script language='javascript'>";  
echo "window.location.href='$url'";  
echo "</script>";  
	
}
	
?>	              
		
  	
		     </div>
		</div>
	</div>
</div>
   
   
	<div style="text-align:center;"><p>来源:<a href="http://www.xrone.cn/" target="_blank">温州大学数信学院0+1工作室</a></p></div>
  
</body>
</html>