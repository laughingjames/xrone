<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
<title>指南针科技咨询有限公司</title>
<link rel="stylesheet" type="text/css" href="../Assets/css/reset.css"/>
<script type="text/javascript" src="../Assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="../Assets/js/js_z.js"></script>
<script type="text/javascript" src="../Assets/js/banner.js"></script>
<link rel="stylesheet" type="text/css" href="../Assets/plugins/FlexSlider/flexslider.css">
<script src="../Assets/plugins/FlexSlider/jquery.flexslider.js"></script>
<link rel="stylesheet" type="text/css" href="../Assets/css/thems.css">
<link rel="stylesheet" type="text/css" href="../Assets/css/responsive.css">
<script language="javascript">
$(function(){
	$('#owl-demo').owlCarousel({
		items: 1,
		navigation: true,
		navigationText: ["上一个","下一个"],
		autoPlay: true,
		stopOnHover: true
	}).hover(function(){
		$('.owl-buttons').show();
	}, function(){
		$('.owl-buttons').hide();
	});
	
	$('.flexslider').flexslider({
		animation: "slide"
	});
});
</script>
</head>

<body>
<!--头部-->
<?php
include '../header.html';
?>
<!--幻灯片-->
<div id="banner" class="banner"> 
    <div id="owl-demo" class="owl-carousel"> 
        <a class="item" target="_blank" href="" style="background-image:url(../Assets/upload/banner.jpg)">
            <img src="../Assets/upload/banner.jpg" alt="">
        </a>
        <a class="item" target="_blank" href="" style="background-image:url(../Assets/upload/banner.jpg)">
            <img src="../Assets/upload/banner.jpg" alt="">
        </a>
        <a class="item" target="_blank" href="" style="background-image:url(../Assets/upload/banner.jpg)">
            <img src="../Assets/upload/banner.jpg" alt="">
        </a>
    </div>
</div>
<div class="slider">
    <div class="flexslider">
      <ul class="slides">
        <li>
            <a href=""><img src="../Assets/upload/banner_s.jpg" alt=""></a>
        </li>
        <li>
            <a href=""><img src="../Assets/upload/banner_s.jpg" alt=""></a>
        </li>
        <li>
            <a href=""><img src="../Assets/upload/banner_s.jpg" alt=""></a>
        </li>
      </ul>
    </div>
</div>
<!--幻灯片-->
<div class="pst_bg">
	<div class="pst">
    	您当前的位置：<a href="about.php">关于我们</a> > <a href="">公司文化</a>
    </div>
</div>
<div class="scd clearfix">
	<div class="scd_l">
    	<div class="l_name">
        	<img src="../Assets/images/n1.png" alt=""/>
            <em>&nbsp;</em>
       </div>
        <ul class="l_nav">
        	<li>
            	<a href="../About/about.php">
                	<em>&nbsp;</em>
                    <span>公司简介</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li>
            	<a href="../About/managementidea.php">
                	<em>&nbsp;</em>
                    <span>经营理念</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li  class="on">
            	<a href="../About/culture.php">
                	<em>&nbsp;</em>
                    <span>公司文化</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li>
            	<a href="../About/feature.php">
                	<em>&nbsp;</em>
                    <span>咨询特色</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li>
            	<a href="../About/contact.php">
                	<em>&nbsp;</em>
                    <span>联系我们</span>
                    <i>&nbsp;</i>
                </a>
            </li>
        </ul>
    </div>
    <div class="scd_r">
    	<div class="r_name"><span>公司文化</span></div>
        <div class="s_ctn clearfix">
        
            <p style="color:red; font-size:17px;text-indent:2em"> 分享：</p><p style="font-size:14px;text-indent:4em;">对客户分享先进思想与技术，对内部分享创意和成果</p>
            <p style="color:red; font-size:17px;text-indent:2em"> 诚信：</p><p style="font-size:14px;text-indent:4em;">对客户要诚实守信，对员工要坦诚信赖</p>
            <p style="color:red; font-size:17px;text-indent:2em"> 效率：</p><p style="font-size:14px;text-indent:4em;">为客户提高效率，对员工讲究效率</p>
            <p style="color:red; font-size:17px;text-indent:2em"> 创新：</p><p style="font-size:14px;text-indent:4em;">助客户实现创新，用创新开拓未来</p>
            
            <br>







</p>
            <br/>
            
            
        </div>
    </div>
</div>
<?php
include '../footer.html';
?>
</body>
</html>
