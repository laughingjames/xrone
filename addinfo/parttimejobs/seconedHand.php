<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" /> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>二手信息录入</title>
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
		    padding: 20px 0px;
		    border-bottom: 1px solid #f0f0f0;
		    margin-bottom: 0px;
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




</script>
</head>
<body>
<?php

	if(isset($_POST['btn']))
	{

	    $title=$_POST['title'];
        $detail=$_POST['detail'];
        $price=$_POST['price'];
        $wechat=$_POST['wechat'];

        $pic_url="default.jpg";
            if ($_FILES["file"]["error"] > 0)
            {
                echo "错误：: " . $_FILES["file"]["error"] . "<br>";
            }
            else
            {
                $pic_url=md5($_FILES["file"]["name"]+rand()).".jpg";
//                echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
//                echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
//                echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//                echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";

                // 判断当期目录下的 upload 目录是否存在该文件
                // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
                if (file_exists("seconed_hand/" . $pic_url)) {
                  //  echo $_FILES["file"]["name"] . " 文件已经存在。 ";

                }
                else {
                    // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                    move_uploaded_file($_FILES["file"]["tmp_name"], "seconed_hand/" .$pic_url);
                 //   echo "文件存储在: " . "seconed_hand/" .  $pic_url;
                }
            }



        mysql_connect('localhost','root','JhFnZv9TmHhJ');
		if(mysql_connect('localhost','root','JhFnZv9TmHhJ') )
		    echo '链接成功<br>';
		else
		    echo '链接失败<br>';
		
		mysql_select_db('hellohelper');
		mysql_query('set names utf8');
		$sql ="insert into wechat_seconed_hand values(null,'$title','$wechat','$pic_url','$price',null,'$detail')";
       // echo $sql;
		if(mysql_query($sql)){
            echoURL();
            echo '写入成功！';
        }else{
           echoURL();
            echo '写入error! 请检查数据类型';
        }


	}
	function echoURL(){
        if(isset($_POST['btn']))
        {
            echo "<script language='javascript'>Submit();</script>";
            $url="http://www.xrone.cn/addinfo/thank.html";
            echo "<script language='javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        }
    }
?>	

	<div class="demo" style="padding: 20px 0;">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					
                <form id="form1" class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data" onSubmit="return check()">
						<span class="heading">二手信息录入</span>
                    <h6 style="color: deepskyblue;text-align: center;">会英文的同学尽量用英文描述，尽量上传图片(请点击最后一栏"选择文件")</h6>
                    <br>
                 <div class="form-group">
                     <input type="text" class="form-control" name="title" id="title" placeholder="物品名字">
                     <i class="fa fa-user"></i> </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="price" id="price" placeholder="价格">
                        <i class="fa fa-user"></i> </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="wechat" id="wechat" placeholder="微信号">
                    <i class="fa fa-user"></i> </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="detail" id="detail" placeholder="描述">
                        <i class="fa fa-user"></i> </div>

                  <div class="form-group">



                      <input type="file" accept="image/gif,image/jpeg,image/jpg,image/png,image/svg" class="form-control" name="file" id="file" >
                      <i class="fa fa-user"></i> </div>
                 <p> <input type="submit" class="btn" id="btn" name="btn" value="提交"/></p>
					    <p>&nbsp; </p>
					  
		        </form>
                
 <?php


?>
  	
		     </div>
		</div>
	</div>
</div>
   
   
	<div style="text-align:center;"><p>来源:<a href="http://www.xrone.cn/" target="_blank">0+1工作室</a></p></div>
  
</body>
</html>