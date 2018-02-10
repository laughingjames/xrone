<?php
/**
 *
 * @author    李梓钿
 *会员中心
 */
namespace app\common\controller;
use think\Db;
class HomeBase extends Base{	
	
	protected function _initialize() {
		parent::_initialize();		
		
		if(request()->isMobile()&&('mobile'!=request()->module())){
			header('Location:'.request()->domain().'/mobile/');
			die();
		}
		//设置导航
		$this->assign('top_nav',osc_goods()->get_goods_category());   
		
	}



	
}
