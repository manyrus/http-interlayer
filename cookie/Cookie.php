<?php
include "CookieParameters.php";
$_COOKIE["tt"] = "ttrr";
$_COOKIE["tts"] = "ttrr";
/**
 * Created by JetBrains PhpStorm.
 * User: manyrus
 * Date: 19.12.11
 * Time: 20:51
 * To change this template use File | Settings | File Templates.
 */
class Cookie
{
    /**
     * @var CookieParameters
     */
    private $cookieParameters;

    public function setCookieParameters(CookieParameters $parameters) {
        $this->cookieParameters = $parameters;
    }

    public function set($key, $value) {
        setcookie($key, $value, $this->cookieParameters->getLifeTime(),
            $this->cookieParameters->getPath(),
            $this->cookieParameters->getDomain(),
            $this->cookieParameters->getHttpsFlag(),
            $this->cookieParameters->getHttpOnlyFlag()
        );
    }

    public function get($key) {
        return $_COOKIE[$key];
    }

    public function remove($key) {

        unset($_COOKIE[$key]);
    }

}

