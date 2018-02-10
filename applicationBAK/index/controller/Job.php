<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/1/3
 * Time: 下午9:41
 */

namespace app\index\controller;

use think\Controller;
use app\index\model\Version;
use app\index\model\ParttimeJob as ParttimeJobModel;
use think\Db;
use think\Request;
use app\index\model\User as UserModel;
class Job extends Controller
{
    public function index()
    {
        $res=Db::table('wechat_parttime_job')
            ->where('is_end',0)
            ->order('time', 'desc')
            ->select();
        $data=[];
        $n=0;
        foreach ($res as $val){
            $data[$n++]=$val;
        }

        $this->assign('title','Parttime-job');
        $this->assign('list', $data);
        return $this->fetch('index/parttimejob');
    }
    public function apply(Request $request){
        $user=new UserModel();
        if(request()->isPost()){
            $uid=input('post.')['id'];
            $job_id=input('post.')['job_id'];


            $preview =db('apply_job')
                ->where(['uid'=>$uid,'job_id'=>$job_id])
                ->find();

            if($preview){
                $this->error('This user has already applied.');
            }

            $user = $user->where(['id'=>$uid])->find();
            $data=[
                'name'=>$user->name,
                'phone_no'=>$user->phone_no,
                'passport_no'=>$user->passport_no,
                'country'=>$user->country,
                'job_id'=>$job_id,
                'uid'=>$uid,
            ];
            $res=db('apply_job')->insert($data);

            Db::table('wechat_parttime_job')->where('id',$job_id)->setInc('apply_counts');
            if($res){
                $this->success('Apply Successful.','/index/index/parttimejob');
            }else{
                $this->error('Failed.');
            }
        }
    }



}