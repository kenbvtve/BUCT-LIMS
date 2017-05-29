<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/10
 * Time: 23:56
 */

class Lab_tb{
    private $lab_id;
    private $lab_name;
    private $lab_grade;
    private $lab_college;
    private $lab_zone;
    private $lab_desc;
    private $lab_img;
    private $lab_status;


    /**
     * @return mixed
     */
    public function getLabId()
    {
        return $this->lab_id;
    }

    /**
     * @param mixed $lab_id
     */
    public function setLabId($lab_id)
    {
        $this->lab_id = $lab_id;
    }

    /**
     * @return mixed
     */
    public function getLabName()
    {
        return $this->lab_name;
    }

    /**
     * @param mixed $lab_name
     */
    public function setLabName($lab_name)
    {
        $this->lab_name = $lab_name;
    }

    /**
     * @return mixed
     */
    public function getLabGrade()
    {
        return $this->lab_grade;
    }

    /**
     * @param mixed $lab_grade
     */
    public function setLabGrade($lab_grade)
    {
        $this->lab_grade = $lab_grade;
    }

    /**
     * @return mixed
     */
    public function getLabCollege()
    {
        return $this->lab_college;
    }

    /**
     * @param mixed $lab_college
     */
    public function setLabCollege($lab_college)
    {
        $this->lab_college = $lab_college;
    }

    /**
     * @return mixed
     */
    public function getLabZone()
    {
        return $this->lab_zone;
    }

    /**
     * @param mixed $lab_zone
     */
    public function setLabZone($lab_zone)
    {
        $this->lab_zone = $lab_zone;
    }

    /**
     * @return mixed
     */
    public function getLabDesc()
    {
        return $this->lab_desc;
    }

    /**
     * @param mixed $lab_desc
     */
    public function setLabDesc($lab_desc)
    {
        $this->lab_desc = $lab_desc;
    }

    /**
     * @return mixed
     */
    public function getLabImg()
    {
        return $this->lab_img;
    }

    /**
     * @param mixed $lab_img
     */
    public function setLabImg($lab_img)
    {
        $this->lab_img = $lab_img;
    }

    /**
     * @return mixed
     */
    public function getLabStatus()
    {
        return $this->lab_status;
    }

    /**
     * @param mixed $lab_status
     */
    public function setLabStatus($lab_status)
    {
        $this->lab_status = $lab_status;
    }

}