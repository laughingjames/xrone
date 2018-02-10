<!doctype html>
<!--
COPYRIGHT by avenjan
e-mail:avenjan@gmail.com
Free to use this as you like 
-->

<html class="no-js" lang="zh_cn">
		<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">

		<!-- Page Title Here -->
		<title>时间记录 | 香蕉</title>

		<!-- Page Description Here -->
		<meta name="description" content="A responsive coming soon template, un template HTML pour une page en cours de construction">

		<!-- Disable screen scaling-->
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0">

		<!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

		<!-- Initializer -->
		<link rel="stylesheet" href="css/normalize.css">

		<!-- Web fonts and Web Icons -->
		<link rel="stylesheet" href="css/pageloader.css">
		<link rel="stylesheet" href="fonts/opensans/stylesheet.css">
		<link rel="stylesheet" href="fonts/asap/stylesheet.css">
		<link rel="stylesheet" href="css/ionicons.min.css">

		<!-- Vendor CSS style -->
		<link rel="stylesheet" href="css/foundation.min.css">
		<link rel="stylesheet" href="js/vendor/jquery.fullPage.css">
		<link rel="stylesheet" href="js/vegas/vegas.min.css">

		<!-- Main CSS files -->
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/main_responsive.css">
		<link rel="stylesheet" href="css/style-color1.css">
		<script src="js/vendor/modernizr-2.7.1.min.js"></script>
        <script src="jquery-2.1.1.js"></script>
		<style>
#jp_container_1 { position: fixed; top: 5%; left: 2% }
#jp_container_1 a { font-size: 26px; color: #ffffff }
#jp_container_1 a:hover { color: #f4645f }
</style>
<?php
		
		if(!mysql_connect('localhost','root','JhFnZv9TmHhJ'))
		echo 'error!';
		mysql_select_db('nanabirth');
		mysql_query('set names utf8');
?>
<script  language="javascript">

function check2(){
	alert('没有权限！谢谢！');
	window.location.href="#register";
	window.location.reload(true);
	}
</script>
</head>
		<body id="menu" class="alt-bg">
<!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 

<!-- Page Loader -->
<div class="page-loader" id="page-loader">
          <div><i class="ion ion-loading-d"></i>
    <p>美丽值得期待...</p>
  </div>
        </div>

<!-- BEGIN OF site cover -->
<div class="page-cover" id="s-cover"> 
          <!-- Cover Background -->
          <div class="cover-bg pos-abs full-size bg-img" data-image-src="1.jpg"></div>
          
          <!-- BEGIN OF Slideshow Background -->
          <div class="cover-bg pos-abs full-size slide-show"> <i class='img' data-src='2.jpg'></i> <i class='img' data-src='3.jpg'></i> <i class='img' data-src='4.jpg'></i> </div>
          <!-- END OF Slideshow Background -->
          
          <div class="cover-bg-mask pos-abs full-size bg-color" data-bgcolor="rgba(0, 0, 0, 0.41)"></div>
        </div>
<!--END OF site Cover --> 

<!-- Begin of timer pane -->
<div class="pane-when " id="s-when">
          <div class="content"> 
    <!-- Clock -->
    <div class="clock clock-countdown">
              <div class="site-config"
						 data-date="06/03/1996 22:00:00" 
						 data-date-timezone="+8"
						 ></div>
              <div class="elem-center">
        <div class="digit"> <span class="days">81</span> <span class="txt">天</span> </div>
      </div>
              <div class="elem-bottom">
        <div class="deco"></div>
        
        <!--						<span class="days">12</span><span class="thin">D</span>--> 
        <span class="hours">18</span><span class="thin">小时</span> <span class="minutes">45</span><span class="thin">分钟</span> <span class="seconds">36</span><span class="thin">秒</span> </div>
            </div>
    <footer>
              <p>FROM: 1996年 <strong>06月03日</strong></p>
              <p id="logInfo"></p>
            </footer>
  </div>
        </div>
<!-- End of timer pane --> 

<!-- BEGIN OF site main content content here -->
<main class="page-main" id="mainpage"> 
          
          <!-- Begin of home page -->
          <div class="section page-home page page-cent" id="s-home"> 
    
    <!-- Content -->
    <section class="content">
              <header class="header">
        <div class="h-left">
                  <h2>时间<strong>记录</strong></h2>
                  <br>
                </div>
        <div class="h-right">
                  <h3>李东娜 <br> && <br>
            21岁</h3>
             <br>
                  <h4 class="subhead"><a href="#register">记录时刻</a></h4>
                </div>
      </header>
            </section>
    
    <!-- Scroll down button -->
    <footer class="p-footer p-scrolldown"> <a href="#register">
      <div class="arrow-d">
        <div class="before">下滑</div>
        <div class="after">下拉</div>
        <div class="circle"><i class="ion ion-mouse"></i></div>
      </div>
      </a> </footer>
  </div>
          <!-- End of home page --> 
          
          <!-- Begin of register page -->
          <div class="section page-register page page-cent"  id="s-register">
    <section class="content">
              <header class="p-title">
        <h3>我的经历 ：<i class="ion ion-compose"></i></h3>
        	  <?php
					$rs=mysql_query('select * from nanabirth order by id desc');
					 while($rows=mysql_fetch_assoc($rs)){
						echo '<tr>';
	 					echo '<h4 class="subhead">'.$rows['things'].'</h4>';
					}
			?>
       
        
      </header>
              <div>
        <form id="mail-subscription" class="form magic send_email_form" >
                  <p class="invite"><br/>
            事件记录：</p>
                  <div class="fields clearfix">
            <div class="input">
                      <label for="reg-email">事情： </label>
                      <input id="reg-email" class="email_f"  name="things" type="text" required placeholder="时间事件" data-validation-type="text">
                    </div>
            <div class="buttons">
                      <button id="submit-email" class="button email_b" name="submit_email" onClick="check2()">确认</button>
                    </div>
          </div>
                  <p class="email-ok invisible"><strong>等一场千年雨歇，侯一人如约而至！</strong> </p>
                </form>
      </div>
            </section>
    <footer class="p-footer p-scrolldown"> <a href="#about-us">
      <div class="arrow-d">
        <div class="before">首页</div>
        <div class="after">关于</div>
        <div class="circle"><i class="ion ion-mouse"></i></div>
      </div>
      </a> </footer>
  </div>
          <!-- End of register page --> 
          
          <!-- Begin of about us page -->
          <div class="section page-about page page-cent" id="s-about-us">
    <section class="content">
              <header class="p-title">
        <h3>关于我 <i class="ion ion-android-information"> </i> </h3>
        <h4 class="subhead">一个天真无邪的少女，没有远大的报负，为悦己者容，只希望自己每天过得开心。</h4>
        <h4 class="subhead">我所祈求的只是容许我的任性，百分之百的任性。</h4>
         <h4 class="subhead">比如说，我现在对你说想吃酥饼，你就什么也不顾地跑去买，气喘吁吁地跑回来递给我，说：“你要的酥饼。”可我却说：“我不想吃了！”，然后“呼”的一声从窗口扔了出去，这就是我所追求的。</h4>
      </header>
              <!--article class="text">
                        <p>花径不曾缘客扫，蓬门今始为君开。　</p>
                        <p>盘飧市远无兼味，樽酒家贫只旧醅。 </p>
                    </article--> 
           </section>
           
           
    <footer class="p-footer p-scrolldown"> <a href="#contact">
      <div class="arrow-d">
        <div class="before">留言</div>
        <div class="after">祝福</div>
        <div class="circle"><i class="ion ion-mouse"></i></div>
      </div>
      </a> </footer>
  </div>
          <!-- End of about us page --> 
          
          <!-- Begin of Contact page   -->
    <div class="section page-contact page page-cent  bg-color" data-bgcolor="rgba(95, 25, 208, 0.88)s" id="s-contact"> 
    <!-- Begin of contact information -->
    <div class="slide" id="s-information" data-anchor="information">
           <section class="content">
        <header class="p-title">
      
                  <h3>留言板<img src="img/board.png" width="60px" height="60px"></h3>
                  
            <div class="tupian" id="tupian"><li ><a title="Message" href="#contact/message"><img src="img/message.png" width="60px" height="60px"> 点击留言</a> </li></div>
                  <iframe id="none" name="none" width="0" height="0"> </iframe>
               <div id="boardmessage"></div>
               
 <?php
		$Page_size=8;$init=1;$page_len=7; 
		$result=mysql_query('select * from message '); 
		$count = mysql_num_rows($result); 
		$page_count = ceil($count/$Page_size); 
		$max_p=$page_count; $pages=$page_count; 
		if(empty($_GET['page'])||$_GET['page']<0){ $page=1; }else { $page=$_GET['page']; } 
		
				$offset=$Page_size*($page-1); 
				$sql="select * from message order by time desc limit $offset,$Page_size"; 
				$result=mysql_query($sql); 
				// 输出内容
				while ($rows=mysql_fetch_array($result)) {
					
	 				echo '<h4>'.$rows['name'].':'.$rows['message'].'</h4>';
					echo '<p style="text-align:right;font-size:14px ">'.'--'.$rows['time'].'</p>';}
					
					$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
					$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
					$key='<div class="page">'; $key.="<span>$page/$pages</span> "; //第几页,共几页 
					if($page!=1){ 
						$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1#contact\">第一页</a> "; //第一页 
						$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."#contact\">上一页</a>"; //上一页 
					}else { 
					$key.="第一页 ";//第一页 
					$key.="上一页"; //上一页 
					} 
					if($pages>$page_len){ 
							//如果当前页小于等于左偏移 
						if($page<=$pageoffset){ 
							$init=1; 
							$max_p = $page_len; }else{//如果当前页大于左偏移 
							//如果当前页码右偏移超出最大分页数 
								  if($page+$pageoffset>=$pages+1){ 
									  $init = $pages-$page_len+1; }
									else{ 
									  //左右偏移都存在时的计算 
									  $init = $page-$pageoffset; 
									  $max_p = $page+$pageoffset; }}} 
		  for($i=$init;$i<=$max_p;$i++){ 
		  		if($i==$page){ 
		 			 $key.=' <span>'.$i.'</span>';   } else { 
		  				$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."#contact\">".$i."</a>"; }} 
						
						
		  if($page!=$pages){ 
		  $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."#contact\">下一页</a> ";//下一页 
		  $key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}#contact\">最后一页</a>"; //最后一页 
		  }else { 
		  		$key.="下一页 ";//下一页 
		 		 $key.="最后一页"; //最后一页 
		  } 
		  $key.='</div>'; 
                    ?>
                    
                    <tr><td colspan="2" bgcolor="#E0EEE0"><div align="center"><?php echo $key?></div></td></tr> 
       	<ul class="buttons">
      
          </ul>
                </header>
       
      </section>
            </div>
    <!-- end of contact information --> 
    
    <!-- begin of contact message -->
    <div class="slide" id="s-message" data-anchor="message">
       <section class="content">
        
        <header class="p-title">
                  <h3>留言板<img src="img/message.png" width="60px" height="60px"></h3>
                  <ul class="buttons">
           
            <li> <a title="Contact" href="#contact/information"><img src="img/back.png" width="80px" height="80px"></a> </li>
           
            
            <!--<li>
									<a title="Message" href="#contact/message"><i class="ion ion-email"></i></a>
								</li>-->
          </ul>
                </header>
               
        <!-- Begin Of Page SubSction -->
      
        <div class="page-block c-right v-zoomIn">
                  <div class="wrapper">
            <div>
         
         <form class="message form send_message_form" target="none" onSubmit="check()">
                <div class="fields clearfix">
                <div class="input">
                    <label  for="mes-name">昵称</label>
                    <input id="mes-name" name="name" type="text" placeholder="您的名字" required>
                  </div>
             <div class="buttons">
                    <button id="message" class="button email_b" name="submit_message" >发送</button>
                  </div>
                        </div>
                <div class="fields clearfix">
                          <div class="input">
                   
                  </div>
                        </div>
                <div class="fields clearfix no-border">
                          <label for="mes-text">留言： </label>
                          <textarea id="mes-text" placeholder="您写下的祝福将被送出" name="message" required></textarea>
                          <div>
                    <p class="message-ok invisible">您的祝福已经送出，谢谢！.</p>
                  </div>
                        </div>
              </form>
                    </div>
          </div>
                </div>
        <!-- End Of Page SubSction --> 
      </section>
            </div>
    <!-- End of contact message --> 
  </div>
          <!-- End of Contact page  --> 
          
        </main>
<script src="js/jquery.min.js"></script>
<!-- All vendor scripts --> 
<script src="js/vendor/all.js"></script> 

<!-- Downcount JS --> 
<script src="js/jquery.downCount.js"></script> 


  
<!-- Javascript main files --> 
<script src="js/main.js"></script> 
<script type="text/javascript" src="js/jquery.jplayer.min.js"></script> 
<script type="text/javascript">
 $(document).ready(function(){
  $("#jquery_jplayer_1").jPlayer({
   ready: function () {
    $(this).jPlayer("setMedia", {
     mp3: "music.mp3",
	 
    }).jPlayer("play");
   },
   ended: function() { // The $.jPlayer.event.ended event
    $(this).jPlayer("play"); // Repeat the media
  },
   swfPath: "/js",
   supplied: "mp3"
  });
 });
</script>
<script>
	
   $('#message').click(function(){
  	var _name = document.getElementById("mes-name").value;
	var _message = document.getElementById("mes-text").value;
      obj =$(this);
		$.post('messagesubmit.php',{message:_message,name:_name},function(r){
          
		    $("#boardmessage").append("<h4>"+_name+":"+_message+"</h4><p style=\"text-align:right;font-size:14px \">--就在刚刚</p>");
			alert('留言成功！谢谢你的祝福！');
			window.location.href="#contact/information";
          });
       });
	
</script>
<div id="jquery_jplayer_1"></div>
<div id="jp_container_1"> <a href="#" class="jp-play">
  <li class="ion-music-note" data-pack="default" data-tags="songs"></li>
  </a> <a href="#" class="jp-pause">
  <li class="ion-headphone" data-pack="default" data-tags="music, earbuds, beats"></li>
  </a> </div>
</body>
</html>
