<?php
/**
 * Created by JetBrains PhpStorm.
 * User: manyrus
 * Date: 20.12.11
 * Time: 16:13
 * To change this template use File | Settings | File Templates.
 */

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

    public function __construct() {
        ini_set('session.gc_maxlifetime', 2592000);
    }


    public function setGcMaxLifeTime($gcMaxLifeTime) {
        if($this->init) throw new SessionException("Метод \"Session::setGcMaxLifeTime()\" может быть вызван до вызова метода \"Session::start()\".");
        ini_set('session.gc_maxlifetime', $gcMaxLifeTime);
    }


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
        session_set_cookie_params(
            $bag->getLifeTime() ,
            $bag->getPath(),
            $bag->getDomain(),
            $bag->getHttpsFlag(),
            $bag->getHttpOnlyFlag());
    }
}


