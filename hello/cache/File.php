<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/11/18
 * Time: 下午1:27
 */

class File
{
    private $_dir;
    const EXT='.txt';
    public function __construct(){
        $this->_dir=dirname(__FILE__).'/files/';

    }
    public function cacheData($key,$values='',$path=''){
    echo $key;
    echo $values;
        $filename=$this->_dir.$path.$key.self::EXT;

        if($values!==''){
            $dir=dirname($filename);

            if(!is_dir($dir)){
                mkdir($dir,0777);

            }
            return file_put_contents($filename,$values);
        }
    }

}