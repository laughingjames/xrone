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
    	您当前的位置：<a href="../Service/service.html"> 咨询业务</a> > <a href="">风险管理</a>
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
            <li class="on">
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
    	<div class="r_name"><span>风险管理</span></div>
        <div class="s_ctn clearfix">
         
            <p style="text-indent:2em;"> 每一家企业都面临影响组织的不同部分的一系列风险企业，如自然风险、责任风险、合同风险、决策风险、项目风险、投资风险、并购风险、债务风险等，但我国企业界在风险管理方面无论是意识还是水平都比较落后。本公司提供的企业风险管理咨询，不仅帮助一个主体到达期望的目的地，还有助于避开前进途中的隐患和意外。具体的服务有： </p>
            <br/>
            <p style=" text-indent:2em;">【1】	企业风险识别与评估</p>
            <p style=" text-indent:2em;">【2】	企业风险管理策划与方案设计</p>


        </div>
    </div>
</div>
<div class="space_hx">&nbsp;</div>
<?php
include '../footer.html';
?>
</body>
</html>
