<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/11/16
 * Time: 2:40 AM
 */
class MShip
{
    private $uid;
    private $pid;
    private $name;
    private $price;
    private $type;
    private $create_date;
    private $update_date;
    private $author;

    private $ship_arr;

    /**
     * MShip constructor.
     * @param $ship_arr
     */
    public function __construct($ship_arr)
    {
        $this->ship_arr = $ship_arr;
        $this->mapping($this->ship_arr);
    }

    private function mapping($ship_arr)
    {
        $this->uid = $ship_arr["uid"];
        $this->pid = $ship_arr["pid"];
        $this->name = $ship_arr["name"];
        $this->price = $ship_arr["price"];
        $this->type = $ship_arr["type"];
        $this->create_date = $ship_arr["create_date"];
        $this->update_date = $ship_arr["update_date"];
        $this->author = $ship_arr["author"];
    }

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return mixed
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @param mixed $pid
     */
    public function setPid($pid)
    {
        $this->pid = $pid;
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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
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
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * @param mixed $create_date
     */
    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
    }

    /**
     * @return mixed
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * @param mixed $update_date
     */
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getShipArr()
    {
        return $this->ship_arr;
    }

    /**
     * @param mixed $ship_arr
     */
    public function setShipArr($ship_arr)
    {
        $this->ship_arr = $ship_arr;
    }
    
}