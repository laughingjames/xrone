var bIE;
var bMozilla;
var bSafari;
var bOpera;
var nv_ua = navigator.userAgent.toLowerCase();

if(nv_ua.indexOf("msie") != -1){
    bIE=true;
}else if(nv_ua.indexOf("safari") != -1){
    bSafari=true;
}else if(nv_ua.indexOf("opera") != -1){
    bOpera=true;
}else if(nv_ua.indexOf("mozilla") != -1){
    bMozilla=true;
}

function createAjax() {
	var _xmlhttp;
	try {	
		_xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	catch (e) {
		try {
			_xmlhttp=new XMLHttpRequest();
		}
		catch (e) {
			_xmlhttp=false;
		}
	}
	return _xmlhttp;
}

function xHttp(){
		var xmlHttp = false;
		//获取服务器时间
		try {
			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e2) {
				xmlHttp = false;
			}
		}
		   
		if(!xmlHttp && typeof XMLHttpRequest != 'undefined') {
			xmlHttp = new XMLHttpRequest();
		}
    return xmlHttp;
}

function createXmlHttp(){
    var xmlhttp,alerted;
    /*@cc_on @*/
    /*@if (@_jscript_version >= 5)
        try {
            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP")
        }catch (e) {
        try {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
        } catch (E) {
            alert("You must have Microsofts XML parsers available")
        }
    }
    @else
        alert("You must have JScript version 5 or above.")
        xmlhttp=false
        alerted=true
    @end @*/
    if (!xmlhttp && !alerted) {
       try {
          xmlhttp = new XMLHttpRequest();
       } catch (e) {
          alert("对不起，你的浏览器不支持xmlhttp。")
       }
    }
    return xmlhttp;
}

function go(strUrl) {
if (xmlhttp) {
  xmlhttp.open("post", strUrl,true);
  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlhttp.onreadystatechange=RSchange;
  xmlhttp.send(null);
 }
}

function RSchange(){
  if (xmlhttp.readyState==4) {
  }
}

function ge(id){
  el=document.getElementById(id);
  return el;
}

function ges(tagname){
  var elarray = document.getElementsByTagName(tagname);
  return elarray;
}

function updatepos(){
    var tipposition = GetAbsoluteLocationEx(ge('typtip'));
    bbb_outer_div.style.top = tipposition.absoluteTop-200;
    bbb_outer_div.style.left = tipposition.absoluteLeft-550;
}

function closetypetip(event){
    event = event || window.event;
    var objTarget = event.target || event.srcElement;
    if(objTarget.id != 'bbb_outer_div' && objTarget.id != 'bbb_inner_div'){
        if(objTarget.name != 'usertype'){
            try{
                ge('bbb_outer_div').style.display='none';
            }catch(e){
            }
        }
    }
}

document.onclick=closetypetip;

function closetip(tipid){
    ge(tipid).innerHTML = '';
}

function getalertmsg(alertmsg,alerttype){
    var strHTML = '';
    if(alerttype=='success'){
        strHTML = strHTML + '<font color="#33cc00">'+ alertmsg+'</font>';
	}else {
        strHTML = strHTML + '<font color="#ff0000">'+ alertmsg+'</font>';
	}
    return strHTML;
}

function cbno(obj){
	obj.value = obj.value.replace(/\D/g,'');
}

function irpr(){
    var imgarray = document.getElementsByTagName('img');
    for(var i=0;i<imgarray.length;i++){
        if(imgarray[i].name=='tipimg'){
            if(imgarray[i].src.indexOf('icon_error')>-1){
                return false;
            }
        }
    }
    return true;
}

function setCookie(c_name,value,expiredays)
{
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + expiredays);
	// 使设置的有效时间正确。增加toGMTString()
	document.cookie=c_name + "=" +escape(value) + ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString());
}

function getCookie(c_name)
{
 if (document.cookie.length > 0)
 {
  c_start = document.cookie.indexOf(c_name + "=")
  if (c_start != -1)
  { 
   c_start = c_start + c_name.length + 1;
   c_end   = document.cookie.indexOf(";",c_start);
   if (c_end == -1) 
   {
    c_end = document.cookie.length;
   }
   return unescape(document.cookie.substring(c_start,c_end));
  } 
 }
 return null
}

function delCookie(c_name){//为了删除指定名称的cookie，可以将其过期时间设定为一个过去的时间
   var date = new Date();
   date.setTime(date.getTime() - 10000);
   document.cookie = c_name + "=a; expires=" + date.toGMTString();
}

//dedeAjax start
//xmlhttp和xmldom对象
var DedeXHTTP = null;
var DedeXDOM = null;
var DedeContainer = null;
var DedeShowError = false;
var DedeShowWait = false;
var DedeErrCon = "";
var DedeErrDisplay = "下载数据失败";
var DedeWaitDisplay = "正在下载数据...";

//获取指定ID的元素
//function $(eid){
//	return document.getElementById(eid);
//}

function $DE(id) {
	return document.getElementById(id);
}

//gcontainer 是保存下载完成的内容的容器
//mShowError 是否提示错误信息
//DedeShowWait 是否提示等待信息
//mErrCon 服务器返回什么字符串视为错误
//mErrDisplay 发生错误时显示的信息
//mWaitDisplay 等待时提示信息
//默认调用 DedeAjax('divid',false,false,'','','')

function DedeAjax(gcontainer,mShowError,mShowWait,mErrCon,mErrDisplay,mWaitDisplay){

DedeContainer = gcontainer;
DedeShowError = mShowError;
DedeShowWait = mShowWait;
if(mErrCon!="") DedeErrCon = mErrCon;
if(mErrDisplay!="") DedeErrDisplay = mErrDisplay;
if(mErrDisplay=="x") DedeErrDisplay = "";
if(mWaitDisplay!="") DedeWaitDisplay = mWaitDisplay;


//post或get发送数据的键值对
this.keys = Array();
this.values = Array();
this.keyCount = -1;

//http请求头
this.rkeys = Array();
this.rvalues = Array();
this.rkeyCount = -1;

//请求头类型
this.rtype = 'text';

//初始化xmlhttp
if(window.ActiveXObject){//IE6、IE5
   try { DedeXHTTP = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) { }
   if (DedeXHTTP == null) try { DedeXHTTP = new ActiveXObject("Microsoft.XMLHTTP");} catch (e) { }
}
else{
	 DedeXHTTP = new XMLHttpRequest();
}

//增加一个POST或GET键值对
this.AddKey = function(skey,svalue){
	this.keyCount++;
	this.keys[this.keyCount] = skey;
	svalue = svalue.replace(/\+/g,'$#$');
	this.values[this.keyCount] = escape(svalue);
};

//增加一个Http请求头键值对
this.AddHead = function(skey,svalue){
	this.rkeyCount++;
	this.rkeys[this.rkeyCount] = skey;
	this.rvalues[this.rkeyCount] = svalue;
};

//清除当前对象的哈希表参数
this.ClearSet = function(){
	this.keyCount = -1;
	this.keys = Array();
	this.values = Array();
	this.rkeyCount = -1;
	this.rkeys = Array();
	this.rvalues = Array();
};


DedeXHTTP.onreadystatechange = function(){
	//在IE6中不管阻断或异步模式都会执行这个事件的
	if(DedeXHTTP.readyState == 4){
    if(DedeXHTTP.status == 200){
       if(DedeXHTTP.responseText!=DedeErrCon){
         DedeContainer.innerHTML = DedeXHTTP.responseText;
       }else{
       	 if(DedeShowError) DedeContainer.innerHTML = DedeErrDisplay;
       }
       DedeXHTTP = null;
    }else{ if(DedeShowError) DedeContainer.innerHTML = DedeErrDisplay; }
  }else{ if(DedeShowWait) DedeContainer.innerHTML = DedeWaitDisplay; }
};

//检测阻断模式的状态
this.BarrageStat = function(){
	if(DedeXHTTP==null) return;
	if(typeof(DedeXHTTP.status)!=undefined && DedeXHTTP.status == 200)
  {
     if(DedeXHTTP.responseText!=DedeErrCon){
         DedeContainer.innerHTML = DedeXHTTP.responseText;
     }else{
       	if(DedeShowError) DedeContainer.innerHTML = DedeErrDisplay;
     }
  }
};

//发送http请求头
this.SendHead = function(){
	if(this.rkeyCount!=-1){ //发送用户自行设定的请求头
  	for(;i<=this.rkeyCount;i++){
  		DedeXHTTP.setRequestHeader(this.rkeys[i],this.rvalues[i]); 
  	}
  }
　if(this.rtype=='binary'){
  	DedeXHTTP.setRequestHeader("Content-Type","multipart/form-data");
  }else{
  	DedeXHTTP.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  }
};

//用Post方式发送数据
this.SendPost = function(purl){
	var pdata = "";
	var i=0;
	this.state = 0;
	DedeXHTTP.open("POST", purl, true); 
	this.SendHead();
  if(this.keyCount!=-1){ //post数据
  	for(;i<=this.keyCount;i++){
  		if(pdata=="") pdata = this.keys[i]+'='+this.values[i];
  		else pdata += "&"+this.keys[i]+'='+this.values[i];
  	}
  }
  DedeXHTTP.send(pdata);
};

//用GET方式发送数据
this.SendGet = function(purl){
	var gkey = "";
	var i=0;
	this.state = 0;
	if(this.keyCount!=-1){ //get参数
  	for(;i<=this.keyCount;i++){
  		if(gkey=="") gkey = this.keys[i]+'='+this.values[i];
  		else gkey += "&"+this.keys[i]+'='+this.values[i];
  	}
  	if(purl.indexOf('?')==-1) purl = purl + '?' + gkey;
  	else  purl = purl + '&' + gkey;
  }
	DedeXHTTP.open("GET", purl, true); 
	this.SendHead();
  DedeXHTTP.send(null);
};

//用GET方式发送数据，阻塞模式
this.SendGet2 = function(purl){
	var gkey = "";
	var i=0;
	this.state = 0;
	if(this.keyCount!=-1){ //get参数
  	for(;i<=this.keyCount;i++){
  		if(gkey=="") gkey = this.keys[i]+'='+this.values[i];
  		else gkey += "&"+this.keys[i]+'='+this.values[i];
  	}
  	if(purl.indexOf('?')==-1) purl = purl + '?' + gkey;
  	else  purl = purl + '&' + gkey;
  }
	DedeXHTTP.open("GET", purl, false); 
	this.SendHead();
  DedeXHTTP.send(null);
  //firefox中直接检测XHTTP状态
  this.BarrageStat();
};

//用Post方式发送数据
this.SendPost2 = function(purl){
	var pdata = "";
	var i=0;
	this.state = 0;
	DedeXHTTP.open("POST", purl, false); 
	this.SendHead();
  if(this.keyCount!=-1){ //post数据
  	for(;i<=this.keyCount;i++){
  		if(pdata=="") pdata = this.keys[i]+'='+this.values[i];
  		else pdata += "&"+this.keys[i]+'='+this.values[i];
  	}
  }
  DedeXHTTP.send(pdata);
  //firefox中直接检测XHTTP状态
  this.BarrageStat();
};


} // End Class DedeAjax

//初始化xmldom
function InitXDom(){
  if(DedeXDOM!=null) return;
  var obj = null;
  if (typeof(DOMParser) != "undefined") { // Gecko、Mozilla、Firefox
    var parser = new DOMParser();
    obj = parser.parseFromString(xmlText, "text/xml");
  } else { // IE
    try { obj = new ActiveXObject("MSXML2.DOMDocument");} catch (e) { }
    if (obj == null) try { obj = new ActiveXObject("Microsoft.XMLDOM"); } catch (e) { }
  }
  DedeXDOM = obj;
};

function chkLog(reurlx){
  var taget_obj = document.getElementById('top-right-log');
  myajax = new DedeAjax(taget_obj,false,false,"","","");
  myajax.SendGet2("/inc/log.aspx?"+reurlx);
  DedeXHTTP = null;
}

function chkCart(reurlx){
  var taget_obj = document.getElementById('top-right-cartx');
  myajax = new DedeAjax(taget_obj,false,false,"","","");
  myajax.SendGet2("/inc/cartx.asp?"+reurlx);
  DedeXHTTP = null;
}

function uxhistory(pid){
  var taget_obj = document.getElementById('xhistory');
  myajax = new DedeAjax(taget_obj,false,false,"","","");
  myajax.SendGet2("/inc/uxhistory.asp?pid="+pid);
  DedeXHTTP = null;
}

function sproduct(cid,pid){
  var taget_obj = document.getElementById('sproduct');
  myajax = new DedeAjax(taget_obj,false,false,"","","");
  myajax.SendGet2("/inc/sproduct.asp?cid="+cid+"&pid="+pid);
  DedeXHTTP = null;
}

function chkHot(){
  var taget_obj = document.getElementById('hotkeyword');
  myajax = new DedeAjax(taget_obj,false,false,"","","");
  myajax.SendGet2("/inc/hot.asp");
  DedeXHTTP = null;
}

function chkIfNav(){
  var taget_obj = document.getElementById('if-nav');
  myajax = new DedeAjax(taget_obj,false,false,"","","");
  myajax.SendGet2("/inc/if-nav.asp");
  DedeXHTTP = null;
}

function chkIfPShowLeft(){
  var taget_obj = document.getElementById('if-pshow-left');
  myajax = new DedeAjax(taget_obj,false,false,"","","");
  myajax.SendGet2("/inc/if-pshow-left.asp");
  DedeXHTTP = null;
}

function chkRemark(rid,cate){
  var taget_obj = document.getElementById('xcontent');
  myajax = new DedeAjax(taget_obj,false,false,"","","");
  myajax.SendGet2("/inc/remark.asp?rid="+rid+'&cate='+cate);
  DedeXHTTP = null;
}

function showNowPrice(pid,everyprice){
  var taget_obj = document.getElementById('shownowprice');
  myajax = new DedeAjax(taget_obj,false,false,"","","");
  myajax.SendGet2("/inc/shownowprice.asp?id="+pid+"&everyprice="+everyprice);
  DedeXHTTP = null;
}
//dedeAjax End

reurl=window.location.href;

function xsearch(){
	var keyword=ge("keyword").value;
	String.prototype.trim = function()
	{
	   return this.replace(/(^\s+)|\s+$/g,"");
	}
	var keyword = keyword.trim();
	if(keyword==""){
		alert("请输入关键字");
		return false;
	}
    window.location="/search.aspx?keyword="+keyword;
}

function addBookmark(title,url){
if(window.sidebar) {
window.sidebar.addPanel(title, url,"");
} else if( document.all ) {
window.external.AddFavorite( url, title);
} else if( window.opera && window.print ) {
return true;
}
}

// JavaScript Document
function correctPNG() // correctly handle PNG transparency in Win IE 5.5 & 6.
{
    var arVersion = navigator.appVersion.split("MSIE")
    var xversion = parseFloat(arVersion[1])
    if ((xversion >= 5.5) && (document.body.filters))
    {
       for(var j=0; j<document.images.length; j++)
       {
          var img = document.images[j]
          var imgName = img.src.toUpperCase()
          if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
          {
             var imgID = (img.id) ? "id='" + img.id + "' " : ""
             var imgClass = (img.className) ? "class='" + img.className + "' " : ""
             var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
             var imgStyle = "display:inline-block;" + img.style.cssText
             if (img.align == "left") imgStyle = "float:left;" + imgStyle
             if (img.align == "right") imgStyle = "float:right;" + imgStyle
             if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
             var strNewHTML = "<span " + imgID + imgClass + imgTitle
             + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
             + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
             + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>"
             img.outerHTML = strNewHTML
             j = j-1
          }
       }
    }    
}
window.attachEvent("onload", correctPNG);

function printCityStyle(thisObj,Num){
	if(thisObj.className == "spic-on")return;
	var tabObj = thisObj.parentNode.id;
	var tabList = document.getElementById(tabObj).getElementsByTagName("div");
	for(i=0; i <tabList.length; i++)
	{
		if (i == 0 && i == Num)
		{
		thisObj.className = "spic-on";
		document.getElementById(tabObj+"_Content"+i).style.display = "block";
		continue;
		}else if(i == 0){
		tabList[i].className = "spic";
		document.getElementById(tabObj+"_Content"+i).style.display = "none";
		continue;
		}
		
		if (i == Num)
		{
		thisObj.className = "spic-on";
		document.getElementById(tabObj+"_Content"+i).style.display = "block";
		}else{
		tabList[i].className = "spic";
		document.getElementById(tabObj+"_Content"+i).style.display = "none";
		}
	}
}

function gocp(a,b,c,d,e){

        var Sys = {};
        var ua = navigator.userAgent.toLowerCase();
 		//alert(ua);
		//return false;
       //window.ActiveXObject ? Sys.ie = ua.match(/msie ([\d.]+)/)[1] :
        //document.getBoxObjectFor ? Sys.firefox = ua.match(/firefox\/([\d.]+)/)[1] :
        //window.MessageEvent && !document.getBoxObjectFor ? Sys.chrome = ua.match(/chrome\/([\d.]+)/)[1] :
        //window.opera ? Sys.opera = ua.match(/opera.([\d.]+)/)[1] :
        //window.openDatabase ? Sys.safari = ua.match(/version\/([\d.]+)/)[1] : 0;
        
        //以下进行测试
        //if(Sys.ie) document.write('IE: '+Sys.ie);
        //if(Sys.firefox) document.write('Firefox: '+Sys.firefox);
        //if(Sys.chrome) document.write('Chrome: '+Sys.chrome);
        //if(Sys.opera) document.write('Opera: '+Sys.opera);
        //if(Sys.safari) document.write('Safari: '+Sys.safari);
		
	var lx="li-p-"+e;
	var gx="gou-"+e;
//	alert(c);
//	ge("priceid").innerText=a;
	ge("cprice").innerHTML=c;
	ge("priceid").value=a;
//	ge("psubject").innerText=b;
	ge("psubject").value=b;
//	ge("price").innerText=c;
	ge("price").value=c;
	ge("cpx").innerHTML=b+"&nbsp;"+c+"元";
	var ulx="ul-p";
	var xulx=ge(ulx);
	for(var i=0;i<xulx.getElementsByTagName("li").length;i++){
		if(i==e){
			ge(lx).className="xli-on";
			ge(gx).style.display="block";
		}else{
			ge("li-p-"+i).className="";
			ge("gou-"+i).style.display="none";
		}
	}
}

function printCityStylex(thisObj,Num){
	if(thisObj.className == "nonce")return;
	var tabObj = thisObj.parentNode.id;
	//alert(tabObj);
	var tabList = document.getElementById("main").getElementsByTagName("div");
	var xtabList = document.getElementById("now-t-tab").getElementsByTagName("a");
	for(i=0; i <tabList.length; i++)
	{
		if (i == 0 && i == Num)
		{
		thisObj.className = "nonce";
		document.getElementById(tabObj+"_Content"+i).style.display = "block";
		continue;
		}else if(i == 0){
		xtabList[i].className = "";
		document.getElementById(tabObj+"_Content"+i).style.display = "none";
		continue;
		}
		
		if (i == Num)
		{
		thisObj.className = "nonce";
		document.getElementById(tabObj+"_Content"+i).style.display = "block";
		}else{
		xtabList[i].className = "";
		document.getElementById(tabObj+"_Content"+i).style.display = "none";
		}
	}
}

function remark(rid)
{
	var xmlhttp=createAjax();
	if (xmlhttp) {
		var content=escape(document.getElementById('txtx').value);
		if (content==""){
			alert("评论内容不能为空！");
			return false;
		}
		var content1=document.getElementById('txtx')
		xmlhttp.open('post','/inc/sremark.asp?n='+content+'&rid='+rid+'&cate=pshow',true);
		xmlhttp.onreadystatechange=function() {		 
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				xtext=xmlhttp.responseText;
				if(xtext=="log"){
					alert("会员登录后才能评论");
					window.location="/ucenter/logreg.aspx?"+reurl;
					return false;
				}else{
					alert("评论成功！")
					content1.value="";
				}
			}
			else {
				 
			}
		}
		xmlhttp.send(null); 
	}
	getinfo(rid);
}

function buy(pid) {
 	var xmlhttp=createAjax();
	if (xmlhttp) {
		xmlhttp.open('get','/inc/xbuy.aspx?pid='+pid,true);
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {				 
            	xtxt=xmlhttp.responseText;
				//alert(xtext);
				//return false;
				if(xtxt=="notexist"){
					alert("商品不存在");
					return false;
				}else if(xtxt=="idno"){
					alert("价格有变动，您暂时不能购买，请再次出价！");
					window.location="/pshow/pexpress.aspx?pid="+pid;
					return false;
				}else if(xtxt=="paid"){
					alert("您已经购买过此商品且订单已经支付");
					window.location="/ucenter/order.aspx";
					return false;
				}else if(xtxt=="error"){
					alert("购买失败");
					return false;
				}else{
					alert("购买成功，请马上付款");
					window.location="/shop/pay_address.aspx?orderid="+xtxt;
				}
			}
			else {
				 
			}
		}
		xmlhttp.send(null);	
	}
}

function xbuy(pid) {
 	var xmlhttp=createAjax();
	if (xmlhttp) {
		xmlhttp.open('get','/inc/xbuyreverse.asp?pid='+pid,true);
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {				 
            	xtext=xmlhttp.responseText;
				//alert(xtext);
				if(xtext=="log"){
					alert("请先登录");
					return false;
				}else if(xtext=="error"){
					alert("购买失败");
					return false;
				}else if(xtext=="notexist"){
					alert("商品不存在");
					return false;
				}else if(xtext=="paid"){
					alert("您已经购买过此商品且订单已经支付");
					window.location="/ucenter/order.asp";
				}else if(xtext=="repeat"){
					alert("您已经购买过此商品");
					return false;
				}else{
					alert("购买成功，请马上付款");
					window.location="/shop/pay_address.asp?orderid="+xtext;
				}
			}
			else {
				 
			}
		}
		xmlhttp.send(null);	
	}
}

function refreshx(pid,firstprice){
  var xmlHttp = false;
  //获取服务器时间
  try {
    xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e2) {
      xmlHttp = false;
    }
  }
   
  if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
    xmlHttp = new XMLHttpRequest();
  }
   
  xmlHttp.open("GET", "/inc/xnowwinner.asp?pid="+pid+"&firstprice="+firstprice, false);
  xmlHttp.setRequestHeader("Range", "bytes=-1");
  xmlHttp.send(null);
 
  xtxt=xmlHttp.responseText;
  ge("nowwinner").innerHTML=xtxt;

//bidinfo	
  var xmlHttp = false;
  //获取服务器时间
  try {
    xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e2) {
      xmlHttp = false;
    }
  }
   
  if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
    xmlHttp = new XMLHttpRequest();
  }
   
  xmlHttp.open("GET", "/inc/xrefresh.asp?pid="+pid, false);
  xmlHttp.setRequestHeader("Range", "bytes=-1");
  xmlHttp.send(null);
 
  xtxt=xmlHttp.responseText;
  ge("mybidlist").innerHTML=xtxt;

}

function refreshSave(pid,firstprice,innerid){
 	var xmlhttp=createAjax();
	if (xmlhttp) {
		var rex='/inc/xsave.asp?pid='+pid+"&firstprice="+firstprice;
		xmlhttp.open('get',rex,true);
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {				 
            	xtext=xmlhttp.responseText;
				ge(innerid).innerHTML=xtext;
			}
			else {
				 
			}
		}
		xmlhttp.send(null);	
	}
}

function getServerTime(){
  //因程序执行耗费时间,所以时间并不十分准确,误差大约在2000毫秒以下
  var xmlHttp = false;
  //获取服务器时间
  try {
    xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e2) {
      xmlHttp = false;
    }
  }
   
  if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
    xmlHttp = new XMLHttpRequest();
  }
   
  xmlHttp.open("GET", "/servertime.aspx", false);
  xmlHttp.setRequestHeader("Range", "bytes=-1");
  xmlHttp.send(null);
 
  severtime=xmlHttp.responseText;
  return severtime;
}

function countDown(nowtimes,endtime,id)     
{         
	var xx=new Date(nowtimes);
	var yy=new Date(endtime);
	var seconds = (yy - xx)/1000-1;
	var maxtime = seconds;
   var timer = setInterval(function()     
   {     
		//alert(maxtime);
		var minutes = Math.floor(seconds/60);
		var hours = Math.floor(minutes/60);
		var odays = hours/24;
		var days = Math.floor(hours/24);
		var CDay= days;
		var CHour= hours % 24;
		var CMinute= minutes % 60;
		var CSecond= Math.floor(seconds % 60);
		var CHour = Math.floor(CHour + (odays-CDay));
		
		if(CMinute<10)
		{
			CMinute=""+CMinute;
		}
		if(CHour<10)
		{
			CHour=""+CHour;
		}
		if(CSecond<10)
		{
			CSecond=""+CSecond;
		}
		//document.getElementById("times" + i).innerHTML = CDay+"天"+ CHour + "时" + CMinute + "分" + CSecond + "秒" ;
		
       if(maxtime>=0){        
             msg =  CDay+"天"+ CHour + "时" + CMinute + "分" + CSecond + "秒" ;
			 if(CDay<=0){
				 if(CHour<=0){
					 if(CMinute<=0){
					 	msg=CSecond + "秒" ;
					 }else{
						 msg=CMinute + "分" + CSecond + "秒" ;
					 }
				 }else{
					 msg=CHour + "时" + CMinute + "分" + CSecond + "秒" ;
				 }
			 }
             ge(id).innerHTML="剩余时间："+msg;     
             --maxtime;
			 --seconds;
        }else{        
            clearInterval(timer);
            ge(id).innerHTML="拍卖结束";       
        }        
    }, 1000);
}     

function isEnd(pid,endtime,innerid,cate){
  //因程序执行耗费时间,所以时间并不十分准确,误差大约在2000毫秒以下
  var xmlHttp = false;
  //获取服务器时间
  try {
    xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e2) {
      xmlHttp = false;
    }
  }
   
  if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
    xmlHttp = new XMLHttpRequest();
  }
   
  xmlHttp.open("GET", "/inc/xend.aspx?pid="+pid+"&endtime="+endtime, false);
  xmlHttp.setRequestHeader("Range", "bytes=-1");
  xmlHttp.send(null);
 
  xtxt=xmlHttp.responseText;
  
  if(xtxt=="end"){
	  //document.write("end");
	  //window.location="/pshow/pshowxend.asp?pid="+pid;
	  if(cate=="0"){
		  ge("btnbidx").innerHTML="<a href='/pshow/endreverse.aspx?pid="+pid+"'><index-img src='/theme/default/images/btn-view-bid.png' class='vaimg' /></a>&nbsp;<a href='javascript:;' onclick=\"xbuy(\'"+pid+"\');\"><index-img src='/theme/default/images/gotobuy.png' class='vaimg' /></a> （您可将已用的趣拍币抵偿商品价格购买商品）";
	  }else{
		  ge("btnbid").innerHTML="<span class='endedprice'>拍卖结束</span><br><br><a href='/pshow/endexpress.aspx?pid="+pid+"'><index-img src='/theme/default/images/btn-view-bid.png' class='vaimg' /></a>&nbsp;<a href='javascript:;' onclick=\"buy(\'"+pid+"\');\"><index-img src='/theme/default/images/gotobuy.png' class='vaimg' /></a> （您可将已用的趣拍币抵偿商品价格购买商品）";
	  }
	  return false;
  }
  //return severtime;
}

//isBid
function isBid(pid,cate){
  //因程序执行耗费时间,所以时间并不十分准确,误差大约在2000毫秒以下
  var xmlHttp = false;
  //获取服务器时间
  try {
    xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e2) {
      xmlHttp = false;
    }
  }
   
  if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
    xmlHttp = new XMLHttpRequest();
  }
   
  xmlHttp.open("GET", "/inc/xisbid.asp?pid="+pid, false);
  xmlHttp.setRequestHeader("Range", "bytes=-1");
  xmlHttp.send(null);
 
  xtxt=xmlHttp.responseText;
  
  if(xtxt=="yes"){
	  if(cate=="pshowx"){
		  window.location="bidreverse.asp?pid="+pid;
	  }
	  return false;
  }else if(xtxt=="no"){
	  if(cate=="antibid"){
		  window.location="preverse.asp?pid="+pid;
	  }
	  return false;
  }
}

//getQB
function getQB(){
 	var xmlhttp=createAjax();
	if (xmlhttp) {
		var rex='/inc/xgetQB.asp';
		xmlhttp.open('get',rex,true);
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {				 
            	xtext=xmlhttp.responseText;
				ge("qb").innerHTML=xtext;
			}
			else {
				 
			}
		}
		xmlhttp.send(null);	
	}
}

//getMRightinfo
function getMR(){
 	var xmlhttp=createAjax();
	if (xmlhttp) {
		var rex='/inc/mrightinfo.aspx';
		xmlhttp.open('get',rex,true);
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {				 
            	xtext=xmlhttp.responseText;
				ge("mright-info").innerHTML=xtext;
			}
			else {
				 
			}
		}
		xmlhttp.send(null);	
	}
}

//getFCK
function getEditorHTMLContents(EditorName) {
    var oEditor = FCKeditorAPI.GetInstance(EditorName);
    return(oEditor.GetXHTML(true));
}
//show
function chkshow(){
	var pid=ge("pid").value;
	var picb1=ge("picb1").value;
	var picb2=ge("picb2").value;
	var picb3=ge("picb3").value;
	var picb4=ge("picb4").value;
	var content=$('#content').val();
	//alert(content);
	//return false;
 	var xmlhttp=createAjax();
	if (xmlhttp) {
		var rex='/inc/xshow.asp?pid='+pid+"&picb1="+picb1+"&picb2="+picb2+"&picb3="+picb3+"&picb4="+picb4+"&content="+escape(content);
		xmlhttp.open('get',rex,true);
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {				 
            	xtxt=xmlhttp.responseText;
				if(xtxt=="log"){
					alert("未登录");
					return false;
				}else if(xtxt=="pid"){
					alert("商品不存在");
					return false;
				}else if(xtxt=="ok"){
					ge("xtip").innerHTML="修改成功！";
					return false;
				}else{
					alert("上传失败！");
					return false;
				}
			}
			else {
				 
			}
		}
		xmlhttp.send(null);	
	}
}

//upic
function uploadfile(a,b,x,y,p,c,i){
	window.open("upic.asp?pid="+a+"&pvid="+b+"&cate="+c+"&x="+x+"&y="+y+"&opicb="+p+"&ifix="+i+"", null, "height=80,width=400,left="+(window.screen.width -400)/2+" ,top="+(window.screen.height-80)/2+",status=yes,toolbar=no,menubar=no,location=no");
}

function MM_openBrWindow(theURL,winName,features){
  window.open(theURL,winName,features);
}

//addviews
function addviews(id,cate){
 	var xmlhttp=createAjax();
	if (xmlhttp) {
		var rex="/inc/xaddviews.asp?id="+id+"&cate="+cate;
		xmlhttp.open('get',rex,true);
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {				 
            	//xtext=xmlhttp.responseText;
			}
			else {
				 
			}
		}
		xmlhttp.send(null);	
	}
}

//select and delete
function xSelectAll(box)         
     {
            for(var i=0;i <document.form1.elements.length;i++) 
            { 
                    var e=document.form1.elements[i]; 
                    if((e.type=='checkbox'))
                    {  
                       var o=e.name.lastIndexOf('ckbIndex'); 
                       if(o!=-1) 
                       {
                          e.checked=box.checked; 
                       } 
                    }
            }
     }

	function del() {
            len = document.form1.elements.length;
			var count=0;
			var i=0;
			for(i=0;i<len;i++){
				var elname = document.form1.elements[i].name;
				 if (document.form1.elements[i].checked==true) {
					count++;
				}
			}
                          
                  if(count==0){
				alert("请选择您要删除的记录！");
				return false;
			}
        
		if(confirm('你确定要删除所选择的记录吗？')){
				document.form1.of.value="d";
				document.form1.submit();
      			return false;
			}else{
				return false;				
			}
			return false;
	}
	
//loadSubLanmu
function loadSubLanmu(parentid,sel,nowid,lanmu,dname){

	$.ajax({
		type: "POST",
		url: "/inc/xloadAll.aspx",
		data: {
			ac: "subLanmu",
			parentid: parentid,
			lanmu:lanmu
		},
		dataType: "text",
		success: function (data) {
			//alert(data);
			initSel(sel,data,dname);
			isSelected(sel,nowid);
			
		}
	});
	
}
//loadLanmuCate
function loadLanmuCate(parentid,sel,nowid,lanmuId,dname){

	$.ajax({
		type: "POST",
		url: "/inc/xloadAll.aspx",
		data: {
			ac: "lanmuCate",
			parentid: parentid,
			lanmuId:lanmuId
		},
		dataType: "text",
		success: function (data) {
			//alert(data);
			initSel(sel,data,dname);
			isSelected(sel,nowid);
			
		}
	});
	
}

function initSel(sel,data,dname){
	var rtxt=unescape(data);
	clearOptions(sel);
	if(dname==""){
		addOptions(sel,"","——");
	}else{
		addOptions(sel,"",dname);
	}
	if(rtxt.length>0){
		xrtxt = rtxt.split(",");
		if(xrtxt.length>0)   
		{
			for(var i=0;i<xrtxt.length;i++)
			{
				srtxt=xrtxt[i].split("|");
				addOptions(sel,srtxt[0],srtxt[1])
			}
		}
	}
}

	
//loadCate
function loadCate(parentid,sel,nowid,lanmu,snowid,dname){
	
	$.ajax({
		type: "POST",
		url: "/inc/xloadCate.aspx",
		data: {
			ac: "cate",
			parentid: parentid,
			lanmu:lanmu
		},
		dataType: "text",
		success: function (data) {
			initSel(sel,data,dname);
			isSelected(sel,nowid);
			
		}
	});
	
}

//changecate
function cloadCate(parentid,sel,nowid,lanmu,snowid){
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var linkurl="/inc/xloadCate.aspx?parentid="+parentid+"&lanmu="+lanmu+"&nowid="+nowid;
	http_request.open("GET",linkurl,false);
	http_request.send(null);
	
	var xsubcate="";
	var rtxt=unescape(http_request.responseText);
	clearOptions(sel);
	addOptions(sel,"","——")
	if(rtxt.length>0){
		xrtxt = rtxt.split(",");
		if(xrtxt.length>0)   
		{
			for(var i=0;i<xrtxt.length;i++)
			{
				srtxt=xrtxt[i].split("|");
				if(sel=="subcate"){
					if(i==0){
						xsubcate=srtxt[0];
					}
				}
				addOptions(sel,srtxt[0],srtxt[1])
			}
		}
	}
	isSelected(sel,nowid);
	
}

function initx(parentid,sel,nowid,lanmu,cate){
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}

	var linkurl="/inc/loadCate.aspx?parentid="+parentid+"&lanmu="+lanmu+"&nowid="+nowid+"&cate="+cate;
	http_request.open("GET",linkurl,false);
	http_request.send(null);
	
	addOptions(sel,"0","无");
	var rtxt=unescape(http_request.responseText)
	if(rtxt.length>0){
		xrtxt = rtxt.split(",");
		if(xrtxt.length>0)   
		{
			clearOptions(sel);
	        addOptions(sel,"0","无");
			for(var i=0;i<xrtxt.length;i++)
			{
				srtxt=xrtxt[i].split("|");
				addOptions(sel,srtxt[0],srtxt[1])
			}
		}
	}
	isSelected(sel,nowid);
}


//Options
function addOptions(sel,val,txt){
	var x=document.getElementById(sel)
	var el;
	el=document.createElement("option");
	el.text=txt; 
	el.value=val;
	x.options.add(el);
}

function clearOptions(sel){
	var x=document.getElementById(sel);
	x.options.length=0; 
}

function isSelected(sel,val){
	var x=document.getElementById(sel);
	for(var i=0;i<x.options.length;i++){
		if(x.options[i].value==val){
			x.options[i].selected=true;
		}
	}
}

//收藏夹
function AddFavorite(sURL, sTitle)
{
    try
    {
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e)
    {
        try
        {
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e)
        {
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}

//主页
function setHomepage()
{
 if (document.all)
    {
        document.body.style.behavior='url(#default#homepage)';
  document.body.setHomePage('http://www.noso.cn');
 
    }
    else if (window.sidebar)
    {
    if(window.netscape)
    {
         try
   {  
            netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");  
         }  
         catch (e)  
         {  
    alert( "该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项 signed.applets.codebase_principal_support 值该为true" );  
         }
    } 
    var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
    prefs.setCharPref('browser.startup.homepage','http://www.noso.cn');
 }
}


function showhide(xid,disp){
	var obj = ge(xid);
	obj.style.display=disp;
}

function chkbg(x){
	if(x=="on"){
		ge("xsearchx").className="searchinputx";
	}else if(x=="off"){
		xv=ge("keyword").value;
		if(xv==""){
			ge("xsearchx").className="searchinput";
		}
	}
}

function clear(){
Source=document.body.firstChild.data;
document.open();
document.close();
document.title="No Source";
document.body.innerHTML=Source;
}

//pop-box
function mask() {
	var cHeight = parseFloat(document.documentElement.clientHeight);
	var bWidth = parseFloat(document.documentElement.scrollWidth);
	var bHeight = parseFloat(document.documentElement.scrollHeight);
	if (bHeight < cHeight) {
		bHeight = cHeight;
	}
		
	var xbg = document.getElementById("bg");
	var styleStr = "top:0px;left:0px;position:absolute;width:" + bWidth + "px;height:" + bHeight + "px;z-index:8;background:#000;filter:alpha(opacity=50);opacity:0.5;-moz-opacity:0.5;display:block;";
	xbg.style.cssText = styleStr;

}

//nmask
function nmask() {
	document.getElementById('bg').style.display = 'none';
}

//loadprogress
function loadprogress(xid,showid,ifedit){
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var linkurl="/inc/xloadAll.aspx?ac=progress&xid="+xid+"&ifedit="+ifedit;
	http_request.open("GET",linkurl,false);
	http_request.send(null);
	
	var rtxt=unescape(http_request.responseText);
	ge(showid).innerHTML=rtxt;
}

function saveprogress(){
	
	var info=ge("info").value;
	var xid=ge("xid").value;
	var pid=ge("progressid").value;
	
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var linkurl="/inc/xsaveAll.aspx?ac=progress&info="+escape(info)+"&xid="+xid+"&pid="+pid;
	http_request.open("GET",linkurl,false);
	http_request.send(null);
	
	var rtxt=unescape(http_request.responseText);
	//ge("progressremark").value=rtxt;
	if(rtxt=="ok"){
		loadprogress(xid,"progress","yes");
		ge("info").value="";
	}
}

function delprogress(xid,parentid) {
	var an = confirm("确定要删除该记录吗?");
	if (an) {
		var sendurl = "/inc/xloadAll.aspx?ac=delprogress&xid=" + xid;
		var xmlHttp = xHttp();
		xmlHttp.open("GET", sendurl, false);
		xmlHttp.setRequestHeader("Range", "bytes=-1");
		xmlHttp.send(null);
		var rtxt = unescape(xmlHttp.responseText);
		loadprogress(parentid,"progress","yes");
	}
}

//loadexpress
function loadexpressprogress(xid,showid,ifedit){
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var linkurl="/inc/xloadAll.aspx?ac=expressprogress&xid="+xid+"&ifedit="+ifedit;
	http_request.open("GET",linkurl,false);
	http_request.send(null);
	
	var rtxt=unescape(http_request.responseText);
	ge(showid).innerHTML=rtxt;
}

function saveexpressprogress(){
	
	var info=ge("expressprogressinfo").value;
	var xid=ge("xid").value;
	var pid=ge("expressprogressid").value;
	
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var linkurl="/inc/xsaveAll.aspx?ac=expressprogress&info="+escape(info)+"&xid="+xid+"&pid="+pid;
	http_request.open("GET",linkurl,false);
	http_request.send(null);
	
	var rtxt=unescape(http_request.responseText);
	//ge("expressremark").value=rtxt;
	if(rtxt=="ok"){
		loadexpressprogress(xid,"expressprogress","yes");
		ge("expressprogressinfo").value="";
	}
}

function delexpressprogress(xid,parentid) {
	var an = confirm("确定要删除该记录吗?");
	if (an) {
		var sendurl = "/inc/xloadAll.aspx?ac=delexpressprogress&xid=" + xid;
		var xmlHttp = xHttp();
		xmlHttp.open("GET", sendurl, false);
		xmlHttp.setRequestHeader("Range", "bytes=-1");
		xmlHttp.send(null);
		var rtxt = unescape(xmlHttp.responseText);
		loadexpressprogress(parentid,"expressprogress","yes");
	}
}

//loadorderitems
function loadorderitems(xid,showid,ifedit){
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var linkurl="/inc/xloadAll.aspx?ac=orderitems&xid="+xid+"&ifedit="+ifedit;
	http_request.open("GET",linkurl,false);
	http_request.send(null);
	
	var rtxt=unescape(http_request.responseText);
	ge(showid).innerHTML=rtxt;
}

function saveorderitems(){
	
	var pname=ge("pname").value;
	var qty=ge("qty").value;
	var stotal=ge("stotal").value;
	var xid=ge("xid").value;
	var contractno=ge("contractno").value;
	var pid=ge("orderitemsid").value;
	var orderitemsinfo=ge("orderitemsinfo").value;
	
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var linkurl="/inc/xsaveAll.aspx?ac=orderitems&pname="+escape(pname)+"&qty="+qty+"&stotal="+stotal+"&xid="+xid+"&pid="+pid+"&contractno="+escape(contractno)+"&orderitemsinfo="+escape(orderitemsinfo);
	http_request.open("GET",linkurl,false);
	http_request.send(null);
	
	var rtxt=unescape(http_request.responseText);
	//ge("expressremark").value=rtxt;
	if(rtxt=="ok"){
		loadorderitems(xid,"orderitems","yes");
		ge("pname").value="";
		ge("qty").value="";
		ge("stotal").value="";
		ge("orderitemsinfo").value="";
		ge("contractno").value="";
		ge("orderitemsid").value="";
	}
}

function delorderitems(xid,parentid) {
	var an = confirm("确定要删除该记录吗?");
	if (an) {
		var sendurl = "/inc/xloadAll.aspx?ac=delorderitems&xid=" + xid;
		var xmlHttp = xHttp();
		xmlHttp.open("GET", sendurl, false);
		xmlHttp.setRequestHeader("Range", "bytes=-1");
		xmlHttp.send(null);
		var rtxt = unescape(xmlHttp.responseText);
		loadorderitems(parentid,"orderitems","yes");
	}
}

function addFavorite2() {
    var url = window.location;
    var title = document.title;
    var ua = navigator.userAgent.toLowerCase();
    if (ua.indexOf("360se") > -1) {
        alert("由于360浏览器功能限制，请按 Ctrl+D 手动收藏！");
    }
    else if (ua.indexOf("msie 8") > -1) {
        window.external.AddToFavoritesBar(url, title); //IE8
    }
    else if (document.all) {
  try{
   window.external.addFavorite(url, title);
  }catch(e){
   alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
  }
    }
    else if (window.sidebar) {
        window.sidebar.addPanel(title, url, "");
    }
    else {
  alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
    }
}

//loadSelect
function loadSel(parentid,sel,nowid,ac,snowid,lcate,lanmu,dname){
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var linkurl="/inc/xloadAll.aspx?ac="+ ac +"&parentid="+ parentid +"&snowid="+ snowid +"&lanmu="+ lanmu+"&lcate="+lcate;
	http_request.open("GET",linkurl,false);
	http_request.send(null);
	
	var rtxt=unescape(http_request.responseText);
	clearOptions(sel);
	if(!(dname=="")){
		addOptions(sel,"",dname);
	}else{
		addOptions(sel,"","——");
	}
	if(rtxt.length>0){
		xrtxt = rtxt.split(",");
		if(xrtxt.length>0)   
		{
			for(var i=0;i<xrtxt.length;i++)
			{
				srtxt=xrtxt[i].split("|");
				addOptions(sel,srtxt[0],srtxt[1])
			}
		}
	}
	isSelected(sel,snowid);
	
}

//loadCheckbox
function loadCheckbox(showid,sel,lanmu,lcate,dname,parentid,cvalues){
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var linkurl="/inc/xloadAll.aspx?ac=loadCheckbox&sel="+sel+"&lanmu="+ lanmu+"&lcate="+lcate+"&parentid="+parentid+"&cvalues="+cvalues;
	//alert(linkurl);
	http_request.open("GET",linkurl,false);
	http_request.send(null);
	
	var rtxt=unescape(http_request.responseText);
	if(!(dname=="")){
		rtxt=dname+"："+rtxt;
	}
	//alert(rtxt);
	$("#"+showid).html(rtxt);
	//ge(showid).innerHTML=rtxt;

}

//loadSubLanmus
function loadSubLanmus(showid,sel,lanmu,lcate,dname,parentid,cvalues){
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var linkurl="/inc/xloadAll.aspx?ac=loadSubLanmus&lanmu="+ lanmu+"&sel="+sel+"&lcate="+lcate+"&parentid="+parentid+"&cvalues="+cvalues;
	
	http_request.open("GET",linkurl,false);
	http_request.send(null);
	
	var rtxt=unescape(http_request.responseText);
	if(!(dname=="")){
		rtxt=dname+"："+rtxt;
	}
	$("#"+showid).html(rtxt);
}

//loadCheckboxAreas
function loadCheckboxAreas(showid,sel,lanmu,lcate,dname,parentid,cvalues,others){
	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var linkurl="/inc/xloadAll.aspx?ac=loadCheckboxAreas&lanmu="+ lanmu+"&lcate="+lcate+"&parentid="+parentid+"&cvalues="+cvalues+"&others="+others;
	//alert(linkurl);
	http_request.open("GET",linkurl,false);
	http_request.send(null);
	
	var rtxt=unescape(http_request.responseText);
	if(!(dname=="")){
		rtxt=dname+"："+rtxt;
	}
	ge(showid).innerHTML=rtxt;
}

function autoHeight()
{
	var w = document.body.clientWidth;
	//alert(w);
	if (w > 750) {
		ge("smallmenu").style.display = "none";
	}
}

//全选、取消全选的事件
function selectAll(id,cname){
	if ($("#"+id).attr("checked")) {
		$("[name="+cname+"]:checkbox").attr("checked", true);
	} else {
		$("[name="+cname+"]:checkbox").attr("checked", false);
	}
}

//取checkbox值
function chkvalues(ckbname) {
	var id_array = new Array();
	$('input[name="'+ckbname+'"]:checked').each(function () {
		id_array.push($(this).val());
	});
	var idstr = id_array.join(',');
	return idstr;
}

    function xAlert(messa,returnv) {
        if ($("#xAlert").length == 0) $("body").append('<div id="xAlert"></div>');

        $("#xAlert").dialog({
            bgiframe: true,
            autoOpen: false,
            width: 500,
            modal: true,
            title: "提示",
            buttons: {
                '关闭': function () {
                    $(this).dialog('close');
                }
            }
        });

        $("#xAlert").html(messa);
        $("#xAlert").dialog('open');
        return returnv;
    }

    function xConfirm(messa,callback){
        if($("#dialogconfirm").length==0){
            $("body").append('<div id="dialogconfirm"></div>');
        }
        $("#dialogconfirm").dialog({
            bgiframe: true,
            autoOpen: false,
            width: 500,
            modal: true,
            title: "提示",
            buttons: {
                '确定': function () {
                    callback();
                    $(this).dialog('close');
                },
                '取消': function () {
                    $(this).dialog('close');
                }
            }
        });
        $("#dialogconfirm").html(messa);
        $("#dialogconfirm").dialog('open');

    }

    function xTips(messa,showId,cate) {
		if(cate=="alert"){
			css="red";
			returnv=false;
		}else if(cate=="success"){
			css="green";
			returnv=true;
		}
		messa="<span class=\""+css+"\">"+messa+"</span>";
        $("#"+showId).html(messa);
        return returnv;
    }

    function SKTQuery() {
        var keywords = $("#SKSearchInput").val();
        if (keywords == "") {
            alert("请输入关键词");
            return false;
        }
        window.location = "/search.aspx?keywords=" + keywords;
        return false;
    }
