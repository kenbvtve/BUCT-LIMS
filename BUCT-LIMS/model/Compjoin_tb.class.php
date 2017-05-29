<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/13
 * Time: 16:41
 */
class Compjoin_tb{
    private $compjoin_id;
    private $comp_id;
    private $compjoin_name;
    private $compjoin_leaderName;
    private $compjoin_leaderId;
    private $compjoin_leaderPhone;
    private $compjoin_leaderMail;
    private $compjoin_memberName_1;
    private $compjoin_memberId_1;
    private $compjoin_memberName_2;
    private $compjoin_memberId_2;
    private $compjoin_memberName_3;
    private $compjoin_memberId_3;
    private $compjoin_memberName_4;
    private $compjoin_memberId_4;
    private $compjoin_teaName;
    private $compjoin_teaId;
    private $compjoin_teaPhone;
    private $compjoin_teaMail;
    private $compjoin_glory;
    private $compjoin_status; //报名状态(1审核中2报名成功3已拒绝)

    /**
     * @return mixed
     */
    public function getCompjoinId()
    {
        return $this->compjoin_id;
    }

    /**
     * @param mixed $compjoin_id
     */
    public function setCompjoinId($compjoin_id)
    {
        $this->compjoin_id = $compjoin_id;
    }

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
    public function getCompjoinName()
    {
        return $this->compjoin_name;
    }

    /**
     * @param mixed $compjoin_name
     */
    public function setCompjoinName($compjoin_name)
    {
        $this->compjoin_name = $compjoin_name;
    }

    /**
     * @return mixed
     */
    public function getCompjoinLeaderName()
    {
        return $this->compjoin_leaderName;
    }

    /**
     * @param mixed $compjoin_leaderName
     */
    public function setCompjoinLeaderName($compjoin_leaderName)
    {
        $this->compjoin_leaderName = $compjoin_leaderName;
    }

    /**
     * @return mixed
     */
    public function getCompjoinLeaderId()
    {
        return $this->compjoin_leaderId;
    }

    /**
     * @param mixed $compjoin_leaderId
     */
    public function setCompjoinLeaderId($compjoin_leaderId)
    {
        $this->compjoin_leaderId = $compjoin_leaderId;
    }

    /**
     * @return mixed
     */
    public function getCompjoinLeaderPhone()
    {
        return $this->compjoin_leaderPhone;
    }

    /**
     * @param mixed $compjoin_leaderPhone
     */
    public function setCompjoinLeaderPhone($compjoin_leaderPhone)
    {
        $this->compjoin_leaderPhone = $compjoin_leaderPhone;
    }

    /**
     * @return mixed
     */
    public function getCompjoinLeaderMail()
    {
        return $this->compjoin_leaderMail;
    }

    /**
     * @param mixed $compjoin_leaderMail
     */
    public function setCompjoinLeaderMail($compjoin_leaderMail)
    {
        $this->compjoin_leaderMail = $compjoin_leaderMail;
    }

    /**
     * @return mixed
     */
    public function getCompjoinMemberName1()
    {
        return $this->compjoin_memberName_1;
    }

    /**
     * @param mixed $compjoin_memberName_1
     */
    public function setCompjoinMemberName1($compjoin_memberName_1)
    {
        $this->compjoin_memberName_1 = $compjoin_memberName_1;
    }

    /**
     * @return mixed
     */
    public function getCompjoinMemberId1()
    {
        return $this->compjoin_memberId_1;
    }

    /**
     * @param mixed $compjoin_memberId_1
     */
    public function setCompjoinMemberId1($compjoin_memberId_1)
    {
        $this->compjoin_memberId_1 = $compjoin_memberId_1;
    }

    /**
     * @return mixed
     */
    public function getCompjoinMemberName2()
    {
        return $this->compjoin_memberName_2;
    }

    /**
     * @param mixed $compjoin_memberName_2
     */
    public function setCompjoinMemberName2($compjoin_memberName_2)
    {
        $this->compjoin_memberName_2 = $compjoin_memberName_2;
    }

    /**
     * @return mixed
     */
    public function getCompjoinMemberId2()
    {
        return $this->compjoin_memberId_2;
    }

    /**
     * @param mixed $compjoin_memberId_2
     */
    public function setCompjoinMemberId2($compjoin_memberId_2)
    {
        $this->compjoin_memberId_2 = $compjoin_memberId_2;
    }

    /**
     * @return mixed
     */
    public function getCompjoinMemberName3()
    {
        return $this->compjoin_memberName_3;
    }

    /**
     * @param mixed $compjoin_memberName_3
     */
    public function setCompjoinMemberName3($compjoin_memberName_3)
    {
        $this->compjoin_memberName_3 = $compjoin_memberName_3;
    }

    /**
     * @return mixed
     */
    public function getCompjoinMemberId3()
    {
        return $this->compjoin_memberId_3;
    }

    /**
     * @param mixed $compjoin_memberId_3
     */
    public function setCompjoinMemberId3($compjoin_memberId_3)
    {
        $this->compjoin_memberId_3 = $compjoin_memberId_3;
    }

    /**
     * @return mixed
     */
    public function getCompjoinMemberName4()
    {
        return $this->compjoin_memberName_4;
    }

    /**
     * @param mixed $compjoin_memberName_4
     */
    public function setCompjoinMemberName4($compjoin_memberName_4)
    {
        $this->compjoin_memberName_4 = $compjoin_memberName_4;
    }

    /**
     * @return mixed
     */
    public function getCompjoinMemberId4()
    {
        return $this->compjoin_memberId_4;
    }

    /**
     * @param mixed $compjoin_memberId_4
     */
    public function setCompjoinMemberId4($compjoin_memberId_4)
    {
        $this->compjoin_memberId_4 = $compjoin_memberId_4;
    }

    /**
     * @return mixed
     */
    public function getCompjoinTeaName()
    {
        return $this->compjoin_teaName;
    }

    /**
     * @param mixed $compjoin_teaName
     */
    public function setCompjoinTeaName($compjoin_teaName)
    {
        $this->compjoin_teaName = $compjoin_teaName;
    }

    /**
     * @return mixed
     */
    public function getCompjoinTeaId()
    {
        return $this->compjoin_teaId;
    }

    /**
     * @param mixed $compjoin_teaId
     */
    public function setCompjoinTeaId($compjoin_teaId)
    {
        $this->compjoin_teaId = $compjoin_teaId;
    }

    /**
     * @return mixed
     */
    public function getCompjoinTeaPhone()
    {
        return $this->compjoin_teaPhone;
    }

    /**
     * @param mixed $compjoin_teaPhone
     */
    public function setCompjoinTeaPhone($compjoin_teaPhone)
    {
        $this->compjoin_teaPhone = $compjoin_teaPhone;
    }

    /**
     * @return mixed
     */
    public function getCompjoinTeaMail()
    {
        return $this->compjoin_teaMail;
    }

    /**
     * @param mixed $compjoin_teaMail
     */
    public function setCompjoinTeaMail($compjoin_teaMail)
    {
        $this->compjoin_teaMail = $compjoin_teaMail;
    }

    /**
     * @return mixed
     */
    public function getCompjoinGlory()
    {
        return $this->compjoin_glory;
    }

    /**
     * @param mixed $compjoin_glory
     */
    public function setCompjoinGlory($compjoin_glory)
    {
        $this->compjoin_glory = $compjoin_glory;
    }

    /**
     * @return mixed
     */
    public function getCompjoinStatus()
    {
        return $this->compjoin_status;
    }

    /**
     * @param mixed $compjoin_status
     */
    public function setCompjoinStatus($compjoin_status)
    {
        $this->compjoin_status = $compjoin_status;
    }
}