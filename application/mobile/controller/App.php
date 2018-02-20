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


    /**
     * 展示兼职信息
     * @return mixed
     */
    function parttimejoblist(){
        $part_time_joblist=Db::name('parttime_job')->where('is_end',0)->order('time', 'desc')->select();
        $this->assign('joblist',$part_time_joblist);
        $this->assign('top_title','兼职/Parttime-Job');
        $this->assign('SEO',['title'=>'搜索/Search-'.config('SITE_TITLE')]);
        $this->assign('flag','search');
        return $this->fetch();
    }

    //兼职详情
    function jobdetail(){

        if(request()->isPost()){
            $job_id=(int)input('post.id');
            cookie('jump_url',request()->url(true).'/id/'.$job_id);
            $job_name=Db::name('parttime_job')->field('job_name')->where('id',$job_id)->find()['job_name'];
            if(empty($job_name)){
                return ['error'=>'兼职工作不存在！！/Parttime job do not exist!!'];
            }
            $uid=user('uid');
            if(!$uid){
                return ['error'=>'请先登录/Please Log on First! ','url'=>"/mobile/login/login"];
            }
            if(Db::name('apply_job')->where(array('job_id'=>$job_id,'uid'=>$uid))->find()){
                return ['error'=>'你已经申请/You already applied.'];
            }
            Db::name('parttime_job')->where('id',$job_id)->setInc('apply_counts');
            Db::name('apply_job')->insert(array('uid'=>$uid, 'job_id'=>$job_id));
            storage_user_action($uid,user('username'),config('FRONTEND_USER'),'申请了'.$job_name.'工作');
           return ['success'=>'申请成功/Apply Success', 'url'=>"/mobile/app/parttimejoblist"];
        }

        $job_detail=Db::name('parttime_job')->where('id',input('param.id'))->find();
        if(empty($job_detail)){
            $this->error('兼职工作不存在！！/Parttime job do not exist!!');
        }
        $this->assign('SEO',['title'=>'兼职/Parttime Job-'.config('SITE_TITLE')]);
        $this->assign('flag','search');
        $this->assign('top_title',$job_detail['job_name']);
        $this->assign('jobdetail',$job_detail);
        return $this->fetch();
    }


    /**
     * 展示房源信息
     * @return mixed
     */
    public function house_renting(){

        $this->assign('top_title','租房/HouseRenting');
        $this->assign('SEO',['title'=>'租房/HouseRenting-'.config('SITE_TITLE')]);
        $this->assign('flag','search');
        return $this->fetch();
    }
}