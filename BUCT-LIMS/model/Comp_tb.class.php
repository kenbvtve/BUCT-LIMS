<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/10
 * Time: 15:48
 */
class Comp_tb{
    private $comp_id;
    private $comp_name;
    private $comp_type;
    private $comp_sponsor;
    private $comp_numper;
    private $comp_info;
    private $comp_depart;
    private $comp_start;
    private $comp_end;
    private $comp_file;
    private $comp_status; //竞赛状态(1报名中2竞赛中3已结束)

    /**
     * @return mixed
     */
    public function getCompId()
    {
        return $this->comp_id;
    }

    /**
     * @param mixed $comp_id
     */
    public function setCompId($comp_id)
    {
        $this->comp_id = $comp_id;
    }

    /**
     * @return mixed
     */
    public function getCompName()
    {
        return $this->comp_name;
    }

    /**
     * @param mixed $comp_name
     */
    public function setCompName($comp_name)
    {
        $this->comp_name = $comp_name;
    }

    /**
     * @return mixed
     */
    public function getCompType()
    {
        return $this->comp_type;
    }

    /**
     * @param mixed $comp_type
     */
    public function setCompType($comp_type)
    {
        $this->comp_type = $comp_type;
    }

    /**
     * @return mixed
     */
    public function getCompSponsor()
    {
        return $this->comp_sponsor;
    }

    /**
     * @param mixed $comp_sponsor
     */
    public function setCompSponsor($comp_sponsor)
    {
        $this->comp_sponsor = $comp_sponsor;
    }

    /**
     * @return mixed
     */
    public function getCompNumper()
    {
        return $this->comp_numper;
    }

    /**
     * @param mixed $comp_numper
     */
    public function setCompNumper($comp_numper)
    {
        $this->comp_numper = $comp_numper;
    }

    /**
     * @return mixed
     */
    public function getCompInfo()
    {
        return $this->comp_info;
    }

    /**
     * @param mixed $comp_info
     */
    public function setCompInfo($comp_info)
    {
        $this->comp_info = $comp_info;
    }

    /**
     * @return mixed
     */
    public function getCompDepart()
    {
        return $this->comp_depart;
    }

    /**
     * @param mixed $comp_depart
     */
    public function setCompDepart($comp_depart)
    {
        $this->comp_depart = $comp_depart;
    }

    /**
     * @return mixed
     */
    public function getCompStart()
    {
        return $this->comp_start;
    }

    /**
     * @param mixed $comp_start
     */
    public function setCompStart($comp_start)
    {
        $this->comp_start = $comp_start;
    }

    /**
     * @return mixed
     */
    public function getCompEnd()
    {
        return $this->comp_end;
    }

    /**
     * @param mixed $comp_end
     */
    public function setCompEnd($comp_end)
    {
        $this->comp_end = $comp_end;
    }

    /**
     * @return mixed
     */
    public function getCompFile()
    {
        return $this->comp_file;
    }

    /**
     * @param mixed $comp_file
     */
    public function setCompFile($comp_file)
    {
        $this->comp_file = $comp_file;
    }

    /**
     * @return mixed
     */
    public function getCompStatus()
    {
        return $this->comp_status;
    }

    /**
     * @param mixed $comp_status
     */
    public function setCompStatus($comp_status)
    {
        $this->comp_status = $comp_status;
    }
}