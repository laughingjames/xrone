<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/12/30
 * Time: 下午9:27
 */
namespace app\index\controller;
use think\Controller;
use think\Db;
class apply extends Controller{
    public function index(){
        $name=$this->request->param('name');
        $name = iconv('gbk', 'utf-8', $name);
        $phone_no=$this->request->param('phone_no');
        $passport_no=$this->request->param('passport_no');
        $country=$this->request->param('country');
        $job_id=$this->request->param('job_id');


        $data = [
            'name' => $name,
            'phone_no' => $phone_no,
            'passport_no' =>$passport_no,
            'country' => $country,
            'job_id'=>$job_id
        ];

        $returndata="Name:".$name."\nPhone:".$phone_no."\nPassport_no:".$passport_no."\nCountry:".$country;
        if(!$this->isExist($name,$job_id)){
            $res = Db::table('wechat_apply_job')->insert($data);
            Db::table('wechat_parttime_job')->where('id',$job_id)->setInc('apply_counts');

        }else{
            $res=  Db::table('wechat_apply_job')
                ->where('name',$name)
                ->where('job_id',$job_id)
                ->update(
                       [
                        'phone_no' => $phone_no,
                        'passport_no' =>$passport_no,
                        'country' => $country,
                ]);
        }
        return $returndata;
    }

    /**
     * 判断是否已经存在改数据，不允许重复提交
     * @param $name
     * @param $job_id
     * @return bool false 代表不存在，true代表存在
     */
    public function isExist($name,$job_id){
        $check['name']=$name;
        $check['job_id']=$job_id;
        $res = Db::table('wechat_apply_job')
            ->where('name',$name)
            ->where('job_id',$job_id)
            ->find();
        if(empty($res)){
            return false;
        }else{
           return true;
        }

    }
}