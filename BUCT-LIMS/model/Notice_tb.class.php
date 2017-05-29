<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/10
 * Time: 13:23
 */

class Notice_tb{
    private $notice_id;
    private $notice_title;
    private $notice_content;
    private $notice_time;

    /**
     * @return mixed
     */
    public function getNoticeId()
    {
        return $this->notice_id;
    }

    /**
     * @param mixed $notice_id
     */
    public function setNoticeId($notice_id)
    {
        $this->notice_id = $notice_id;
    }

    /**
     * @return mixed
     */
    public function getNoticeTitle()
    {
        return $this->notice_title;
    }

    /**
     * @param mixed $notice_title
     */
    public function setNoticeTitle($notice_title)
    {
        $this->notice_title = $notice_title;
    }

    /**
     * @return mixed
     */
    public function getNoticeContent()
    {
        return $this->notice_content;
    }

    /**
     * @param mixed $notice_content
     */
    public function setNoticeContent($notice_content)
    {
        $this->notice_content = $notice_content;
    }

    /**
     * @return mixed
     */
    public function getNoticeTime()
    {
        return $this->notice_time;
    }

    /**
     * @param mixed $notice_time
     */
    public function setNoticeTime($notice_time)
    {
        $this->notice_time = $notice_time;
    }

}