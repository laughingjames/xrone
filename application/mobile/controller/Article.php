<?php
/**
 * @author    李梓钿
 *
 */
 
namespace app\mobile\controller;
use app\common\controller\Base;
use think\Db;
class Article extends Base
{
 	function index(){
 		
		$id=(int)input('param.id');
		
		if(in_wechat())
		$this->assign('signPackage',wechat()->getJsSign(request()->url(true)));	
		
		$this->assign('article',Db::name('wechat_news_reply')->where('nr_id',$id)->find());
		
        return $this->fetch();
    }
	
}
