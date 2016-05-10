<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/11/16
 * Time: 2:40 AM
 */
class MStock
{
    private $uid;
    private $pid;
    private $usr_id;
    private $prod_id;
    private $amount;
    private $in_stock;
    private $available_date;
    private $flexible_date;
    private $create_date;
    private $update_date;
    private $author;

    private $stock_arr;

    /**
     * MStock constructor.
     * @param $stock_arr
     */
    public function __construct($stock_arr)
    {
        $this->stock_arr = $stock_arr;
        $this->mapping($this->stock_arr);
    }

    private function mapping($stock_arr)
    {
        $this->uid = $stock_arr["uid"];
        $this->pid = $stock_arr["pid"];
        $this->usr_id = $stock_arr["usr_id"];
        $this->prod_id = $stock_arr["prod_id"];
        $this->amount = $stock_arr["amount"];
        $this->in_stock = $stock_arr["in_stock"];
        $this->available_date = $stock_arr["available_date"];
        $this->flexible_date = $stock_arr["flexible_date"];
        $this->create_date = $stock_arr["create_date"];
        $this->update_date = $stock_arr["update_date"];
        $this->author = $stock_arr["author"];
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
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
    public function getUsrId()
    {
        return $this->usr_id;
    }

    /**
     * @param mixed $usr_id
     */
    public function setUsrId($usr_id)
    {
        $this->usr_id = $usr_id;
    }

    /**
     * @return mixed
     */
    public function getProdId()
    {
        return $this->prod_id;
    }

    /**
     * @param mixed $prod_id
     */
    public function setProdId($prod_id)
    {
        $this->prod_id = $prod_id;
    }

    /**
     * @return mixed
     */
    public function getInStock()
    {
        return $this->in_stock;
    }

    /**
     * @param mixed $in_stock
     */
    public function setInStock($in_stock)
    {
        $this->in_stock = $in_stock;
    }

    /**
     * @return mixed
     */
    public function getAvailableDate()
    {
        return $this->available_date;
    }

    /**
     * @param mixed $available_date
     */
    public function setAvailableDate($available_date)
    {
        $this->available_date = $available_date;
    }

    /**
     * @return mixed
     */
    public function getFlexibleDate()
    {
        return $this->flexible_date;
    }

    /**
     * @param mixed $flexible_date
     */
    public function setFlexibleDate($flexible_date)
    {
        $this->flexible_date = $flexible_date;
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
    public function getStockArr()
    {
        return $this->stock_arr;
    }

    /**
     * @param mixed $stock_arr
     */
    public function setStockArr($stock_arr)
    {
        $this->stock_arr = $stock_arr;
    }

}