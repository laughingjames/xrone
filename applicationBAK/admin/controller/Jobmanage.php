<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/1/3
 * Time: 下午9:41
 */

namespace app\admin\controller;

use app\admin\model\Admin;
use think\Controller;
use think\Db;
class Jobmanage extends Controller
{

    public function index(){
        if(Admin::checkLogin()){
            $res=Db::table('wechat_apply_job apply,wechat_parttime_job job')
                ->where('job.id=apply.job_id')
                ->order('apply.time desc')
                ->field('name,phone_no,passport_no,country,job_name,apply.time,apply.id apply_id,status')
                ->paginate(50);
            $data=[];
            $n=0;
            foreach ($res as $val){
                $data[$n++]=$val;
            }
            $this->assign('list',$res);
            $this->assign('title',"工作申请查看表");
            return $this->fetch('index/jobmanage');
        }else{
            return $this->error('尚未登陆','index/index');
        }

    }

    public function del($apply_id){
        $res=Db::table('wechat_apply_job')
            ->where('id',$apply_id)
            ->field('job_id')
            ->select();

        $job_id=$res[0]['job_id'];

        Db::table('wechat_apply_job')
            ->where('id',$apply_id)
            ->delete();

        Db::table('wechat_parttime_job')
            ->where('id',$job_id)
            ->setDec('apply_counts');
    }
    public function updateStatus($id,$value){

            $res=Db::table('wechat_apply_job')
            ->where('id',$id)
            ->update(['status'=>$value]);

        $returnStatus="";
        switch($value) {
            case'0':
                $returnStatus = "已申请";
                break;
            case'1':
                $returnStatus = "完成";
                break;
            case'2':
                $returnStatus = "申请未去";
                break;
            case'3':
                $returnStatus = "超额人员";
                break;
        }

            if(!empty($res)){
                echo $returnStatus;
            }else{
                echo "Faied";
            }
    }

}