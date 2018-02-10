<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


<title>Message Board</title>
<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<style>
</style>
</head>
<body>
<?php
	
		$ip = $_SERVER["REMOTE_ADDR"];
		$time=date('Y-m-d H:i:s',time());
		$flag=0;
		mysql_connect('localhost','root','JhFnZv9TmHhJ');
	//	mysql_connect('localhost','root','root');
	
		mysql_select_db('internation');
	
		mysql_query('set names utf8');
		$find="SELECT * FROM messageboard order by id desc";
		$result=mysql_query($find);
		  foreach($result as $a)
		$count=0;
       
		
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>

<link rel="stylesheet" href="css/common.css"/>

<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script type="text/javascript">

var w,h,className;
function getSrceenWH(){
	w = $(window).width();
	h = $(window).height();
	$('#dialogBg').width(w).height(h);
}

window.onresize = function(){  
	getSrceenWH();
}  
$(window).resize();  

$(function(){
	getSrceenWH();
	
	//显示弹框
	$('.box a').click(function(){
		className = $(this).attr('class');
		$('#dialogBg').fadeIn(300);
		$('#dialog').removeAttr('class').addClass('animated '+className+'').fadeIn();
	});
	
	//关闭弹窗
	$('.claseDialogBtn').click(function(){
		$('#dialogBg').fadeOut(100,function(){
			$('#dialog').addClass('bounceOutUp').fadeOut();
		});
	});
});
</script>
</head>
<body>

<div id="wrapper">
	<div class="box">
	<a href="javascript:;" class="flipInX"><button name="btn" id="btn" form="form" ><span>Click
      there to leave a message.</span></button></a>
      </div>
		
		<div id="dialogBg"></div>
		<div id="dialog" class="animated">
        
			<img class="dialogIco" width="50" height="50" src="images/ico.png" alt="" />
			<div class="dialogTop">
				<a href="javascript:;" class="claseDialogBtn">CLOSE</a>
			</div>
			<form action="../hellohelper/php/messageboard.php" method="post" id="editForm">
				<ul class="editInfos">
					<li><label><font color="#ff0000">* </font>Name:<input type="text" name="name" class="ipt" /></label></li>
					<li><label><font color="#ff0000">* </font>Message:<textarea class="ipt2"  name="message" id="message"  required ></textarea></label></li>
					<li><input type="submit" value="SUBMIT" class="submitBtn" /></li>
				</ul>
			</form>
		</div>
	</div>
	
</div>

<header class="site-header">
  <div class="wrapper">
  
    <h3 class="site-header__title">Message Board</h3>
  </div>
     
</header>

<section class="timeline">
  <div class="wrapper">
  
  <?php   while($row=mysql_fetch_array($result))
  {

    echo '<div class="timeline__item timeline__item--'.$count++.'">';
  
    echo '<div class="timeline__item__station"></div>';
    echo '<div class="timeline__item__content">';
    echo '<h2 class="timeline__item__content__name">'.$row['name'].'</h2>';
    echo '<p class="timeline__item__content__description">'.$row['message'].'</p>';
    echo '<h2  class="timeline__item__content__date">'.$row['time'].'</h2>';
    echo '</div>';
	echo '</div>';
  }
?>
    
 
</section><script>
/*function customWayPoint(className, addClassName, customOffset) {
  var waypoints = $(className).waypoint({
    handler: function(direction) {
      if (direction == "down") {
        $(className).addClass(addClassName);
      } else {
        $(className).removeClass(addClassName);
      }
    },
    offset: customOffset
  });
}

var defaultOffset = '50%';

for (i = 0; i < 17; i++) {
  customWayPoint('.timeline__item--' + i, 'timeline__item-bg', defaultOffset);
}*/</script>

</body>
</html>