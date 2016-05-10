<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/11/16
 * Time: 2:40 AM
 */
class MTransaction
{
    private $uid;
    private $pid;
    private $cus_id;
    private $prod_id;
    private $usr_id;
    private $type;
    private $amount;
    private $payment_type;
    private $ship_id;
    private $price_total;
    private $subscription_date;
    private $delivery_date;
    private $receiving_date;
    private $sender;
    private $status;
    private $notes;
    private $create_date;
    private $update_date;
    private $author;

    private $transaction_arr;
    /**
     * MTransaction constructor.
     * @param $transaction_arr
     */
    public function __construct($transaction_arr)
    {
        $this->transaction_arr = $transaction_arr;
        $this->mapping($this->transaction_arr);
    }

    private function mapping($transaction_arr){
        $this->uid = $transaction_arr["uid"];
        $this->pid = $transaction_arr["pid"];
        $this->cus_id = $transaction_arr["cus_id"];
        $this->prod_id = $transaction_arr["prod_id"];
        $this->usr_id = $transaction_arr["usr_id"];
        $this->type = $transaction_arr["type"];
        $this->amount = $transaction_arr["amount"];
        $this->payment_type = $transaction_arr["payment_type"];
        $this->ship_id = $transaction_arr["ship_id"];
        $this->price_total = $transaction_arr["price_total"];
        $this->subscription_date = $transaction_arr["subscription_date"];
        $this->delivery_date = $transaction_arr["delivery_date"];
        $this->receiving_date = $transaction_arr["receiving_date"];
        $this->sender = $transaction_arr["sender"];
        $this->status = $transaction_arr["status"];
        $this->notes = $transaction_arr["notes"];
        $this->create_date = $transaction_arr["create_date"];
        $this->update_date = $transaction_arr["update_date"];
        $this->author = $transaction_arr["author"];

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
    public function getCusId()
    {
        return $this->cus_id;
    }

    /**
     * @param mixed $cus_id
     */
    public function setCusId($cus_id)
    {
        $this->cus_id = $cus_id;
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
    public function getPaymentType()
    {
        return $this->payment_type;
    }

    /**
     * @param mixed $payment_type
     */
    public function setPaymentType($payment_type)
    {
        $this->payment_type = $payment_type;
    }

    /**
     * @return mixed
     */
    public function getShipId()
    {
        return $this->ship_id;
    }

    /**
     * @param mixed $ship_id
     */
    public function setShipId($ship_id)
    {
        $this->ship_id = $ship_id;
    }

    /**
     * @return mixed
     */
    public function getPriceTotal()
    {
        return $this->price_total;
    }

    /**
     * @param mixed $price_total
     */
    public function setPriceTotal($price_total)
    {
        $this->price_total = $price_total;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionDate()
    {
        return $this->subscription_date;
    }

    /**
     * @param mixed $subscription_date
     */
    public function setSubscriptionDate($subscription_date)
    {
        $this->subscription_date = $subscription_date;
    }

    /**
     * @return mixed
     */
    public function getDeliveryDate()
    {
        return $this->delivery_date;
    }

    /**
     * @param mixed $delivery_date
     */
    public function setDeliveryDate($delivery_date)
    {
        $this->delivery_date = $delivery_date;
    }

    /**
     * @return mixed
     */
    public function getReceivingDate()
    {
        return $this->receiving_date;
    }

    /**
     * @param mixed $receiving_date
     */
    public function setReceivingDate($receiving_date)
    {
        $this->receiving_date = $receiving_date;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
    public function getTransactionArr()
    {
        return $this->transaction_arr;
    }

    /**
     * @param mixed $transaction_arr
     */
    public function setTransactionArr($transaction_arr)
    {
        $this->transaction_arr = $transaction_arr;
    }

}