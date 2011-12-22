<?php
/**
 * Created by JetBrains PhpStorm.
 * User: manyrus
 * Date: 20.12.11
 * Time: 16:19
 * To change this template use File | Settings | File Templates.
 */
class SessionProvider
{
    protected $savePath;
    protected $sessionName;

    public function open($savePath, $sessionName) {
        $this->savePath = $savePath;
        $this->sessionName = $sessionName;
        return true;
    }
}
