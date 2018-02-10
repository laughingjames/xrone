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
    	您当前的位置：<a href="onlineculting.php">在线咨询></a><a href="">咨询示例</a>
    </div>
</div>

 <div class="scd clearfix">
	<div class="scd_l">
    	<div class="l_name">
        	<img src="../Assets/images/n1.png" alt=""/>
            <em>&nbsp;</em>
        </div>
        <ul class="l_nav">
        	<li class="on">
            	<a href="../About/about.php">
                	<em>&nbsp;</em>
                    <span>咨询示例</span>
                    <i>&nbsp;</i>
                </a>
            </li>
            
        </ul>
    </div>
    <div class="scd_r">
    	<div class="r_name"><span>公司简介</span></div>
        <div class="s_ctn clearfix">
        	<h2 align="center">案例1. 高速切削操作改进研究（操作改进）</h2>
             <br>
<p style=" font-size:18px;text-indent:2em;">（1）问题描述</p>
             <br>
              <p style=" font-size:14px;text-indent:2em;">高速切削技术是以高切削速度、高进给速度和高加工精度为主要特征的加工技术 ,近 20年来发展较为迅速，是先进制造技术发展的方向。在高速铣削中, 存在这样的问题：工人们大都是拿计件工资，因此都希望提高产量，因而选择设置较高的转速和每齿的进给量，但这样加工出来的零件表面粗糙，影响质量，还要再经过刨、洗等工序进行打摩。因此，机床切削参数的选择直接关系到产品的质量、加工效率和加工经济性。现在希望通过试验来找到最佳的操作参数组合。</p>
              <br>
<p style=" font-size:18px;text-indent:2em;">（2）响应变量及影响因子</p>
             <br>
              <p style=" font-size:14px;text-indent:2em;">零件表面粗糙是衡量零件质量和机床加工效能的一个重要指标 , 因此通过切削试验，研究高速切削工件表面粗糙度的影响因素，寻求最佳的机床切削参数。</p>
               <p style=" font-size:14px;text-indent:2em;">在高速切削加工中, 根据技术人员的经验，影响已加工表面的粗糙度的是切削参数，正确的选择切削参数可以有效的提高生产率，保证必要的加工质量和经济性。技术人员将主要的切削参数填写在下表中:</p>
   <div align="center"><img src="pic1.jpg"></img></div>
    <p style=" font-size:14px;text-indent:2em;">这个试验有三个水平，且都是定量的，如果用传统的方法进行试验摸索，则试验次数很多，且无头绪。因此，工厂请数理统计方面的专家寻求帮助。专家从试验设计的角度认为可以用正交设计来寻求最佳参数组合，并确定因素水平表如下:</p>
    <div align="center"><img src="pic2.jpg"></img></div>
    
    <p style=" font-size:18px;text-indent:2em;">（3）试验方案</p>
             <br>
              <p style=" font-size:14px;text-indent:2em;">这是一个三因素三水平的试验问题，如果用全面试验，则需要3^3=27次试验，试验次数太多。专家决定用正交表L9(3^4) 来安排试验，则只需9次试验。试验方案如下表2。</p>
               <p style=" font-size:14px;text-indent:2em;">安排工人按此方案进行了试验。试验在瑞士 Mikron的 HSM600数控五轴超高速加工中心上进行,数控系统为 Heidenhain ITNC530。加工零件为叶轮的叶片。工人们按此方案试验后将结果填写在下表3中</p>
     <div align="center"><img src="pic3.jpg"></img></div>
      <div align="center"><img src="pic4.jpg"></img></div>
       <p style=" font-size:18px;text-indent:2em;">（4）结果分析</p>
             <br>
              <p style=" font-size:14px;text-indent:2em;">利用极差分析，可以确定影响因子的排序是B、C、A，因此粗糙度最小的水平组合是B1C1A3，即切削参数的最佳组合是每齿进给量取2100(mm/min)、进给速度取2100(mm/min)、主轴转速取26000(r/min)。用这个参数组合进行了验证试验，零件的粗糙度的确有很大改善。</p>
      

        </div>
    </div>
</div>
<?php
include '../footer.html';
?>

</body>
</html>
