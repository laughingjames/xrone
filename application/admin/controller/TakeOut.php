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
 
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Db;
class TakeOut extends AdminBase{
	
	protected function _initialize(){
		parent::_initialize();
		$this->assign('breadcrumb1','外卖');
		$this->assign('breadcrumb2','外卖店铺管理');
	}
	
     public function index(){
//         $param=input('param.');
//         $query=[];
//         if(isset($param['job_name'])){
//             $map['p.job_name']=['like',"%".$param['job_name']."%"];
//             $query['p.job_name']=urlencode($param['job_name']);
//         }else{
//             $map['p.id']=['gt',0];
//         }

         $list=[];
         $list= Db::name('take_out_shop')
             ->alias('t')
//             ->where($map)
             ->paginate(config('page_num'));

         $this->assign('list',$list);
         $this->assign('empty','<tr><td colspan="20">没有数据~</td></tr>');
         return $this->fetch();

     }

    /**
     * 编辑shop信息
     * @return mixed
     */
    public function edit_shop_detail(){

        if(request()->isPost()){
            $data=input('post.');
            $shop['shop_detail']=$data['shop_detail'];
            $shop['shop_title']=$data['shop_title'];
            $shop['shop_pic']=$data['shop_pic'];
            if(Db::name('take_out_shop')->where('shop_id',$data['shop_id'])->update($shop)){
                storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'编辑了外卖店铺信息');
                $this->success('编辑成功',url('TakeOut/index'));
            }else{
                $this->error('编辑失败');
            }
        }

        $list=[
            'info'=>Db::name('take_out_shop')->where('shop_id',input('param.shop_id'))->find(),
        ];


        $this->assign('data',$list);
        $this->assign('crumbs','外卖店铺信息修改');
        return $this->fetch('shop_info');
    }




	 /**
      * 外卖物品界面
      */
	 public function take_out_foods(){

//	     $param=input('param.');
//         $query=[];
//         if(isset($param['job_name'])){
//             $map['p.job_name']=['like',"%".$param['job_name']."%"];
//             $query['p.job_name']=urlencode($param['job_name']);
//         }else{
//             $map['p.id']=['gt',0];
//         }

         $list=[];
         $list= Db::name('take_out_foods')
             ->alias('t')
//             ->where($map)
             ->paginate(config('page_num'));


         $this->assign('list',$list);
         $this->assign('empty','<tr><td colspan="20">没有数据~</td></tr>');
         return $this->fetch();
     }

    /**
     * 编辑shop信息
     * @return mixed
     */
    public function edit_food_detail(){

        if(request()->isPost()){
            $data=input('post.');
            $food['food_detail']=$data['food_detail'];
            $food['food_title']=$data['food_title'];
            $food['food_pic']=$data['food_pic'];
            if(Db::name('take_out_food')->where('food_id',$data['food_id'])->update($food)){
                storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'编辑了外卖店铺信息');
                $this->success('编辑成功',url('TakeOut/index'));
            }else{
                $this->error('编辑失败');
            }
        }

        $list=[
            'info'=>Db::name('take_out_shop')->where('shop_id',input('param.shop_id'))->find(),
        ];


        $this->assign('data',$list);
        $this->assign('crumbs','外卖店铺信息修改');
        return $this->fetch('shop_info');
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



}
?>