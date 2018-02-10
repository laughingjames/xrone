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
class Housemanage extends Controller
{
    public function index(){
        if(Admin::checkLogin()) {


            $res = Db::table('wechat_house_renting show,wechat_apply_house apply')
                ->where('show.id=apply.house_id')
                ->order('apply.time desc')
                ->field('name,phone_no,passport_no,house_id,apply.time time,apply_counts,apply.id apply_id')
                ->select();
            $data = [];
            $n = 0;
            foreach ($res as $val) {
                $data[$n++] = $val;
            }
            $this->assign('list', $data);
            return $this->fetch('index/housemanage');
        }else{
            return $this->error('尚未登陆','index/index');
        }
    }
    public function del($apply_id){


        $res=Db::table('wechat_apply_house')
            ->where('id',$apply_id)
            ->field('house_id')
            ->select();
        $house_id=$res[0]['house_id'];

        Db::table('wechat_apply_house')
            ->where('id',$apply_id)
            ->delete();


        Db::table('wechat_house_renting')
            ->where('id',$house_id)
            ->setDec('apply_counts');

    }

}