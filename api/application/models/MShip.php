<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/11/16
 * Time: 2:40 AM
 */
class MShip extends MBase
{
    private $name;
    private $price;
    private $type;

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

    protected function mapping($mapping_arr)
    {
        parent::mapping($mapping_arr);
        $this->name = $mapping_arr["name"];
        $this->price = $mapping_arr["price"];
        $this->type = $mapping_arr["type"];
    }

}