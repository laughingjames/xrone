$(document).ready(function() {
	$(".fwlcall .fwlc_c .fwlc_list li").hover(function() {
		$(this).find("div.move").stop(true,true).animate({
			"margin-top": "-280px"
		}, 200);
	}, function() {
		$(this).find("div.move").stop(true,true).animate({
			"margin-top": "0px"
		}, 200);
	});

	$(".fwall .fw_c .fw_list li").hover(function() {
		$(this).css("border", "1px solid #2c62a4");
		$(this).find("div.fw_pic").css("background", "#2c62a4");
		$(this).find("div.fw_sm").css("color", "#2c62a4");
		$(this).find("div.fw_sm span").css("color", "#2c62a4");
		$(this).find("a").css({
			"background": "#2c62a4",
			"color": "#fff"
		});
	}, function() {
		$(this).css("border", "1px solid #d8d8d8");
		$(this).find("div.fw_pic").css("background", "#7d7d7d");
		$(this).find("div.fw_sm").css("color", "#3a3a3a");
		$(this).find("div.fw_sm span").css("color", "#9a9a9a");
		$(this).find("a").css({
			"background": "#fff",
			"color": "#7d7d7d"
		});
	});

/*侧边效果*/
	$(".windowleft li").eq(0).hover(function() {
		$(this).find("index-img").css("margin-left", "200px");
		$(this).css("background", "#c4181f");
		$(this).stop(true,false).animate({"right": "-50px"}, 300);
		$(this).find("span").css("display", "block");
	}, function() {
		$(this).find("index-img").css("margin-left", "20px");
		$(this).css("background", "#999999");
		$(this).stop(true,false).animate({"right": "-140px"}, 300);
		$(this).find("span").css("display", "none");
	});

	$(".windowleft li").eq(1).hover(function() {
		$(this).find("index-img").css("margin-left", "200px");
		$(this).css("background", "#c4181f");
		$(this).stop(true,false).animate({"right": "-50px"},300);
		$(this).find("span").css("display", "block");
	}, function() {
		$(this).find("index-img").css("margin-left", "20px");
		$(this).css("background", "#999999");
		$(this).stop(true,false).animate({"right": "-140px"},300);
		$(this).find("span").css("display","none");
	});

	$(".windowleft li").eq(2).hover(function() {
		$(this).find("index-img").css("margin-left", "200px");
		$(this).css("background", "#c4181f");
		$(this).stop(true,false).animate({
			"right": "-50px"}, 300);
		$(this).find("span").css("display", "block");
	}, function() {
		$(this).find("index-img").css("margin-left", "20px");
		$(this).css("background", "#999999");
		$(this).stop(true,false).animate({"right": "-140px"}, 300);
		$(this).find("span").css("display", "none");
	});
	$(".windowleft li").eq(30).hover(function() {

		$("#wxid").css("display", "block");
	}, function() {
		$(this).css("display", "block");
		$("#wxid").css("display", "none");
	});
	$(".windowleft li").eq(4).hover(function() {
		$(this).find("index-img").css("margin-left", "200px");
		$(this).css("background", "#c4181f");
		$(this).stop(true,false).animate({"right": "-50px"}, 300);
		$(this).find("span").css("display", "block");
	}, function() {
		$(this).find("index-img").css("margin-left", "20px");
		$(this).css("background", "#999999");
		$(this).stop(true,false).animate({"right": "-140px"}, 300);
		$(this).find("span").css("display", "none");
	});
	$(".windowleft li").eq(3).hover(function() {
		$(this).find("index-img").css("margin-left", "200px");
		$(this).css("background", "#c4181f");
		$(this).stop(true,false).animate({"right": "-50px"}, 300);
		$(this).find("span").css("display", "block");
	}, function() {
		$(this).find("index-img").css("margin-left", "20px");
		$(this).css("background", "#999999");
		$(this).stop(true,false).animate({"right": "-140px"}, 300);
		$(this).find("span").css("display", "none");
	});
	
});