<?php
/**
 * Created by JetBrains PhpStorm.
 * User: manyrus
 * Date: 22.12.11
 * Time: 19:38
 * To change this template use File | Settings | File Templates.
 */
ini_set("display_errors","1");
error_reporting(E_ALL);
header("charset=utf-8");

include "autoload.php";


$cookie = new Cookie();

$parameters = new CookieParameters();
$cookie->setCookieParameters(
    $parameters->setLifeTime(0xffffff)
        ->setHttpOnlyFlag(true)
);
$cookie->set("tes2t", "value");

echo $cookie->get("tes2t");


