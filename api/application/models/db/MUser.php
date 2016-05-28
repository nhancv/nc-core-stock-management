<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 5:03 PM
 */
class MUser extends MBase
{
    private $password;
    private $name;
    private $phone;
    private $address;
    private $type;
    private $block;

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

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
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * @param mixed $block
     */
    public function setBlock($block)
    {
        $this->block = $block;
    }

    protected function mapping($mapping_arr)
    {
        parent::mapping($mapping_arr);
        if (!isset($mapping_arr["password"])) $mapping_arr["password"] = NULL;
        if (!isset($mapping_arr["name"])) $mapping_arr["name"] = NULL;
        if (!isset($mapping_arr["phone"])) $mapping_arr["phone"] = NULL;
        if (!isset($mapping_arr["address"])) $mapping_arr["address"] = NULL;
        if (!isset($mapping_arr["type"])) $mapping_arr["type"] = NULL;
        if (!isset($mapping_arr["block"])) $mapping_arr["block"] = NULL;
        $this->password = md5($mapping_arr["password"]);
        $this->name = $mapping_arr["name"];
        $this->phone = $mapping_arr["phone"];
        $this->address = $mapping_arr["address"];
        $this->type = $mapping_arr["type"];
        $this->block = $mapping_arr["block"];
    }

}