<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/12/26
 * Time: 下午9:51
 */
namespace app\api\controller;
use think\Config;
use think\Db;

class Index{

    public function index(){
        return "api/index";
    }
    /**
     * 获取请求返回数据
     * @param string $type
     * @return array
     */
    public function getUserInfo($type='json'){
        if(!in_array($type,['json','xml'])){
            $type='json';
        }
        Config::set('default_return_type',$type);
        $data=[
            'code'=>200,
            'result'=>[
                'username'=>'julis',
                'email'=>'6176694@qq.com'
            ]
        ];

        return $data;
    }
    public function test(){
        return "dsaf";
    }

    /**
     * 获取api工作申请
     */
    public function apiGetInfo(){
        $res=Db::table('wechat_apply_job apply,wechat_parttime_job job')
            ->where('job.id=apply.job_id')
            ->order('apply.time desc')
            ->field('name,phone_no,passport_no,country,job_name,apply.time,apply.id apply_id,status')
            ->select();
        $data=[];
        $n=0;
        foreach ($res as $val){
            $data[$n++]=$val;
        }
        echo json_encode($data);
    }
    /**
     * 获取api工作信息
     */
    public function apiGetJobInfo(){
        $res=Db::table('wechat_parttime_job')
            ->order('time desc')
            ->select();
        $data=[];
        $n=0;
        foreach ($res as $val){
            $data[$n++]=$val;
        }
        echo json_encode($data);

    }
}