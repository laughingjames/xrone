<?php
/**
 * oscshop2 B2C电子商务系统
 *
 * ==========================================================================
 * @link      http://www.oscshop.cn/
 * @copyright Copyright (c) 2015-2016 oscshop.cn. 
 * @license   http://www.oscshop.cn/license.html License
 * ==========================================================================
 *
 * @author    李梓钿
 *
 */
 
namespace app\mobile\controller;
use app\common\validate\Member;
use think\Db;
class Login extends MobileBase{
	
	function logout(){
		cookie('mobile_user_info',null);	
		session('mobile_total',null);
		$this->redirect('/mobile');		
	}
	
	function refresh_member($user){
		
		if(empty($user)&&!is_array($user)){
			return;	
		}			
		cookie('mobile_user_info',$user);		
	}
	
	//登录验证
	public function validate_login($data){
		
			if(empty($data['telephone'])){
				return ['error'=>'手机号必填/Phone number Required'];
			}elseif(empty($data['password'])){
				return ['error'=>'密码必填/Password required'];
			}
			if(1==config('use_captcha')){				
				if(!check_verify($data['captcha'])){
					return ['error'=>'验证码错误/Verification Code Error'];
				}
			}
			$user=Db::name('member')->where('telephone',$data['telephone'])->find();
			
			if(!$user){
				return ['error'=>'账号不存在/Account doesn\'t Exist'];
			}elseif(($user['checked']==0)&&(1==config('reg_check'))){//需要审核
				return ['error'=>'该账号未审核通过/The account has not been approved and passed'];
			}
			
			if(think_ucenter_encrypt($data['password'],config('PWD_KEY'))==$user['password']){
		
				$auth = array(
		            'uid'             => $user['uid'],
		            'username'        => $user['username'],
		            'nickname'        => $user['nickname'],
		            'group_id'		  => $user['groupid'],		                     
				 );			
								
				$this->refresh_member($auth);
				
				$login['lastdate']=time();
				$login['loginnum']		=	array('exp','loginnum+1');
				$login['lastip']	=	get_client_ip();
				
				DB::name('member')->where('uid',$user['uid'])->update($login);
				
				storage_user_action($user['uid'],$user['nickname'],config('FRONTEND_USER'),'登录了网站');
				
				return ['success'=>'登录成功/Login Success','total'=>osc_cart()->count_cart_total($user['uid'])];
			}else{
				return ['error'=>'密码错误/Password Error'];
			}
	}
	
 	function login(){
	
		if(request()->isPost()){
			$data=input('post.');	
			
			$r=$this->validate_login($data);
			
			if(isset($r['error'])){
				return $r;
			}elseif($r['success']){
				osc_service('mobile','user')->set_cart_total($r['total']);			
				return ['success'=>'登录成功/Login Success','url'=>cookie('jump_url')];
			}
		}
		$this->assign('SEO',['title'=>'Login-'.config('SITE_TITLE')]);
		$this->assign('top_title','登录/Login');
        return $this->fetch();
    }


    /**
     * 密码找回
     */
    function forget(){
        if(request()->isPost()){
            $data=input('post.');
            $user=Db::name('member')->where('telephone',$data['telephone'])->find();
            if($user){
               $password=think_ucenter_decrypt($user['password'],config('PWD_KEY'));
               $content='Dear '.$user['username'].':<br> Your password is:<p style="color: red"> '.$password.'</p> 
               Please delete this email as soon as possible,Thanks for your corporation.<br>--By HelloHelper.';
               $send_data=[
                    ['user_email'=>$user['email'],
                        'content'=>$content]];
                $returndata=sendEmail($send_data);
                if($returndata==1){
                    return ['success'=>'Success','email'=>$user['email']];
                }

                return ['error'=>'Fail'];

            }
            return ['error'=>'没有此账号/No Account of this Telephone'];


        }
        $this->assign('SEO',['title'=>'密码找回/Password Recovery-'.config('SITE_TITLE')]);
        $this->assign('top_title','密码找回/Password Recovery');
        return $this->fetch();
    }
    /**
     * 原商城用户注册
     * @return array|mixed
     */
	function reg(){
	
		if(request()->isPost()){
			
			$data=input('post.');					
			 
			if(1==config('use_captcha')){				
				if(!check_verify($data['captcha'])){
					return ['error'=>'验证码错误'];
				}
			}  
			 	
			$validate=new Member();
				
			if(!$validate->check($data)){				
			    return ['error'=>$validate->getError()];				
			}

			$member['username']=$data['username'];
			$member['reg_type']='mobile';
			$member['password']=think_ucenter_encrypt($data['password'],config('PWD_KEY'));
			$member['groupid']=config('default_group_id');
			
			$member['regdate']=time();
			$member['lastdate']=time();			
			
			$member['nickname']=$data['username'];
			

			if(1==config('reg_check')){//需要审核或者验证
				$member['checked']=0;
			}else{
				$member['checked']=1;
			}
			
			$uid=Db::name('member')->insert($member,false,true);
			
			if($uid){
				
				//写入用户权限表
				Db::name('member_auth_group_access')->insert(['uid'=>$uid,'group_id'=>$member['groupid']],false,true);				 		
				
				if(1==config('reg_check')){//需要审核
					return ['success'=>'注册成功，请等待管理员审核','check'=>1,'url'=>cookie('jump_url')];
				}else{//不需要审核
					$auth = array(
		            'uid'             => $uid,
		            'username'        => $member['username'],		           
		            'group_id'		  => $member['groupid']		          	            
					 );	
					 
					$this->refresh_member($auth);
					
					storage_user_action($uid,$member['username'],config('FRONTEND_USER'),'注册成为会员');
					
					return ['success'=>'注册成功','check'=>0,'url'=>cookie('jump_url')];
				}
				
			}else{
				return ['error'=>'注册失败'];
			}
			
		}
		$this->assign('SEO',['title'=>'注册-'.config('SITE_TITLE')]);
		$this->assign('top_title','注册');
        return $this->fetch();
    }

    /**
     * 改了之后的用户注册
     * @return array|mixed
     */
    function register(){

        if(request()->isPost()){
            $data=input('post.');
            $validate=new Member();

            if(!$validate->check($data)){
                return ['error'=>$validate->getError()];
            }
            $member['telephone']=$data['telephone'];
            $member['country']=$data['country'];
            $member['userpic']=$this->base64_upload($data['headimg']);
            $member['username']=$data['username'];
            $member['email']=$data['email'];
            $member['passport_no']=$data['passport_no'];
            $member['interest']=$data['interest'];
            $member['major']=$data['major'];
            $member['sex']=$data['sex'];
            $member['reg_type']='mobile';
            $member['password']=think_ucenter_encrypt($data['password'],config('PWD_KEY'));
            $member['groupid']=config('default_group_id');
            $member['regdate']=time();
            $member['lastdate']=time();
            $member['nickname']=$data['username'];


            if(1==config('reg_check')){//需要审核或者验证
                $member['checked']=0;
            }else{
                $member['checked']=1;
            }
            $uid=Db::name('member')->insert($member,false,true);

            if($uid){
                //写入用户权限表
                Db::name('member_auth_group_access')->insert(['uid'=>$uid,'group_id'=>$member['groupid']],false,true);
                if(1==config('reg_check')){//需要审核
                    return ['success'=>'注册成功，请等待管理员审核','check'=>1,'url'=>cookie('jump_url')];
                }else{//不需要审核
                    $auth = array(
                        'uid'             => $uid,
                        'username'        => $member['username'],
                        'group_id'		  => $member['groupid']
                    );
                    $this->refresh_member($auth);

                    storage_user_action($uid,$member['username'],config('FRONTEND_USER'),'注册成为会员');

                    $data= ['success'=>'注册成功','check'=>0,'url'=>cookie('jump_url')];
                    return $data;
                }
            }else{

                return ['error'=>'注册失败'];
            }
        }

        $this->assign('SEO',['title'=>'注册-'.config('SITE_TITLE')]);
        $this->assign('top_title','注册');
        return $this->fetch();
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
// 	public function verify(){
//		$captcha = new Captcha((array)Config('captcha'));
//		return $captcha->entry(1);
//    }

}
