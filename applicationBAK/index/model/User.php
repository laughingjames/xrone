<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/1/14
 * Time: 上午10:51
 */

namespace app\index\model;

use think\Model;

class User extends Model
{
    public function updateinfo($data){
        if(empty($data)||!is_array($data)){
            return false;
        }else{
         if($this->isUpdate(true)->save($data)){
             return true;
         }else{
             return false;
         }
        }
    }
    public function add($data){
        if(empty($data)||!is_array($data)){
            return false;
        }else{
            if($this->save($data)){
                return true;
            }else{
                return false;
            }
        }
    }
}