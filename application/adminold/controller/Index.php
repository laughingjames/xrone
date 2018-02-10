<?php
/**
 * 工作申请管理
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/1/3
 * Time: 下午7:17
 */

namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
use think\Controller;
use think\Session;

class Index extends Controller
{

    function index(){
        if(!session('username')){
            //未登陆跳转
//            $this->error('还没有登录，正在跳转到登录页','/admin/index');
            return $this->fetch('/admin/index');
        }else{
            return $this->fetch('navigationurl');
        }


    }

    function check($username,$password){
        $admin=AdminModel::getByUsername($username);
        if(empty($admin)){
            return $this->error('没找到该用户');
        }else{
            $databasePassword=$admin->getAttr('password');
            if($password==$databasePassword){

                session('username',$username);
                return $this->success("登陆成功",'returnNavigationPage');
            }else{
                return $this->error('密码错误,请联系管理员');
            }
        }
    }
    function returnNavigationPage(){
        return $this->fetch('navigationurl');
    }

}