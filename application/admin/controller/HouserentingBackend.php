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
        if(isset($param['name'])){
            $map['h.title']=['like',"%".$param['name']."%"];
            $query['h.name']=urlencode($param['name']);
            if(isset($param['status'])){
                $map['h.status']=$param['status'];
            }
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

            $house_id=Db::name('house_renting')->insertGetId($houseinfo);

            if (isset($data['mobile_image'])){
                foreach ($data['mobile_image'] as $mobile_image) {
                    Db::execute("INSERT INTO " . config('database.prefix'). "house_renting_description_image SET house_id =" . (int)$house_id . ", image = '" . $mobile_image['image']."', description = '" . $mobile_image['description'] .  "', sort_order =" . (int)$mobile_image['sort_order']);
                }
            }
            if($house_id){

                storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'新增了房屋信息：标题: '.$houseinfo['title'].' 价格: ¥'.$houseinfo['price']);

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
        $status= $update['status']===0?'使用':'停用';
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
        $update['price']=$data['price'];
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
        $house_images=Db::name('house_renting_description_image')->where('house_id',input('id'))->order('sort_order asc')->select();

        $this->assign('mobile_images',$house_images);
        $this->assign('crumbs', '房屋多图');

        return $this->fetch();
    }
    //删除房屋信息
    function del(){
        $house_id=input('param.id');
        $r=Db::name('house_renting')->where('id',$house_id)->delete();
        Db::name('house_renting_description_image')->where('house_id',$house_id)->delete();


        if($r){
            storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'删除房屋信息'.input('get.id'));
            $this->redirect('HouserentingBackend/index');

        }else{

            return $this->error('删除失败！',url('HouserentingBackend/index'));
        }
    }

    //编辑信息，新增，修改
    function ajax_eidt(){
        if(request()->isPost()){
            $data=input('post.');

            $table_name=$data['table'];
            if(isset($data[$table_name][$data['key']])){
                $info=$data[$table_name][$data['key']];
            }

            if(isset($data['id'])&&$data['id']!=''){
                //更新
                $info['id']=(int)$data['id'];

                $r=Db::name($table_name)->update($info,false,true);
                if($r){
                    storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'更新房子多图信息，房子ID为： '.$data['id']);
                    return ['success'=>'更新成功'];
                }else{
                    return ['error'=>'更新失败'];
                }
            }else{
                //新增
                $info['house_id']=(int)$data['house_id'];
                $r=Db::name($table_name)->insert($info,false,true);
                if($r){
                    storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'更新房屋信息（新增图片）,房屋ID为： '.$data['id']);
                    return ['success'=>'更新成功','id'=>$r];
                }else{
                    return ['error'=>'更新失败'];
                }
            }
        }else{
            $data=input('get.');

            $table_name=$data['table'];
            if(isset($data[$table_name][$data['key']])){
                $info=$data[$table_name][$data['key']];
            }

            if(isset($data['id'])&&$data['id']!=''){
                //更新
                $info['id']=(int)$data['id'];

                $r=Db::name($table_name)->update($info,false,true);
                if($r){
                    storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'更新房子多图信息，房子ID为： '.$data['id']);
                    return ['success'=>'更新成功'];
                }else{
                    return ['error'=>'更新失败'];
                }
            }else{
                //新增
                $info['house_id']=(int)$data['house_id'];

                $r=Db::name($table_name)->insert($info,false,true);
                if($r){
                    storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'更新房屋信息（新增图片）,房屋ID为： '.$data['id']);
                    return ['success'=>'更新成功','id'=>$r];
                }else{
                    return ['error'=>'更新失败'];
                }
            }
        }

    }
    //用于编辑中删除
    function ajax_del(){
        if(request()->isPost()){
            $data=input('post.');

            if(empty($data['id'])){
                return ['success'=>'删除成功'];
            }

            $r=Db::name($data['table'])->delete($data['id']);

            if($r){
                return ['success'=>'删除成功'];
            }else{
                return ['error'=>'删除失败'];
            }
        }
    }



    public function house_apply_manage(){
        $param=input('param.');
        $query=[];
        if(isset($param['title'])){
            $map['h.title']=['like',"%".$param['title']."%"];
            $query['h.title']=urlencode($param['title']);
        }else{
            $map['m.uid']=['gt',0];
        }

        $list=[];
        $list= Db::name('apply_house')
            ->alias('a')
            ->join('member m','a.uid = m.uid')
            ->join('house_renting h','a.hid = h.id')
            ->where($map)
            ->paginate(config('page_num'));
        $this->assign('list',$list);
        $this->assign('empty','<tr><td colspan="20">没有数据~</td></tr>');
        return $this->fetch();
    }





}