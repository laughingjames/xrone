<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/2/19
 * Time: 下午8:33
 */

namespace app\admin\controller;

use app\common\controller\AdminBase;
use think\Db;

class HouserentingBackend extends AdminBase
{
    protected function _initialize(){
        parent::_initialize();
        $this->assign('breadcrumb1','申请');
        $this->assign('breadcrumb2','租房管理');
    }
    //房源列表
    public function index(){
        $param=input('param.');
        $query=[];
        if(isset($param['job_name'])){
            $map['p.job_name']=['like',"%".$param['job_name']."%"];
            $query['p.job_name']=urlencode($param['job_name']);
        }else{
            $map['h.id']=['gt',0];
        }

        $list=[];
        $list= Db::name('house_renting')
            ->alias('h')
            ->where($map)
            ->paginate(config('page_num'));


        $this->assign('empty','<tr><td colspan="20">没有数据~</td></tr>');
        $this->assign('list',$list);
        return $this->fetch();
    }

    //新增房源
    public function add(){

        if(request()->isPost()){

            $data=input('post.');
            $houseinfo['title']=$data['title'];
            $houseinfo['image']=$data['image'];
            $houseinfo['price']=$data['price'];
            $houseinfo['detail']=$data['detail'];
            $houseinfo['address']=$data['address'];

            $goods_id=Db::name('house_renting')->insert($houseinfo);

            if (isset($data['mobile_image'])){
                foreach ($data['mobile_image'] as $mobile_image) {
                    Db::execute("INSERT INTO " . config('database.prefix'). "goods_mobile_description_image SET goods_id =" . (int)$goods_id . ", image = '" . $mobile_image['image']."', description = '" . $mobile_image['description'] .  "', sort_order =" . (int)$mobile_image['sort_order']);
                }
            }
            if($goods_id){

                storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'新增了商品');

                $this->success('新增成功！',url('HouserentingBackend/index'));
            }else{
                $this->error('新增失败！');

            }

        }

        $this->assign('weight_class',Db::name('WeightClass')->select());
        $this->assign('length_class',Db::name('LengthClass')->select());
        $this->assign('crumbs', '新增');
        $this->assign('action', url('Goods/add'));

        return $this->fetch();
    }
    //更新状态
    function set_status(){
        $data=input('param.');
        if(!isset($data['id'])){
            $this->redirect('HouserentingBackend/index');
        }
        $update['id']=(int)$data['id'];
        $update['status']=(int)$data['status'];
        $status= $update['status']===0?'停用':'使用';
        if(Db::name('house_renting')->update($update)){
            storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'更新房屋'.$data['title'].'状态为:'.$status);
            $this->redirect('HouserentingBackend/index');
        }
    }
    //更新价格
    function update_price(){

        $data=input('post.');
        if(!isset($data['id'])){
            $this->redirect('HouserentingBackend/index');
        }
        $update['id']=(int)$data['id'];
        $update['price']=(float)$data['price'];
        if(Db::name('house_renting')->update($update)){
            storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'更新房屋'.$data['title'].'商品价格为:'.$data['price']);
            return true;
        }
    }
    //房子基本信息
    public function edit_general(){

        if(request()->isPost()){
            $data=input('post.');
            if(empty($data['title'])){
                $this->error('商品标题必填！');
            }
            try{
                Db::name('house_renting')->update($data,false,true);
               storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'更新房屋基本信息');
                return $this->success('更新成功！',url('HouserentingBackend/index'));
            }catch(Exception $e){
                return $this->error('更新失败！'.$e);
            }

        }
        $houseInfo=Db::name('house_renting')->find((int)input('id'));
        $this->assign('goods',$houseInfo);
        $this->assign('crumbs', '编辑基本信息');
        return $this->fetch();
    }
    //房屋多图
    public function edit_mobile(){
        $this->assign('mobile_images',Db::name('goods_mobile_description_image')->where('goods_id',input('id'))->order('sort_order asc')->select());
        $this->assign('crumbs', '房屋多图');
        return $this->fetch();
    }
    //删除房屋信息
    function del(){
        $model=osc_model('admin','goods');
        $r=$model->del_goods((int)input('param.id'));
        if($r){
            storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'删除商品'.input('get.id'));
            $this->redirect('Goods/index');

        }else{

            return $this->error('删除失败！',url('Goods/index'));
        }

    }
}