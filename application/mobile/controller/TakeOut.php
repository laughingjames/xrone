<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/3/26
 * Time: 下午9:15
 */

namespace app\mobile\controller;
use think\Db;

use think\Controller;

class TakeOut extends Controller
{
    /**
     * 展示外卖店铺信息
     * @return mixed
     */
    public function take_out_shop(){
        $list=[];
        $list= Db::name('take_out_shop')
            ->paginate(config('page_num'));
        $this->assign('top_title','外卖/Take_out');
        $this->assign('SEO',['title'=>'外卖/Take_out-'.config('SITE_TITLE')]);
        $this->assign('flag','search');
        $this->assign('shop_list',$list);
        return $this->fetch();
    }
    /**
     * 展示外卖店铺信息
     * @return mixed
     */
    public function take_out_food_list(){



        $list= Db::view('Goods','goods_id,image,name,price')
            ->view('GoodsToCategory','category_id','Goods.goods_id=GoodsToCategory.goods_id')
            ->where(array('Goods.status'=>1,'GoodsToCategory.category_id'=>28))->select();//28为外卖的目录id

        $this->assign('food_list',$list);
        $this->assign('top_title','外卖/Take_out');
        $this->assign('SEO',['title'=>'外卖/Take_out-'.config('SITE_TITLE')]);
        $this->assign('flag','search');

//      var_dump($list);exit();
        return $this->fetch();
    }

    //兼职详情
    function food_detail(){

        if(request()->isPost()){
            $house_id=(int)input('post.id');
            cookie('jump_url',request()->url(true).'/id/'.$house_id);
            $house_title=Db::name('house_renting')->field('title')->where('id',$house_id)->find()['title'];
            if(empty($house_title)){
                return ['error'=>'房屋信息不存在！！/House info does not exist!!'];
            }
            $uid=user('uid');
            if(!$uid){
                return ['error'=>'请先登录/Please Log on First! ','url'=>"/mobile/login/login"];
            }
            if(Db::name('apply_house')->where(array('hid'=>$house_id,'uid'=>$uid))->find()){
                return ['error'=>'你已经申请/You already applied.'];
            }
            Db::name('house_renting')->where('id',$house_id)->setInc('apply_counts');
            Db::name('apply_house')->insert(array('uid'=>$uid, 'hid'=>$house_id));
            storage_user_action($uid,user('username'),config('FRONTEND_USER'),'申请了：'.$house_title.'房屋');
            return ['success'=>'申请成功/Apply Success', 'url'=>"/mobile/app/house_renting"];
        }

        $food_id=input('param.food_id');
        $food_info=Db::name('take_out_foods')->where('food_id',$food_id)->find();
        if(empty($food_info)){
            $this->error('外卖信息不存在！！/Take out info do not exist!!');
        }

//        $images=Db::name('house_renting_description_image')->where('house_id',$food_id)->select();
//        $this->assign('image',$images);
        $this->assign('top_title',$food_info['food_title']);
        $this->assign('food',$food_info);
        return $this->fetch();
    }
}

