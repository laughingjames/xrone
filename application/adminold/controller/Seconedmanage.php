<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/1/4
 * Time: 下午7:16
 */

namespace app\admin\controller;
use app\admin\model\Admin;
use think\Controller;
use think\Db;

class Seconedmanage extends Controller
{
    public function index(){

        if(Admin::checkLogin()){
            $res=Db::table('wechat_seconed_hand')
                ->order('id asc')
                ->paginate(config(20));
            $data=[];
            $n=0;
            foreach ($res as $val){
                $data[$n++]=$val;
            }
            $this->assign('list',$data);
            return $this->fetch('index/seconedhand');
        }else{
            return $this->error('尚未登陆','index/index');
        }
    }

    public function del($id){
        $res=Db::table('wechat_seconed_hand')
            ->where('id',$id)
            ->delete();
    }

}