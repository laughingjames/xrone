<?php
/*
 * 此文件用于验证短信服务API接口，供开发时参考
 * 执行验证前请确保文件为utf-8编码，并替换相应参数为您自己的信息，并取消相关调用的注释
 * 建议验证前先执行Test.php验证PHP环境
 *
 * 2017/11/30
 */

namespace app\admin\controller;

use ali\SmsSignatureHelper;
use app\admin\model\Admin;
use think\Controller;
use think\Db;


class Message extends Controller{


    public function index(){
        $data=[];
        $this->assign('list',$data);
        return $this->fetch('/admin/sms');
    }

    public function getPhoneNumberAndName($id){

        $res=Db::table('wechat_apply_job')
            ->where('job_id',$id)

            ->column('name','phone_no');
        dump($res);
    }

    // 验证发送短信(SendSms)接口
    public function sendmessage(){
        if(request()->isPost()){
          $data=[];
          $n=0;
          $phone_number_array=input('post.')['phone_no'] ;
          $phone_number_explode=explode(' ',$phone_number_array);
          foreach ($phone_number_explode as $phone_number){
              $data[$n]=$this->object_array($this->sendSms($phone_number));
              $data[$n++]['phone_no']=$phone_number;
          }
            $this->assign('list',$data);
            return $this->fetch('/admin/sms');
        }else{
            return $this->error("非法请求");
        }
    }

    /**
     * 将短信返回结果转换为数组
     * @param $array
     * @return array
     */
    public function object_array($array){
        if(is_object($array)){
            $array = (array)$array;
        }
        if(is_array($array)){
            foreach($array as $key=>$value){
                $array[$key] = $this->object_array($value);
            }
        }
        return $array;
    }
    /**
     * 发送短信
     */

   public function sendSms($phonenumber) {
        $this->init();//初始化相关操作。
        $params = array ();

        // fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
        $accessKeyId = "LTAIHG4BHC6LnZoX";
        $accessKeySecret = "OxyBzDE3fGt1LjsGdAxw1tq6VpUrZ4";
        // fixme 必填: 短信接收号码
        $params["PhoneNumbers"] = $phonenumber;

        // fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
        $params["SignName"] = "HelloHelper网";

        // fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $params["TemplateCode"] = "SMS_121851519";

        // fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
        $params['TemplateParam'] = Array (
            "name" => "julis",
            "time"
        );

        // fixme 可选: 设置发送短信流水号
        $params['OutId'] = "12345";

        // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
        $params['SmsUpExtendCode'] = "1234567";


        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }

        // SmsSignatureHelper，签名以及发送请求
        $helper = new SmsSignatureHelper();

        // 此处可能会抛出异常，注意catch
        $content = $helper->request(
            $accessKeyId,
            $accessKeySecret,
            "dysmsapi.aliyuncs.com",
            array_merge($params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            ))
        );

        return $content;
    }
    function init(){
        ini_set("display_errors", "on"); // 显示错误提示，仅用于测试时排查问题
        set_time_limit(0); // 防止脚本超时，仅用于测试使用，生产环境请按实际情况设置
        header("Content-Type: text/plain; charset=utf-8"); // 输出为utf-8的文本格式，仅用于测试
    }

}

