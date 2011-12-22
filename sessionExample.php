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

$session = new Session();
$session->setSessionProvider(new FileSessionProvider());

$parameters = new CookieParameters();
$session->setCookieParameters(
    $parameters->setLifeTime(3600)
        ->setHttpOnlyFlag(true)
);
$session->start();

$session->getSessionStorage()->set("test", "value");

echo $session->getSessionStorage()->get("test");

