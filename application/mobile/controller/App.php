<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/2/12
 * Time: 下午5:17
 */

namespace app\mobile\controller;

use think\Db;

class App extends MobileBase
{
        //已提现
    function parttimejob(){
        if(request()->isPost()){
            $uid=input('post.')['uid'];
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
        $res=Db::name('parttime_job')
            ->where('is_end',0)
            ->order('time', 'desc')
            ->select();
        $data=[];
        $n=0;
        foreach ($res as $val){
            $data[$n++]=$val;
        }

        $this->assign('top_title','兼职/Parttime-Job');
        $this->assign('list', $data);

        return $this->fetch();
    }

    function parttimejoblist(){
        $this->assign('top_title','兼职/Parttime-Job');
        $this->assign('SEO',['title'=>'搜索/Search-'.config('SITE_TITLE')]);
        $this->assign('flag','search');
        return $this->fetch();

    }

}