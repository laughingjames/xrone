<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="viewport"content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes"/>

	<title>温州洞察力数据咨询公司积分排行榜</title>
	
	<link rel="icon" href="icon/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="icon/favicon.ico" type="image/x-icon" />
	<meta name="renderer" content="webkit">
    <link href="css/css.css?v=1.91" rel="stylesheet" type="text/css" />
    <script src="js/jquery.1.8.3.min.js"></script>
	<script src="js/index.js?v=1.4" type="text/javascript" charset="utf-8"></script> 
</head>
<body>
	<p class="p3 ml_0"><a href="http://me.07073.com/msg/" target="_blank" class="a8"><i id="msg_num"></i></a></p>
            <p class="p3 ml_0"><a href="javascript:;" onclick="return AddFavorite(window.location,document.title);" class="a6"></a></p>
        </div>
	</div>
	
		</div>
	</div>
</div>
<?php 
		$flag=0;
		//mysql_connect('localhost','root','JhFnZv9TmHhJ');
		mysql_connect('localhost','root','root');
		if(mysql_select_db('dongchali'));
		mysql_query('set names utf8');
		$find="SELECT * FROM jifen order by score desc";
		
		$result=mysql_query($find);
		$count=0;
	
?>
	</div>
	
	<div class="wrapper">
				<div class="w_1000">
			<div class="header">
				<div class="logo">
					<a href="index.php">
						<img src="img/logo.png"/>			
					</a>
				</div>
				<div class="timer_box">
					<div class="data_time">
						<div class="year">
							<?php echo date("Y")?></div>
						<div class="month">
							<?php echo date("m")?></div>
						<div class="day">
							<?php echo date("d")?></div>
					</div>
					<span>
						共有 <b>1</b>
						成员
					</span>
				</div>
			</div>
		</div>
		<div class="menu"><div class="w_1000">
				<ul>
					<li>
						<a class="active" href="index.html">排行榜</a>
					</li>
					
				</ul>
				<div class="clear"></div>
			</div>
		</div>
	
        <div class="w_1000 pb_50">
				<div class="bread">
				  <div class="list_con list_con_2">
					<div class="tit_text">本周之星</div>
						<div>
                        
					<div class="list_a_con">
						<div class="list_a_con_time fl"><b>排名：1</b><br>积分：15</div>
							<dl><dt>
									<a href="icon/wutong.png" title="吴统" target="_blank"><img style="border-radius:60px;" src="icon/wutong.png"></a>
								</dt>
								<dd>
									<h3><a>吴统</a><span>15应用统计</span></h3>
                                   <i>总经理</i>
                                   <em>----</em><a>打不赢凡人！</a></nobr></dd>
						<dd><div class="list_a_con_theme"></div></dd></dl>
							<div class="list_a_con_btn">
								<a href="kstj/35702.html" target="_blank" class="list_a_con_btn2 browse_click" >15</a>
						<div></div><i class="i1"></i><i class="i2"></i><i class="i3"></i><i class="i4"></i></div></div></div>
										
				<div class="list_con list_con_5 list_con_last">
					<div class="tit_text">积分排行榜</div>
						<div>	
                          <?php while($row=mysql_fetch_array($result))	{
							
						echo "<div class=\"list_a_con\">";
						echo "<div class=\"list_a_con_time fl\"><b>排名：".++$count."</b><br>积分：".$row['score']."</div>";
						echo	"<dl><dt><a href=\"".$row['url']."\"  target=\"_blank\"><index-img style=\"border-radius:60px;\" src=\"icon/wutong.png\"></a>";
						echo		"</dt><dd>";
						echo			"<h3><a>".$row['name']."</a><span>".$row['grade']."</span></h3><i>".$row['postion']."</i>";
                        echo            "<em>----</em><a>".$row['moto']."</a></nobr></dd></h3></dd>";
						echo 	"<dd><div class=\"list_a_con_theme\"></div></dd></dl><div class=\"list_a_con_btn\">";
						echo "<a href=\"kstj/35702.html\" target=\"_blank\" class=\"list_a_con_btn2 browse_click\" >".$row['score']."</a>";
								
						echo 	"</div><i class=\"i1\"></i><i class=\"i2\"></i><i class=\"i3\"></i><i class=\"i4\"></i></div>";
						}
                        ?>
						
												
					</div>
				</div>
	</div>	   
                  
				  <div class="more"><a href="#">同志们加油>></a></div>
				
				

	</div>	

	<div class="w_1000">
		<div class="f_link">
			        <p>
					

			</div>
	</div>

	</div>
	<div class="footer"> 
			<style>.thisFriendly { padding-top: 20px; color: #666; margin-bottom: 20px; line-height: 21px; }
	.thisFriendly a { color: #666; }
	</style>
	
	
	
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<div class="hy_foot hy_c0">
	 Copyright &copy; 2007-2018 温州洞察力数据咨询公司    
	  
	  <a href="http://www.xrone.cn/" target="_blank" rel="nofollow">积分管理表</a>    
</div>


	<div class="scrollTop">
		<ul>
			<li><a href="http://zz.07073.com/" class="a1" target="_blank" >数据<br>管理</a></li>
			<li><a href="http://m1.073img.com/_13img/kaice/kc07073.url" class="a1">积分<br>申报</a></li>
			<li><a href="javascript:;" onclick="$('.share').toggle();" class="a1 a2">分享</a>
			<div class="bdsharebuttonbox share" style="display: none;">
			<a title="分享到新浪微博" href="index.html#" class="bds_tsina a3 weibo" data-cmd="tsina"></a>
			<a title="分享到QQ空间" href="index.html#" class="bds_qzone a44 qzone" data-cmd="qzone"></a>
			</div></li>
			
			<li><a href="javascript:;" onclick="$('body,html').animate({ scrollTop: 0 }, 800);" style="display:none;" class="a1 fd">TOP</a></li>
		</ul>
	</div>
    </div></div></body>
	<script charset="GBK">window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
	</script>
	<script type="text/javascript">

	$(".list_con1").each(function(index){
		$(this).children('.list_a:last').find('span').addClass('list_a_list_short');
	})

	$(window).bind("scroll", function(){ 
		var sh=$(window).scrollTop();
		//显示返顶
		if(sh > 800){
			$('.fd').show();
		}else{
			$('.fd').hide();
		}
	})


  

<script type="text/javascript">
function uaMatch() {
	var userAgent = navigator.userAgent,rChrome = /.*(chrome)\/([\w.]+).*/, rFirefox = /.*(firefox)\/([\w.]+).*/;
	var ua = userAgent.toLowerCase();
    var match = rChrome.exec(ua);
    if (match != null) {
    	return { browser : match[1] || "", version : parseInt(match[2]) || "0" };
	}
    match = rFirefox.exec(ua);
    if (match != null) {
		return { browser : match[1] || "", version : match[2] || "0" };
    }
	return { browser : 'other' };
}
function showid(idname) {
	var isIE = (document.all) ? true : false;
	var isIE6 = isIE && (/msie 6/i.test(navigator.userAgent));
	var newbox = document.getElementById(idname);
	newbox.style.zIndex = "100001";
	newbox.style.display = "block"
	newbox.style.position = !isIE6 ? "fixed" : "absolute";
	newbox.style.top = newbox.style.left = "50%";
	newbox.style.marginTop = -newbox.offsetHeight / 2 + "px";
	newbox.style.marginLeft = -newbox.offsetWidth / 2 + "px";	
	
	$('#jihualayer').remove();
	
	var jihualayer = document.createElement("div");
	jihualayer.id = "jihualayer";
	jihualayer.style.width = jihualayer.style.height = "100%";
	jihualayer.style.position = !isIE6 ? "fixed" : "absolute";
	jihualayer.style.top = jihualayer.style.left = 0;
	jihualayer.style.backgroundColor = "#000";
	jihualayer.style.zIndex = "100000";
	jihualayer.style.opacity = "0.6";

	document.body.appendChild(jihualayer);
	var sel = document.getElementsByTagName("select");
	for (var i = 0; i < sel.length; i++) {
		sel[i].style.visibility = "hidden";
	}
	function jihualayer_iestyle() {
		jihualayer.style.width = Math.max(document.documentElement.scrollWidth, document.documentElement.clientWidth) + "px";
		jihualayer.style.height = Math.max(document.documentElement.scrollHeight, document.documentElement.clientHeight) + "px";
	}
	function newbox_iestyle() {
		newbox.style.marginTop = document.documentElement.scrollTop - newbox.offsetHeight / 2 + "px";
		newbox.style.marginLeft = document.documentElement.scrollLeft - newbox.offsetWidth / 2 + "px";
	}
	if (isIE) {
		jihualayer.style.filter = "alpha(opacity=60)";
	}
	if (isIE6) {
		jihualayer_iestyle()
		newbox_iestyle();
		window.attachEvent("onscroll", function () {
			newbox_iestyle();
		})
		window.attachEvent("onresize", jihualayer_iestyle)
	}
	jihualayer.onclick = function () {
		newbox.style.display = "none"; 
		jihualayer.style.display = "none"; 
		for (var i = 0; i < sel.length; i++) {
			sel[i].style.visibility = "visible";
		}
	}
}




</html>