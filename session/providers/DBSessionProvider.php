<?php
/**
 * Created by JetBrains PhpStorm.
 * User: manyrus
 * Date: 20.12.11
 * Time: 16:13
 * To change this template use File | Settings | File Templates.
 */
class DBSessionProvider extends SessionProvider implements ISessionProvider
{
    protected $savePath;
    protected $sessionName;

    public function close()
    {
        // TODO: Implement close() method.
    }



    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    public function read($id)
    {
        // TODO: Implement read() method.
    }

    public function write($id, $data)
    {
        // TODO: Implement write() method.
    }

    public function gc($maxLifeTime)
    {
        // TODO: Implement gc() method.
    }
}
