<?php


class Equiptype_tb{
    private $equiptype_id;
    private $equiptype_name;

    /**
     * @return mixed
     */
    public function getEquiptypeId()
    {
        return $this->equiptype_id;
    }

    /**
     * @param mixed $equiptype_id
     */
    public function setEquiptypeId($equiptype_id)
    {
        $this->equiptype_id = $equiptype_id;
    }

    /**
     * @return mixed
     */
    public function getEquiptypeName()
    {
        return $this->equiptype_name;
    }

    /**
     * @param mixed $equiptype_name
     */
    public function setEquiptypeName($equiptype_name)
    {
        $this->equiptype_name = $equiptype_name;
    }
}