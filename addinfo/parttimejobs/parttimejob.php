<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" /> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>兼职信息录入</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/xrone/css/demo.css">
	<style type="text/css">
		.form-horizontal{
		    background: #fff;
		    padding-bottom: 40px;
		    border-radius: 15px;
		    text-align: center;
		}
		.form-horizontal .heading{
		    display: block;
			color:#02BCF1;
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
		    padding: 10px 25px;
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
		        padding: 10px 20px;
		    }
		}
	</style>
	<!--[if IE]>
		<script src="http://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
<script type="text/javascript">


function Submit(){
		alert("数据记录成功！\n");
}

</script>
</head>
<body>
<?php


	if(isset($_POST['btn']))
	{

	    $name=$_POST['job_name'];
        $detail=$_POST['detail'];
        $salary=$_POST['salary'];
        $address=$_POST['address'];
        $need_counts=$_POST['need_counts'];
        $date=$_POST['date'];
        $notes=$_POST['notes'];

		mysql_connect('localhost','root','JhFnZv9TmHhJ');
		if(mysql_connect('localhost','root','JhFnZv9TmHhJ') )
		    echo '链接成功<br>';
		else
		    echo '链接失败<br>';
		
		mysql_select_db('hellohelper');
		mysql_query('set names utf8');
		$sql ="insert into wechat_parttime_job values(null,'$name','$detail','$salary','$address','$need_counts',0,'$date','$notes',null,0)";
		if(mysql_query($sql))
		echo '写入成功！';
		else
		echo '写入error! 请检查数据类型';
		
	}
?>	

	<div class="demo" style="padding: 20px 0;">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					
                <form id="form1" class="form-horizontal" name="form1" method="post" action="" onSubmit="return check()"> 
						<span class="heading">PARTTIME JOBS</span>
                    
                 <div class="form-group">
                     <input type="text" class="form-control" name="job_name" id="job_name" placeholder="工作名称">
                     <i class="fa fa-user"></i> </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="detail" id="detail" placeholder="详细说明">
                    <i class="fa fa-user"></i> </div>
                 <div class="form-group">
                     <input type="text" class="form-control" name="salary" id="salary" placeholder="工资：150/day">
                     <i class="fa fa-user"></i> </div>
				 <div class="form-group">
                     <input type="emai" class="form-control" name="address" id="address" placeholder="地点：">
                     <i class="fa fa-user"></i> </div>
                 <div class="form-group">
                     <input type="text" class="form-control" name="need_counts" id="need_counts" placeholder="需要人数">
                     <i class="fa fa-user"></i> </div>
                 <div class="form-group">
                     <input type="text" class="form-control" name="date" id="date" placeholder="时间">
                     <i class="fa fa-user"></i> </div>
                 <div class="form-group">
                     <input type="text" class="form-control" name="notes" id="notes" placeholder="备注">
                  <i class="fa fa-user"></i> </div>
                 <p><input type="submit" class="btn" id="btn" name="btn" value="提交"/></p>
					    <p>&nbsp; </p>
					  
		        </form>
                
 <?php
      if(isset($_POST['btn']))
{
echo "<script language='javascript'>Submit();</script>";
		
$url="http://www.xrone.cn/addinfo/thank.html";  
echo "<script language='javascript'>";  
echo "window.location.href='$url'";  
echo "</script>";  
	
}
	
?>			
  	
		     </div>
		</div>
	</div>
</div>
   
   
	<div style="text-align:center;"><p>来源:<a href="http://www.xrone.cn/" target="_blank">0+1工作室</a></p></div>
  
</body>
</html>