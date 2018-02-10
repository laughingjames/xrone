$(function(){
	//二级导航显示
	var navCur = $(".nav>ul>li.current").index();
	$(".nav>ul>li").hover(function(){
		$(this).find(".navMenu").show();
		$(this).find(".navMenuOther").show();
		$(this).addClass("current").siblings().removeClass("current");
	},function(){
		$(this).find(".navMenu").hide();
		$(this).find(".navMenuOther").hide();
		$(this).removeClass("current");
		if(navCur > 0){
		$(".nav>ul>li").eq(navCur).addClass("current")
		}
	})
	//三级导航显示
	var navHeight = $(".navMenu").outerHeight();
	$(".navMenuTwo").css({height:navHeight});
	$(".navMenu>ul>li").hover(function(){
		var that = $(this);
		var navMenu = that.find(".navMenuTwo");
		var navTop = that.position();
		if(navMenu.length > 0){
			navMenu.css({top:-navTop.top});
			navMenu.show();
			that.addClass("current");
		}
	},function(){
		$(this).find(".navMenuTwo").hide();
		$(this).removeClass("current");
	})
	//其它导航
	$(".navMenu>ul>li").hover(function(){
		$(this).find(".navMenuOther_con").show();
	},function(){
		$(this).find(".navMenuOther_con").hide();
	})
	$(".navMenuOther>ul>li").hover(function(){
		$(this).find(".navMenuOther_con").show();
	},function(){
		$(this).find(".navMenuOther_con").hide();
	})
	//二维码
	$(".headerWeixin").hover(function(){
		$(this).find(".headerWeixin_ewm").stop().animate({"height":"120px"},300)
	},function(){
		$(this).find(".headerWeixin_ewm").stop().animate({"height":"0"},300)
	})
	Tabs(".J-tab",".tabHover>li","mouseenter","current");//通用

})
//TAB切换
function Tabs(showObj,togglesObj,eventObj,className){
	var togglesObject = $(togglesObj);
	togglesObject.on(eventObj,function(){
		var index = $(this).index();
		var thisId = $(this).parent().attr("id");
		$(this).addClass(className).siblings().removeClass(className);
		$("#"+thisId+"_con").find(showObj).removeClass(className).hide().eq(index).addClass(className).show();
	})
}

$.fn.slide = function(options) {
	var defaults = {
		type:         'left',
		btn:          '.slide_btn',
		leftBtn:      '.slide_left',
		rightBtn:     '.slide_right',
		btnActive:    'click',
		picBox:       '.slide_pic',
		num:          '1',
		conWidth:     '100%',
		conHeidth:    '100%',
		time:         '3000',
		speed:        '500',
		play:         '1',
		percent:      '0'
	};
	var
		obj       =     $.extend(defaults,options),
		self      =     $(this),
		picUl     =     self.find(obj.picBox+">ul"),
		picLi     =     self.find(obj.picBox+">ul>li"),
		btnLi     =     self.find(obj.btn+">ul>li"),
		leftBtn   =     self.find(obj.leftBtn),
		rightBtn  =     self.find(obj.rightBtn),
		type      =     obj.type,
		conWidth  =     obj.conWidth,
		conHeight  =    obj.conHeight,
		speed     =     obj.speed,
		percent   =     obj.percent,
		len       =     Math.ceil(picLi.length/obj.num),
		index     =     0,
		timer;

	if(percent == 1 && type == "left"){
		picUl.css({"width":100*len+"%"});
		picLi.css({"width":100/len+"%"});
		$(this).animate({"opacity":"1"},500);
	}

	btnLi.bind(obj.btnActive,function(){
		if(index != btnLi.index(this)){
			index = btnLi.index(this);
			goanimate(index);
		}
	})

	leftBtn.click(function(){
		if(index==0){index=len-1;}else{index--;}
		goanimate(index);
	})

	rightBtn.click(function(){
		if(index==len-1){index=0;}else{index++;}
		goanimate(index);
	})

	if(obj.play==1){
		self.hover(function(){
			clearInterval(timer);
		},function(){
			clearInterval(timer);
			timer = setInterval(function(){
				if(index==len-1){index=0;}else{index++;}
				goanimate(index);
			},obj.time);
		}).trigger("mouseleave");
	}

	var goanimate = function(index){
		if(percent == "1" && type == "left"){
			picUl.stop().animate({"marginLeft":-index*100 +"%"},speed);
		}
		if(percent == "0" && type == "left"){
			picUl.stop().animate({"marginLeft":-index*conWidth},speed);
		}
		if(percent == "0" && type == "top"){
			picUl.stop().animate({"marginTop":-index*conHeight},speed);
		}
		if(percent == "0" && type == "fade"){
			picLi.stop(false,true).fadeOut();
			picLi.eq(index).stop(false,true).fadeIn();
		}
		btnLi.removeClass("active").eq(index).addClass("active");
	}

}


