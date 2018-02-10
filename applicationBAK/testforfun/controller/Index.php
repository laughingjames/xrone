<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/2/6
 * Time: 上午9:36
 */

namespace app\testforfun\controller;
use think\Controller;

class index extends Controller
{
    public function index(){
        return $this->fetch();
    }
    public function getinfo(){
        if(request()->isPost()){
            $data=input('post.');
            $url= 'http://jwc.wzu.edu.cn/xxy.jsp?urltype=tree.TreeTempUrl&wbtreeid=1082&condition1='.$data['key'];
           return $this->get_userinfo_spider($url);
        }
    }
    public function get_userinfo_spider(){
        $data=[];
        $url= 'http://jwc.wzu.edu.cn/xxy.jsp?urltype=tree.TreeTempUrl&wbtreeid=1082&condition1=e3hoPTE1MjExMDEwMTQ5LCB4bT3njovpuY99';
        $ch = curl_init($url); //初始化会话
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  //将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
        $result = curl_exec($ch);
        $level_number_ru="/<td><span class=\"textspan\">(.*)<\/span>/";
        preg_match_all($level_number_ru,$result,$out);
        $data['level']=$out[0][0];
        $data['test_number']=$out[0][1];

        $class_college_name_id_ru="/<span class=\"textspan2\">(.*)<\/span>/";
        preg_match_all($class_college_name_id_ru,$result,$out);
        $data['name']=$out[0][0];
        $data['id']=$out[0][1];
        $data['college']=$out[0][2];
        $data['class']=$out[0][3];

        var_dump($data);
         return json_encode($data);

    }
    public function chsi(){
        $url= 'http://cet.neea.edu.cn/cet/';
        $ch = curl_init($url); //初始化会话
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  //将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
        $result = curl_exec($ch);
        return $result;
    }


}