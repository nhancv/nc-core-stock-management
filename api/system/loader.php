<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/27/16
 * Time: 8:01 PM
 */
class Loader
{
    /**
     * @param $dir
     */
    public static function loadAllFiles($dir)
    {
        if ($handle = opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && strpos($entry, '.php') !== false) {
//                    echo $dir. '/' .$entry."\n";
                    require_once($dir . '/' . $entry);
                }
            }
            closedir($handle);
        }
    }
}