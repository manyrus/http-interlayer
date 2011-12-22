<?php
/**
 * Created by JetBrains PhpStorm.
 * User: manyrus
 * Date: 20.12.11
 * Time: 21:11
 * To change this template use File | Settings | File Templates.
 */
class SessionStorage
{
    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        if(!isset($_SESSION[$key])) throw new SessionException("Нет такого значения с ключом {$key}");
        return $_SESSION[$key];
    }

    public function remove($key) {
        if(!isset($_SESSION[$key])) throw new SessionException("Нет такого значения с ключом {$key}");
        unset($_SESSION[$key]);
    }
}
