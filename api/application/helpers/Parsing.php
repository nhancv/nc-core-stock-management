<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/27/16
 * Time: 7:06 PM
 */
class Parsing
{

    /*
{
    "uid": "1",
    "pid": "admin",
    "password": "1",
    "name": "Nhan Cao",
    "phone": null,
    "address": null,
    "type": "0",
    "block": "0",
    "create_date": "2016-05-10 00:45:46",
    "update_date": "2016-05-10 00:45:46",
    "author": "Nhan Cao"
}
     */
    public static function parsingNewUser($jsonData)
    {
        return Parsing::parsingUser($jsonData);
    }

    private static function parsingUser($jsonData)
    {
        return new MUser($jsonData);
    }

    public static function parsingEditUser($jsonData)
    {
        $user = new MUser($jsonData);
        $user->setUpdateDate(date("Y-m-d H:i:s"));
        return $user;
    }
}