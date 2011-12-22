<?php
/**
 * Created by JetBrains PhpStorm.
 * User: manyrus
 * Date: 20.12.11
 * Time: 16:15
 * To change this template use File | Settings | File Templates.
 */
interface ISessionProvider
{
    public function open($savePath, $sessionName);
    public function close();
    public function read($id);
    public function write($id, $data);
    public function destroy($id);
    public function gc($maxLifeTime);
}
