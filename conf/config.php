<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/12/26
 * Time: 下午4:53
 */

use think\Env;

return [
    'app_status'        => Env::get('status','dev'),
    'auto_bind_module'  => true,
    'url_route_on'      => true,
    'url_route_must'    => false,//配置路由必须
    'url_domain_deploy' => true,
    'url_convert'            => false,
    'SHOW_ERROR_MSG'    => true,//异常信息显示
    'app_debug'         => true,
    'default_ajax_return'    => 'json',
//    'template'  =>  [
//        'layout_on'     =>  true,
//        'layout_name'   =>  'layout',
//    ],

    // 视图输出字符串内容替换
    'view_replace_str'       => [
        '__PUBLIC__'=>'/public/static',
        '__CSS__'=>'/public/static/css',
        '__JS__'=>'/public/static/js',
        '__IMG__'=>'/public/static/images',
        '__ADMIN__' =>'/public/static/view_res/admin',
        '__RES__'=>'/public/static/view_res',
        '__ADMIN__' =>'/public/static/view_res/admin',
        'IMG_ROOT'=>'/',
        '__UPLOAD__'=>'/public/uploads',

    ],
    'session'                => [
        'type'           => '',
        'auto_start'     => true,
    ],
    'cookie'                 => [
        // cookie 名称前缀
        'prefix'    => 'osc_',
        // cookie 保存路径
        'path'      => '/'
    ],
    'default_ajax_return'    => 'json',
    'URL_HTML_SUFFIX'=>'',
    //默认错误跳转对应的模板文件
    'dispatch_error_tmpl' => APP_PATH.'mobile/view/public/error.tpl',
    //默认成功跳转对应的模板文件
    'dispatch_success_tmpl' => APP_PATH.'mobile/view/public/success.tpl',

];