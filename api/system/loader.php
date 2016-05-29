<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/27/16
 * Time: 8:01 PM
 */
class Loader
{
    private static $baseFiles = [APP_DIR . 'models/db/MBase.php'];

    public static function loadBaseFiles()
    {
        foreach (Loader::$baseFiles as $path) {
//            echo 'Base files'. $path."<br>";
            require_once($path);
        }
    }

    /**
     * @param $dir
     */
    public static function loadAllFiles($dir)
    {
        if ($handle = opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && strpos($entry, '.php') !== false && !in_array($dir . '/' . $entry, Loader::$baseFiles)) {
//                    echo $dir . '/' . $entry . "<br>";
                    require_once($dir . '/' . $entry);
                }
            }
            closedir($handle);
        }
    }
}