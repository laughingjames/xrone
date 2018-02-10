<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/1/14
 * Time: 上午10:51
 */

namespace app\mobile\model;

use think\Model;

class Member extends Model
{
    public function updateinfo($data){
        if(empty($data)||!is_array($data)){
            return false;
        }else{
         if($this->isUpdate()->save($data)){
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