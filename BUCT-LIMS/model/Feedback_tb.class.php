<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/9
 * Time: 16:01
 */

class Feedback_tb{
    private $feedback_id;
    private $feedback_time;
    private $feedback_name;
    private $feedback_perid;
    private $feedback_phone;
    private $feedback_mail;
    private $feedback_content;

    /**
     * @return mixed
     */
    public function getFeedbackId()
    {
        return $this->feedback_id;
    }

    /**
     * @param mixed $feedback_id
     */
    public function setFeedbackId($feedback_id)
    {
        $this->feedback_id = $feedback_id;
    }

    /**
     * @return mixed
     */
    public function getFeedbackTime()
    {
        return $this->feedback_time;
    }

    /**
     * @param mixed $feedback_time
     */
    public function setFeedbackTime($feedback_time)
    {
        $this->feedback_time = $feedback_time;
    }

    /**
     * @return mixed
     */
    public function getFeedbackName()
    {
        return $this->feedback_name;
    }

    /**
     * @param mixed $feedback_name
     */
    public function setFeedbackName($feedback_name)
    {
        $this->feedback_name = $feedback_name;
    }

    /**
     * @return mixed
     */
    public function getFeedbackPerid()
    {
        return $this->feedback_perid;
    }

    /**
     * @param mixed $feedback_perid
     */
    public function setFeedbackPerid($feedback_perid)
    {
        $this->feedback_perid = $feedback_perid;
    }

    /**
     * @return mixed
     */
    public function getFeedbackPhone()
    {
        return $this->feedback_phone;
    }

    /**
     * @param mixed $feedback_phone
     */
    public function setFeedbackPhone($feedback_phone)
    {
        $this->feedback_phone = $feedback_phone;
    }

    /**
     * @return mixed
     */
    public function getFeedbackMail()
    {
        return $this->feedback_mail;
    }

    /**
     * @param mixed $feedback_mail
     */
    public function setFeedbackMail($feedback_mail)
    {
        $this->feedback_mail = $feedback_mail;
    }

    /**
     * @return mixed
     */
    public function getFeedbackContent()
    {
        return $this->feedback_content;
    }

    /**
     * @param mixed $feedback_content
     */
    public function setFeedbackContent($feedback_content)
    {
        $this->feedback_content = $feedback_content;
    }
}