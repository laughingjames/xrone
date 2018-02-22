<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
class Index extends Controller
{


    public function index()
    {
        $this->assign('title','HelloHelper');
        $this->view->engine->layout(true);
        return $this->fetch('index');
    }
    public function parttimejob()
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
//    public function parttimejobtest()
//    {
//
//        $res=Db::table('wechat_parttime_job')
//            ->where('is_end',0)
//            ->order('time', 'desc')
//            ->select();
//        $data=[];
//        $n=0;
//        foreach ($res as $val){
//            $data[$n++]=$val;
//        }
//
//        $this->assign('title','Parttime-job');
//        $this->assign('list', $data);
//        return $this->fetch('index/parttimejobtest');
//    }
}
