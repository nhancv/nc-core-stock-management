<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/12/16
 * Time: 12:31 AM
 */
class MBase
{
    private $uid;
    private $pid;

    private $create_date;
    private $update_date;
    private $author;

    private $mapping_arr;

    /**
     * MBase constructor.
     * @param $mapping_arr
     */
    public function __construct($mapping_arr)
    {
        $this->mapping_arr = $mapping_arr;
        $this->mapping($this->mapping_arr);
    }

    protected function mapping(&$mapping_arr)
    {
        if (!isset($mapping_arr["uid"])) $mapping_arr["uid"] = UidGenerator::GeneratorUid();
        if (!isset($mapping_arr["pid"])) $mapping_arr["pid"] = UidGenerator::GeneratorUidL(8);
        if (!isset($mapping_arr["create_date"])) $mapping_arr["create_date"] = date("Y-m-d H:i:s");
        if (!isset($mapping_arr["update_date"])) $mapping_arr["update_date"] = date("Y-m-d H:i:s");
        if (!isset($mapping_arr["author"])) $mapping_arr["author"] = NULL;
        $this->uid = $mapping_arr["uid"];
        $this->pid = $mapping_arr["pid"];
        $this->create_date = $mapping_arr["create_date"];
        $this->update_date = $mapping_arr["update_date"];
        $this->author = $mapping_arr["author"];

    }

    public static function checkNull($array_obj)
    {
        if (!isset($array_obj["uid"])) return true;
        if (!isset($array_obj["pid"])) return true;
        return false;
    }

    public static function checkNullField($field)
    {
        if (!isset($field)) return true;
        return false;
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
    public function getMappingArr()
    {
        return $this->mapping_arr;
    }

    /**
     * @param mixed $mapping_arr
     */
    public function setMappingArr($mapping_arr)
    {
        $this->mapping_arr = $mapping_arr;
    }
}