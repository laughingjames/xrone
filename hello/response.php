<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/11/18
 * Time: 下午1:05
 */

class Response
{
    public static function show($code,$message='',$data=array()){
        if(!is_numeric($code)){
            return '';
        }
        self::json($code,$message,$data);
    }

    /**
     * 按json方式输出通信数据
     * @param $code
     * @param string $message
     * @param array $data
     * @return string
     */
    public static function json($code,$message='',$data=array()){
        if(!is_numeric($code)){
            return'';
        }
        $result=array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        );
        echo json_encode($result);
        exit;
    }

}