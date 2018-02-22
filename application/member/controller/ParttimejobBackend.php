<?php
/**
 * oscshop2 B2C电子商务系统
 *
 * ==========================================================================
 * @link      http://www.oscshop.cn/
 * @copyright Copyright (c) 2015-2016 oscshop.cn. 
 * @license   http://www.oscshop.cn/license.html License
 * ==========================================================================
 *
 * @author    李梓钿
 *
 */
 
namespace app\member\controller;
use app\common\controller\AdminBase;
use think\Db;
class ParttimejobBackend extends AdminBase{
	
	protected function _initialize(){
		parent::_initialize();
		$this->assign('breadcrumb1','申请');
		$this->assign('breadcrumb2','兼职管理');
	}
	
     public function index(){
		$param=input('param.');
		$query=[];
		if(isset($param['job_name'])){
			$map['p.job_name']=['like',"%".$param['job_name']."%"];
			$query['p.job_name']=urlencode($param['job_name']);
		}else{
			$map['m.uid']=['gt',0];
		}

         $list=[];
         $list= Db::name('apply_job')
             ->alias('a')
             ->join('member m','a.uid = m.uid')
             ->join('parttime_job p','a.job_id = p.id')
             ->where($map)
             ->paginate(config('page_num'));
//        echo  json_encode($list);
//         exit();
         	$this->assign('list',$list);
            $this->assign('empty','<tr><td colspan="20">没有数据~</td></tr>');
            return $this->fetch();

     }

    /**
     * 更新兼职状态
     */
    public function update_status($aid,$value){

        $res=Db::name('apply_job')
            ->where('aid',$aid)
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



	 /**
      * 工作信息界面
      */
	 public function jobmanage(){
         $param=input('param.');
         $query=[];
         if(isset($param['job_name'])){
             $map['p.job_name']=['like',"%".$param['job_name']."%"];
             $query['p.job_name']=urlencode($param['job_name']);
         }else{
             $map['p.id']=['gt',0];
         }

         $list=[];
         $list= Db::name('parttime_job')
             ->alias('p')
             ->where($map)
             ->paginate(config('page_num'));

         $this->assign('list',$list);
         $this->assign('empty','<tr><td colspan="20">没有数据~</td></tr>');
         return $this->fetch();
     }

    /**
     * 编辑工作信息
     * @return mixed
     */
    public function edit_job_info(){

        if(request()->isPost()){

            $data=input('post.');
            $parttimejob['detail']=$data['detail'];
            $parttimejob['job_name']=$data['job_name'];
            $parttimejob['salary']=$data['salary'];
            $parttimejob['address']=$data['address'];
            $parttimejob['need_counts']=$data['need_counts'];
            $parttimejob['notes']=$data['notes'];
            $parttimejob['is_end']=$data['is_end'];

            if(Db::name('parttime_job')->where('id',$data['id'])->update($parttimejob)){

//                Db::name('parttime_job')->where('id',$data['id'])->update(['group_id'=>$date['groupid']]);

                storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'编辑了兼职信息');
                $this->success('编辑成功',url('ParttimejobBackend/jobmanage'));
            }else{
                $this->error('编辑失败');
            }
        }

        $list=[
            'info'=>Db::name('parttime_job')->where('id',input('param.id'))->find(),
        ];

        $this->assign('data',$list);
        $this->assign('crumbs','兼职信息修改');
        return $this->fetch('jobinfo');
    }
    /**
     * 添加兼职信息
     * @return array|mixed
     */
    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            $parttimejob['job_name']=$data['job_name'];
            $parttimejob['salary']=$data['salary'];
            $parttimejob['need_counts']=$data['need_counts'];
            $parttimejob['address']=$data['address'];
            $parttimejob['date']=$data['date'];
            $parttimejob['detail']=$data['detail'];
            $parttimejob['notes']=$data['notes'];

            $uid=Db::name('parttime_job')->insert($parttimejob,false,true);

            if($uid){
                storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'添加了新的兼职：'.$data['job_name']);
                return ['success'=>'新增成功',url('ParttimejobBackend/jobmanage')];
            }else{
                return ['error'=>'新增失败'];

            }

        }

        $this->assign('group',Db::name('member_auth_group')->field('id,title')->select());
        $this->assign('crumbs','新增兼职');
        return $this->fetch();
    }



    public function house_apply(){

    }
}
?>