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
 * @author    李梓钿
 *
 */
 
namespace app\index\controller;
use app\common\controller\HomeBase;
class Index extends HomeBase
{
    public function index()
    {    			
		return $this->fetch();
   
    }
}
