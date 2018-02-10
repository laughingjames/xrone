$(function() {
	$(".browse").hover(function() {
		$.get('/get_his',function(data){
			$("#history").html(data);
		})
		$(this).find("span").addClass("current").next(".browse_item").show();
	}, function() {
		$(this).find("span").removeClass("current").next(".browse_item").hide();
	});

	$(".browse_click").each(function(index){
		$(this).click(function(){
			var data=$(this).attr('data-info');
			var kcurl=$(this).attr('href');
			if(data!=undefined && data!=""){
				//ajax 设置
				var info= new Array(); //定义一数组
				info=data.split("|"); //字符分割
				$.post('/set_cookie',{'name':info[0],'state':info[1],'url':kcurl},function(data){
					
				})
			}
		})
	})

	
	$(".recommend_slide ul li").hover(function(){
		$(this).find("p").hide().parent().siblings(".recommend_detail").stop().animate({
			bottom: 0
		},200);
	},function(){
		$(this).find("p").show().parent().siblings(".recommend_detail").stop().animate({
			bottom: -191
		},200);
	});
	
	$(".top").click(function(){
		$('html,body').animate({
			scrollTop: 0
		}, 300);
		return false;
	})
	
	$(".test_state_versions span").click(function(){
		$(".check_more").fadeIn(300);
	});
	$(".close_more").click(function(){
		$(this).parent().fadeOut(300);
	});
	
	$(window).scroll(function() {
		var top = $(document).scrollTop(),
			thisFloat = $("#js_scrollbox");
		if (top < 160) {
			thisFloat.removeClass("pos_fix");
		}
		if (top >= 160) {
			thisFloat.addClass("pos_fix");
		}
		//console.log(top)
	})
});



//清除记录
function clearHis(){
	DelCookie('073kc_historys');
	$("#history").html("您还没有浏览开测游戏呢");
}	
function DelCookie(name) {
  var exp = new Date();
  exp.setTime(exp.getTime() + (-1 * 24 * 60 * 60 * 1000));
  var cval = '';
  document.cookie = name + "=" + cval + "; expires=" + exp.toGMTString()+ "; path=/";
}