<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/2/1
 * Time: 下午10:07
 */

namespace app\admin\controller;

use app\admin\model\Admin;
use think\Controller;
use think\Db;

class Userinfo extends Controller
{
    public function index(){
        if(Admin::checkLogin()) {

            $res = Db::table('wechat_user')
               ->select();
            $data = [];
            $n = 0;
            foreach ($res as $val) {
                $data[$n++] = $val;
            }
            $this->assign('list', $data);
            return $this->fetch('index/userinfo');
        }else{
            return $this->error('尚未登陆','index/index');
        }
    }
    public function del($apply_id){

        Db::table('wechat_user')
            ->where('id',$apply_id)
            ->delete();

    }
}