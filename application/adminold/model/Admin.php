<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/1/10
 * Time: 下午2:47
 */

namespace app\admin\model;
use think\Session;
use think\Model;
class Admin extends Model{
    public static function checkLogin(){
        if(Session::has('username')){
            return true;
        }else{
            return false;
        }
    }
}