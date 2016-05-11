<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/11/16
 * Time: 2:40 AM
 */
class MProduct extends MBase
{
    private $name;
    private $material;
    private $size;
    private $color;
    private $description;
    private $product_type;
    private $price;
    private $special_price;
    private $promotional_price;
    private $promotional_price_from_date;
    private $promotional_price_to_date;
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
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @param mixed $material
     */
    public function setMaterial($material)
    {
        $this->material = $material;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getProductType()
    {
        return $this->product_type;
    }

    /**
     * @param mixed $product_type
     */
    public function setProductType($product_type)
    {
        $this->product_type = $product_type;
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
    public function getSpecialPrice()
    {
        return $this->special_price;
    }

    /**
     * @param mixed $special_price
     */
    public function setSpecialPrice($special_price)
    {
        $this->special_price = $special_price;
    }

    /**
     * @return mixed
     */
    public function getPromotionalPrice()
    {
        return $this->promotional_price;
    }

    /**
     * @param mixed $promotional_price
     */
    public function setPromotionalPrice($promotional_price)
    {
        $this->promotional_price = $promotional_price;
    }

    /**
     * @return mixed
     */
    public function getPromotionalPriceFromDate()
    {
        return $this->promotional_price_from_date;
    }

    /**
     * @param mixed $promotional_price_from_date
     */
    public function setPromotionalPriceFromDate($promotional_price_from_date)
    {
        $this->promotional_price_from_date = $promotional_price_from_date;
    }

    /**
     * @return mixed
     */
    public function getPromotionalPriceToDate()
    {
        return $this->promotional_price_to_date;
    }

    /**
     * @param mixed $promotional_price_to_date
     */
    public function setPromotionalPriceToDate($promotional_price_to_date)
    {
        $this->promotional_price_to_date = $promotional_price_to_date;
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
        $this->material = $mapping_arr["material"];
        $this->size = $mapping_arr["size"];
        $this->color = $mapping_arr["color"];
        $this->description = $mapping_arr["description"];
        $this->product_type = $mapping_arr["product_type"];
        $this->price = $mapping_arr["price"];
        $this->special_price = $mapping_arr["special_price"];
        $this->promotional_price = $mapping_arr["promotional_price"];
        $this->promotional_price_from_date = $mapping_arr["promotional_price_from_date"];
        $this->promotional_price_to_date = $mapping_arr["promotional_price_to_date"];
        $this->notes = $mapping_arr["notes"];
    }

}