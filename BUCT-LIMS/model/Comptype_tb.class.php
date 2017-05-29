<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/12
 * Time: 14:04
 */
class Comptype{
    private $comptype_id;
    private $comptype_name;
    /**
     * @return mixed
     */
    public function getComptypeId()
    {
        return $this->comptype_id;
    }

    /**
     * @param mixed $comptype_id
     */
    public function setComptypeId($comptype_id)
    {
        $this->comptype_id = $comptype_id;
    }

    /**
     * @return mixed
     */
    public function getComptypeName()
    {
        return $this->comptype_name;
    }

    /**
     * @param mixed $comptype_name
     */
    public function setComptypeName($comptype_name)
    {
        $this->comptype_name = $comptype_name;
    }

}