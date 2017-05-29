<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/6
 * Time: 14:56
 */
//它的一个对象实例表示user_tb表的一条记录
class User_tb{
    private $user_id;
    private $user_type;
    private $user_name;
    private $user_college;
    private $user_phone;
    private $user_mail;
    private $user_password;
    private $user_status;
    private $user_login_status;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * @param mixed $user_type
     */
    public function setUserType($user_type)
    {
        $this->user_type = $user_type;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public function getUserCollege()
    {
        return $this->user_college;
    }

    /**
     * @param mixed $user_college
     */
    public function setUserCollege($user_college)
    {
        $this->user_college = $user_college;
    }

    /**
     * @return mixed
     */
    public function getUserPhone()
    {
        return $this->user_phone;
    }

    /**
     * @param mixed $user_phone
     */
    public function setUserPhone($user_phone)
    {
        $this->user_phone = $user_phone;
    }

    /**
     * @return mixed
     */
    public function getUserMail()
    {
        return $this->user_mail;
    }

    /**
     * @param mixed $user_mail
     */
    public function setUserMail($user_mail)
    {
        $this->user_mail = $user_mail;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->user_password;
    }

    /**
     * @param mixed $user_password
     */
    public function setUserPassword($user_password)
    {
        $this->user_password = $user_password;
    }

    /**
     * @return mixed
     */
    public function getUserStatus()
    {
        return $this->user_status;
    }

    /**
     * @param mixed $user_status
     */
    public function setUserStatus($user_status)
    {
        $this->user_status = $user_status;
    }


    /**
     * @return mixed
     */
    public function getUserLoginStatus()
    {
        return $this->user_login_status;
    }

    /**
     * @param mixed $user_login_status
     */
    public function setUserLoginStatus($user_login_status)
    {
        $this->user_login_status = $user_login_status;
    }

}