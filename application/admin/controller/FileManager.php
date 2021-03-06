<?php
/**
 * oscshop2 B2C电子商务系统
 *
 * ==========================================================================
 * @link      http://www.oscshop.cn/
 * @copyright Copyright (c) 2015-2016 oscshop.cn. 
 * @license   http://www.oscshop.cn/license.html License
 * ==========================================================================
 * 
 * 多用户图片管理器(只显示自己目录下的图片)
 * 
 * 图片只能一张张上传
 */
namespace app\admin\controller;
use app\common\controller\ImageManager;
class FileManager extends ImageManager{
	

	protected function _initialize(){	
		parent::_initialize();	
		define('UID',osc_service('admin','user')->is_login());
        if(!UID){
            exit();
        }
        $admin_name=session('user_auth.username');
		$this->init('hello_'.$admin_name);
	}
}
?>