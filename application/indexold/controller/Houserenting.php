<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/1/3
 * Time: 下午9:41
 */

namespace app\index\controller;


use think\Controller;
use think\Db;
class Houserenting extends Controller
{
    public function index(){

        $res=Db::table('wechat_house_renting')
            ->order('id','desc')
            ->select();
        $data=[];
        $n=0;
        foreach ($res as $val){
            $data[$n++]=$val;
        }
        $this->assign('list',$data);
        return $this->fetch('index/houserenting');
    }


    public function applyform(){
        $house_id=$this->request->param('house_id');
        $this->assign('house_id',$house_id);
        return $this->fetch('index/houserentingApply');
    }

    public function apply(){

        $name=$this->request->param('name');
        $name = iconv('gbk', 'utf-8', $name);
        $phone_no=$this->request->param('phone_no');
        $passport_no=$this->request->param('passport_no');
        $house_id=$this->request->param('house_id');
        $data = [
            'name' => $name,
            'phone_no' => $phone_no,
            'passport_no' =>$passport_no,
            'house_id'=>$house_id,
        ];

        $res = Db::table('wechat_apply_house')->insert($data);
        Db::table('wechat_house_renting')->where('id',$house_id)->setInc('apply_counts');

    }
}