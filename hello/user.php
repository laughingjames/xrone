<?php
/**
 * Created by PhpStorm.
 * User: Julis
 * Date: 2017/11/27
 * Time: 下午7:46
 */

class user
{
    private $id;
    private $username;
    private $sex;
    private $head_url;
    private $password;

    /**
     * user constructor.
     * @param $id
     * @param $username
     * @param $sex
     * @param $head_url
     * @param $password
     */
    public function __construct($id, $username, $sex, $head_url, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->sex = $sex;
        $this->head_url = $head_url;
        $this->password = $password;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getHeadUrl()
    {
        return $this->head_url;
    }

    /**
     * @param mixed $head_url
     */
    public function setHeadUrl($head_url)
    {
        $this->head_url = $head_url;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function updateInfo(){

    }

}