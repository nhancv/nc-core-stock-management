<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/11/16
 * Time: 2:40 AM
 */
class MStock extends MBase
{
    private $usr_id;
    private $prod_id;
    private $amount;
    private $in_stock;
    private $available_date;
    private $flexible_date;

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

    protected function mapping($mapping_arr)
    {
        parent::mapping($mapping_arr);
        $this->usr_id = $mapping_arr["usr_id"];
        $this->prod_id = $mapping_arr["prod_id"];
        $this->amount = $mapping_arr["amount"];
        $this->in_stock = $mapping_arr["in_stock"];
        $this->available_date = $mapping_arr["available_date"];
        $this->flexible_date = $mapping_arr["flexible_date"];
    }

}