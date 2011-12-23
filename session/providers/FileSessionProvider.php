<?php
/**
 * Created by JetBrains PhpStorm.
 * User: manyrus
 * Date: 20.12.11
 * Time: 16:13
 * To change this template use File | Settings | File Templates.
 */
class FileSessionProvider extends SessionProvider implements ISessionProvider
{
    private $dir;

    public function __construct() {
        $this->dir = getcwd() . "/.session";
    }


    public function close()
    {
        return true;
    }

    public function read($id)
    {
        $file = $this->dir."/".$id.".dat";
        if(!is_file($file)) return false;
        return file_get_contents($file);
    }

    public function write($id, $data)
    {
        $file = $this->dir."/".$id.".dat";
        if(file_put_contents($file, $data)) {
            return true;
        }else {
            return false;
        }


    }

    public function destroy($id)
    {
        $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->dir."/".$id.".dat"), true);
        foreach($dir as $file) {
            if($file->isFile()) {
                unlink($file->getPathName());
            }
        }
    }

    public function gc($maxLifeTime)
    {
        $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->dir), true);
        foreach($dir as $file) {
            if($file->isFile()) {
                if (substr(strrchr($file->getPathName(), '.'), 1) == "dat" && filemtime($file->getPathName()) + $maxLifeTime < time()) {
                    unlink($file->getPathName());
                }
            }
        }
    }

    public function setDir($dir) {
        $this->dir = getcwd() . "/" . $dir; //bug
    }
}
