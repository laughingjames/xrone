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
	     $param=input('param.');
	     $shop_id=input('param.shop_id');
//         $query=[];
         if(isset($param['job_name'])){
             $map['p.job_name']=['like',"%".$param['job_name']."%"];
             $query['p.job_name']=urlencode($param['job_name']);
         }else{
             $map['t.shop_id']=$shop_id;
         }

         $list=[];
         $list= Db::name('take_out_foods')
             ->alias('t')
           ->where($map)
             ->paginate(config('page_num'));

         $this->assign('shop_id',$shop_id);
         $this->assign('list',$list);
         $this->assign('empty','<tr><td colspan="20">没有数据~</td></tr>');
         return $this->fetch();
     }

    /**
     * 编辑外卖信息
     * @return mixed
     */
    public function edit_food_detail(){

        if(request()->isPost()){
            $data=input('post.');

            $food['food_title']=$data['food_title'];
            $food['food_pic']=$data['food_pic'];
            if(Db::name('take_out_foods')->where('food_id',$data['food_id'])->update($food)){
                storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'编辑了外卖店铺信息');
                $this->success('编辑成功',url('TakeOut/index'));
            }else{
                $this->error('编辑失败');
            }
        }

        $list=[
            'info'=>Db::name('take_out_foods')
                ->where('food_id',input('param.food_id'))
                ->find(),
        ];

        $this->assign('data',$list);
        $this->assign('crumbs','外卖店铺外卖修改');
        return $this->fetch('food_info');
    }


    /**
     * 添加兼职信息
     * @return array|mixed
     */
    public function add_food(){
        if(request()->isPost()){
            $data=input('post.');
            $food['shop_id']=$data['shop_id'];
            $food['food_pic']=$data['food_pic'];
            $food['food_title']=$data['food_title'];
            $food['food_price']=$data['food_price'];

            $uid=Db::name('take_out_foods')->insert($food,false,true);

            if($uid){
                storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'添加了新的兼职：'.$data['food_title']);
                $this->success('新增成功',url('TakeOut/take_out_foods',['shop_id'=>$data['shop_id']]));
            }else{
                $this->error('编辑失败');
            }

        }

        $this->assign('group',Db::name('member_auth_group')->field('id,title')->select());
        $this->assign('shop_id',input('param.shop_id'));
        $this->assign('crumbs','新增兼职');
        return $this->fetch('add_food');
    }



}
?>