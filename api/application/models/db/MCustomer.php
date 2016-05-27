<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/11/16
 * Time: 2:40 AM
 */
class MCustomer extends MBase
{
    private $name;
    private $fb_account;
    private $phone;
    private $address;
    private $hcm;
    private $type;
    private $rank;
    private $point;
    private $black_list;
    private $notes;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFbAccount()
    {
        return $this->fb_account;
    }

    /**
     * @param mixed $fb_account
     */
    public function setFbAccount($fb_account)
    {
        $this->fb_account = $fb_account;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getHcm()
    {
        return $this->hcm;
    }

    /**
     * @param mixed $hcm
     */
    public function setHcm($hcm)
    {
        $this->hcm = $hcm;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param mixed $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * @return mixed
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @param mixed $point
     */
    public function setPoint($point)
    {
        $this->point = $point;
    }

    /**
     * @return mixed
     */
    public function getBlackList()
    {
        return $this->black_list;
    }

    /**
     * @param mixed $black_list
     */
    public function setBlackList($black_list)
    {
        $this->black_list = $black_list;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    protected function mapping($mapping_arr)
    {
        parent::mapping($mapping_arr);
        $this->name = $mapping_arr["name"];
        $this->fb_account = $mapping_arr["fb_account"];
        $this->phone = $mapping_arr["phone"];
        $this->address = $mapping_arr["address"];
        $this->hcm = $mapping_arr["hcm"];
        $this->type = $mapping_arr["type"];
        $this->rank = $mapping_arr["rank"];
        $this->point = $mapping_arr["point"];
        $this->black_list = $mapping_arr["black_list"];
        $this->notes = $mapping_arr["notes"];
    }

}