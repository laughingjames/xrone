<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2018/1/13
 * Time: 下午10:02
 */

namespace app\index\controller;
use think\Controller;
use app\index\model\User as UserModel;

class User extends Controller
{
    public function index(){
        $this->assign('title','User-Center');
        $this->view->engine->layout(true);
        return $this->fetch('user/usercenter');
    }

    /**
     * 打开用户信息页面
     * @return mixed
     */
    public function userinfo(){
        if(!session('name')){
            $this->view->engine->layout(false);
            return $this->fetch('/user/login');
        }else{
            $userInfo=db('user')
                ->where('id',session('id'))
                ->find();

            $this->assign('user',$userInfo);
            $this->assign('title','User-Info');
            $this->view->engine->layout(true);
            return $this->fetch('user/userinfo');
        }
    }



    public function add(){
        if(request()->isPost()){
            $user=new UserModel();
            $data=input('post.');

            $phone_no=$data['phone_no'];

            if($user->where(['phone_no' => $phone_no])->find()){
                echo 202;
            }else{
                $res=$user->add($data);
                if($res){
                    echo 200;
                }else{
                    echo 400;
             }
            }
        }else{
            $this->error('Bad Request.');
        }
    }
//    public function updateInfotest(){
//        if(request()->isPost()){
//            $file = request()->file('heade-img');
//            $info = $file->move(ROOT_PATH . 'public/static/images/user');
//            if($info){
//                // 成功上传后 获取上传信息
//                // 输出 jpg
//
//
//                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
//                $head_img= $info->getSaveName();
////                echo $head_img;
//
//
//                $user=new UserModel();
//                $data=input('post.');
//                $data['head_url']=$head_img;
//                $res=$user->updateinfo($data);
//
//
//                if($res){
//                    $this->success('Update Successful.','/index/user/userinfo');
//                }else{
//                    $this->error('Failed.');
//                }
//            }else{
//                // 上传失败获取错误信息
//                echo $file->getError();
//            }
//
//
//
//        }else{
//
//            $this->error('Bad Request.');
//        }
//    }

    /**
     * 用户信息添加或者修改
     */
    public function updateInfo(){
        if(request()->isPost()){
            $user=new UserModel();
            $data=input('post.');
            $file = request()->file('heade-img');
            if(!empty($file)){
                $info = $file->move(ROOT_PATH . 'public/static/images/user');
                if($info){
                    $head_img= $info->getSaveName();
                    $data['head_url']=$head_img;
                    session('head_url',$head_img);
                }else{
                    echo $file->getError();
                }
            }
            $res=$user->updateinfo($data);
            if($res){
                session('name',$data['name']);
                $this->success('Update Successful.','/index/user/userinfo');
            }else{
                $this->error('Failed.');
            }
        }else{
            $this->error('Bad Request.');
        }
    }

    public function login(){
        $this->view->engine->layout(false);
        return $this->fetch('user/login');
    }

    public function register(){

        $this->view->engine->layout(false);
        return $this->fetch('user/register');
    }

    /**
     * 登陆操作ƒ
     * @return array|void
     */
    public function login_action(){
        $user = new UserModel();
        $data = input('post.');

        $preview = $user
            ->where(array('phone_no'=>$data['phone_no']))
            ->find();

        if(!$preview){
            $this->error('Phone of '.$data['phone_no'].' User is Not Exit.');
        }

        $where_query = array(
            'phone_no' => $data['phone_no'],
            'password' => md5($data['password']),
        );
        if ($user = $user->where($where_query)->find()) {

            //注册session
            session('id',$user->id);
            session('name',$user->name);
            session('head_url',$user->head_url);
            session('password',$user->password);

            //更新最后请求IP及时间
            $request = request();
            $ip = $request->ip();
            $time = time();
            $user->where($where_query)->update(['last_login_ip' => $ip, 'last_login_time' => $time]);
           echo "<script>alert(\"Login Success\");history.go(-2)</script>";
            return $this->success('Login success', '/index/index');
        } else {
            $this->error('Login failure: account or password error.');
        }
    }
    public function logout(){
        session(null);
        return $this->success('Logout Success.', '/index/index');
    }
    public function register_action(){
        if(request()->isPost()){
            $headimgbase64=input('post.')['headimg'];
            $headimagename=$this->base64_upload($headimgbase64);
            $user=new UserModel();
            $data=input('post.');
            $data['head_url']=$headimagename;
            $phone_no=$data['phone_no'];
            unset($data['headimg']);
            if($user->where(['phone_no' => $phone_no])->find()){
                echo 202;
            }else{
                $res=$user->add($data);
                if($res){
                    echo 200;
                }else{
                    echo 400;
                }
            }
        }else{
            $this->error('Bad Request.');
        }
    }

    /**
     * base64数据格式转图片
     * @param $base64
     * @return bool|string
     */
    public function base64_upload($base64) {
        $base64_image = str_replace(' ', '+', $base64);

        //post的数据里面，加号会被替换为空格，需要重新替换回来，如果不是post的数据，则注释掉这一行
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image, $result)){
            //匹配成功
            if($result[2] == 'jpeg'){
                $image_name = uniqid().'.jpg';
                //纯粹是看jpeg不爽才替换的
            }else{
                $image_name = uniqid().'.'.$result[2];
            }
            $image_file = ROOT_PATH . 'public/static/images/user/'.$image_name;
            //服务器文件存储路径
            if (file_put_contents($image_file, base64_decode(str_replace($result[1], '', $base64_image)))){
                return $image_name;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}