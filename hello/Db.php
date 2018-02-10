<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/11/18
 * Time: 下午9:57
 */

class Db
{
    static private $_instance;
    static private $_connectSource;
    private $_dbCongig=array(
        'host'=>'localhost',
        'user'=>'root',
        'password' => 'JhFnZv9TmHhJ',
        'port' => 3306,
    );
    private function __construct(){

    }
    static public function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance=new self();
        }
        return self::$_instance;
    }
    public function connect(){
        if (!self::$_connectSource){
            self::$_connectSource= new mysqli(
               $this->_dbCongig['host'],
               $this->_dbCongig['user'],
               $this->_dbCongig['password'],
                $this->_dbCongig['database'],
               $this->_dbCongig['port']
             );
            if(!self::$_connectSource){
                throw new Exception("Connect_error:".mysqli_errno());
            }
            self::$_connectSource->select_db('hello');
            self::$_connectSource->query("set names UTF8");
        }
        return self::$_connectSource;
    }
}
