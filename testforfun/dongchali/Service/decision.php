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
    	您当前的位置：<a href="../Service/service.html"> 咨询业务</a> > <a href="">科学决策</a>
    </div>
</div>
<div class="scd clearfix">
	<div class="scd_l">
    	<div class="l_name">
        	<img src="../Assets/images/n5.png" alt=""/>
            <em>&nbsp;</em>
        </div>
        <ul class="l_nav">
        		<li>
            	<a href="../Service/service.php">
                	<em>&nbsp;</em>
                    <span>试验优化</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li>
            	<a href="../Service/control.php">
                	<em>&nbsp;</em>
                    <span>质量控制</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li>
            	<a href="../Service/production.php">
                	<em>&nbsp;</em>
                    <span>精益生产</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li>
            	<a href="../Service/analysis.php">
                	<em>&nbsp;</em>
                    <span>数据分析</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li>
            	<a href="../Service/management.php">
                	<em>&nbsp;</em>
                    <span>风险管理</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li class="on">
            	<a href="../Service/decision.php">
                	<em>&nbsp;</em>
                    <span>科学决策</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li>
            	<a href="../Service/lifetest.php">
                	<em>&nbsp;</em>
                    <span>寿命试验</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li>
            	<a href="../Service/design.php">
                	<em>&nbsp;</em>
                    <span>设计与实验</span>
                    <i>&nbsp;</i>
                </a>
            </li>
        </ul>
    </div>
    <div class="scd_r">
    	<div class="r_name"><span>试验优化</span></div>
        <div class="s_ctn clearfix">
         
            <p style="text-indent:2em;">决策是一个提出问题、分析问题、解决问题的完整的动态过程，是一个信息提取与分析，建模与仿真的动态过程。遵循科学的决策程序，才能作出正确的决策。我们看到太多企业因决策失误而导致亏损，陷入困境，甚至破产的例子，温州企业家们在企业决策时大多也是采用传统的拍脑袋方式。大量的证据表明，建立在数据分析法基础上的决策比那些凭直觉作出的决策正确的可能性要高出很多。我们公司拥有的多项统计分析技术、数据挖掘技术，市场调查与研究、 统计模型及仿真，可以为企业提供决策咨询和决策依据，帮助企业家进行科学、理性决策。</p>
            
               <br>




        </div>
    </div>
</div>
<div class="space_hx">&nbsp;</div>
<?php
include '../footer.html';
?>
</body>
</html>
