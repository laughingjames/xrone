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

<!--头部-->
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
    	您当前的位置：<a href="Customer.php">客户见证</a> > <a href="">客户展示</a>
    </div>
</div>
<div class="scd clearfix">
	<div class="scd_l">
    	<div class="l_name">
        	<img src="../Assets/images/n3.png" alt=""/>
            <em>&nbsp;</em>
        </div>
        <ul class="l_nav">
        	<li class="on">
            	<a href="../Customer/Customer.php">
                	<em>&nbsp;</em>
                    <span>客户展示</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li>
            	<a href="../Customer/example.php">
                	<em>&nbsp;</em>
                    <span>经典案例</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li>
            	<a href="../Customer/comment.php">
                	<em>&nbsp;</em>
                    <span>客户评价</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            
        </ul>
    </div>
    <div class="scd_r">
    	<div class="r_name"><span>客户展示</span></div>
        <div class="s_ctn clearfix">
             <ul class="case clearfix">
        	<li>
            	<a href="">
                	<img src="../Assets/upload/pic6.jpg" alt=""/>
                    <p>农产品进口</p>
                </a>
            </li>
            <li>
            	<a href="">
                	<img src="../Assets/upload/pic6.jpg" alt=""/>
                    <p>农产品进口</p>
                </a>
            </li>
            <li>
            	<a href="">
                	<img src="../Assets/upload/pic6.jpg" alt=""/>
                    <p>农产品进口</p>
                </a>
            </li>
            <li>
            	<a href="">
                	<img src="../Assets/upload/pic6.jpg" alt=""/>
                    <p>农产品进口</p>
                </a>
            </li>
            <li>
            	<a href="">
                	<img src="../Assets/upload/pic6.jpg" alt=""/>
                    <p>农产品进口</p>
                </a>
            </li>
             <li>
            	<a href="">
                	<img src="../Assets/upload/pic6.jpg" alt=""/>
                    <p>农产品进口</p>
                </a>
            </li>
             <li>
            	<a href="">
                	<img src="../Assets/upload/pic6.jpg" alt=""/>
                    <p>农产品进口</p>
                </a>
            </li>
             <li>
            	<a href="">
                	<img src="../Assets/upload/pic6.jpg" alt=""/>
                    <p>农产品进口</p>
                </a>
            </li>
             <li>
            	<a href="">
                	<img src="../Assets/upload/pic6.jpg" alt=""/>
                    <p>农产品进口</p>
                </a>
            </li>
            <li>
            	<a href="">
                	<img src="../Assets/upload/pic6.jpg" alt=""/>
                    <p>农产品进口</p>
                </a>
            </li>
            <li>
            	<a href="">
                	<img src="../Assets/upload/pic6.jpg" alt=""/>
                    <p>农产品进口</p>
                </a>
            </li>
            <li>
            	<a href="">
                	<img src="../Assets/upload/pic6.jpg" alt=""/>
                    <p>农产品进口</p>
                </a>
            </li>
        </ul>
        <div class="space_hx">&nbsp;</div>
      
    </div>
    </div>
</div>

<div class="space_hx">&nbsp;</div>
<?php
include '../footer.html';
?>
        
</body>
</html>
