<?php
/**
 * Created by JetBrains PhpStorm.
 * User: manyrus
 * Date: 20.12.11
 * Time: 16:13
 * To change this template use File | Settings | File Templates.
 */
include "providers/SessionProvider.php";
include "providers/ISessionProvider.php";
include "providers/FileSessionProvider.php";
include "SessionException.php";
include "../cookie/CookieParameters.php";
include "SessionStorage.php";
class Session
{
    /**
     * @var SessionStorage
     */
    private $storage;

    /**
     * @var bool
     */
    private $init = false;


    public function start() {
        session_start();
        $this->init = true;
    }

    public function destroy() {
        session_destroy();
    }

    public function getSessionStorage() {
        if(!$this->init) throw new SessionException("Метод \"Session::getSessionStorage()\" может быть вызван после вызова метода \"Session::start()\".");
        if(!isset($this->storage)) {
            $this->storage = new SessionStorage();
        }
        return $this->storage;
    }

    public function setSessionProvider(ISessionProvider $provider) {
        if($this->init) throw new SessionException("Метод \"Session::setSessionProvider()\" может быть вызван до вызова метода \"Session::start()\".");
        session_set_save_handler(
            array($provider,"open"),
            array($provider,"close"),
            array($provider,"read"),
            array($provider,"write"),
            array($provider,"destroy"),
            array($provider,"gc")
        );
    }

    public function setCookieParameters(CookieParameters $bag) {
        if($this->init) throw new SessionException("Метод \"Session::setCookieParameters()\" может быть вызван после вызова метода \"Session::start()\".");
        session_set_cookie_params($bag->getLifeTime(), $bag->getPath(), $bag->getDomain(), $bag->getHttpsFlag(), $bag->getHttpOnlyFlag());
    }
}

$session = new Session();
$session->setSessionProvider(new FileSessionProvider());

$bag = new CookieParameters();
$session->setCookieParameters(
    $bag->setLifeTime(3600)
        ->setHttpOnlyFlag(true)
);
$session->start();

$session->getSessionStorage()->set("test", "value");

echo $session->getSessionStorage()->get("test");

