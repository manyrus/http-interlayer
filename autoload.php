<?php
/**
 * Created by JetBrains PhpStorm.
 * User: manyrus
 * Date: 22.12.11
 * Time: 19:38
 * To change this template use File | Settings | File Templates.
 */
class autoLoad {
    private static $dirMap= array();


    private static function loadMap($path = './') {
        $dirMap = array();
        $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('./'), true);
        foreach($dir as $file) {

            if($file->isFile() && substr(strrchr($file->getPathName(), '.'), 1) == "php") {
                $className = explode(".", $file->getFileName());
                $dirMap[$className[0]] = $file->getPathName();
            }
        }
        return $dirMap;
    }

    public static function loadClass($className) {
        if(empty(self::$dirMap)) self::$dirMap = self::loadMap();
        if(isset(self::$dirMap[$className]) && is_file(self::$dirMap[$className])) {
            require self::$dirMap[$className];
            return true;
        } else {
            return false;
        }


    }
}
spl_autoload_register(array("autoLoad","loadClass"), true);