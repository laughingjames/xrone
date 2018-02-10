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
    	您当前的位置：<a href="../Service/service.html"> 咨询业务</a> > <a href="">寿命试验</a>
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
            <li>
            	<a href="../Service/decision.php">
                	<em>&nbsp;</em>
                    <span>科学决策</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            <li class="on">
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
    	<div class="r_name"><span>寿命试验</span></div>
        <div class="s_ctn clearfix">
         
            <p style="text-indent:2em;">寿命试验是研究产品寿命特征的方法，它是将产品放在特定的试验条件下考察其失效（损坏）随时间变化规律。通过寿命试验，可以了解产品的寿命特征、失效规律、失效率、平均寿命以及在寿命试验过程中可能出现的各种失效模式。如果结合失效分析，可进一步弄清导致产品失效的主要失效机理，作为可靠性设计、可靠性预测、改进新产品质量和确定合理的筛选。但传统的试验方法耗时较长，既增加了试验成本，又延长了产品的加工周期。而加速寿命试验是在进行合理工程及统计假设的基础上，利用与物理失效规律相关的统计模型对在超出正常应力水平的加速环境下获得的信息进行转换，得到产品在额定应力水平下的特征可复现的数值估计的一种试验方法。本公司提供加速寿命试验服务，以帮助企业缩短试验周期，降低试验成本，提高效率。 </p>
            
        </div>
    </div>
</div>
<div class="space_hx">&nbsp;</div>
<?php
include '../footer.html';
?>
</body>
</html>
