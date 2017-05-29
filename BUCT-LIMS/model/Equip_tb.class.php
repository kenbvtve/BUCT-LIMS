<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/11
 * Time: 1:43
 */
class Equip_tb{
    private $equip_id;
    private $equip_name;
    private $equip_model;
    private $equip_lab_id;
    private $equip_img;
    private $equip_price;
    private $equip_manu;
    private $equip_manuNo;
    private $equip_manuTime;
    private $equip_chaseTime;
    private $equip_desc;
    private $equip_status;

    /**
     * @return mixed
     */
    public function getEquipId()
    {
        return $this->equip_id;
    }

    /**
     * @param mixed $equip_id
     */
    public function setEquipId($equip_id)
    {
        $this->equip_id = $equip_id;
    }

    /**
     * @return mixed
     */
    public function getEquipName()
    {
        return $this->equip_name;
    }

    /**
     * @param mixed $equip_name
     */
    public function setEquipName($equip_name)
    {
        $this->equip_name = $equip_name;
    }

    /**
     * @return mixed
     */
    public function getEquipModel()
    {
        return $this->equip_model;
    }

    /**
     * @param mixed $equip_model
     */
    public function setEquipModel($equip_model)
    {
        $this->equip_model = $equip_model;
    }

    /**
     * @return mixed
     */
    public function getEquipLabId()
    {
        return $this->equip_lab_id;
    }

    /**
     * @param mixed $equip_lab_id
     */
    public function setEquipLabId($equip_lab_id)
    {
        $this->equip_lab_id = $equip_lab_id;
    }

    /**
     * @return mixed
     */
    public function getEquipImg()
    {
        return $this->equip_img;
    }

    /**
     * @param mixed $equip_img
     */
    public function setEquipImg($equip_img)
    {
        $this->equip_img = $equip_img;
    }

    /**
     * @return mixed
     */
    public function getEquipPrice()
    {
        return $this->equip_price;
    }

    /**
     * @param mixed $equip_price
     */
    public function setEquipPrice($equip_price)
    {
        $this->equip_price = $equip_price;
    }

    /**
     * @return mixed
     */
    public function getEquipManu()
    {
        return $this->equip_manu;
    }

    /**
     * @param mixed $equip_manu
     */
    public function setEquipManu($equip_manu)
    {
        $this->equip_manu = $equip_manu;
    }

    /**
     * @return mixed
     */
    public function getEquipManuNo()
    {
        return $this->equip_manuNo;
    }

    /**
     * @param mixed $equip_manuNo
     */
    public function setEquipManuNo($equip_manuNo)
    {
        $this->equip_manuNo = $equip_manuNo;
    }

    /**
     * @return mixed
     */
    public function getEquipManuTime()
    {
        return $this->equip_manuTime;
    }

    /**
     * @param mixed $equip_manuTime
     */
    public function setEquipManuTime($equip_manuTime)
    {
        $this->equip_manuTime = $equip_manuTime;
    }

    /**
     * @return mixed
     */
    public function getEquipChaseTime()
    {
        return $this->equip_chaseTime;
    }

    /**
     * @param mixed $equip_chaseTime
     */
    public function setEquipChaseTime($equip_chaseTime)
    {
        $this->equip_chaseTime = $equip_chaseTime;
    }

    /**
     * @return mixed
     */
    public function getEquipDesc()
    {
        return $this->equip_desc;
    }

    /**
     * @param mixed $equip_desc
     */
    public function setEquipDesc($equip_desc)
    {
        $this->equip_desc = $equip_desc;
    }

    /**
     * @return mixed
     */
    public function getEquipStatus()
    {
        return $this->equip_status;
    }

    /**
     * @param mixed $equip_status
     */
    public function setEquipStatus($equip_status)
    {
        $this->equip_status = $equip_status;
    }


}