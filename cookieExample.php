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

include "autoload.php";

$cookie = new Cookie();

$parameters = new CookieParameters();
$cookie->setCookieParameters(
    $parameters->setLifeTime(3600)
        ->setHttpOnlyFlag(true)
);
$cookie->set("tes2t", "value");
try {
    echo $cookie->get("tes2t"); //исключение может возникнуть если COOKIE был полсан и сразу же был получен из хранилища.
} catch(CookieException $e) {
    echo "COOKIES была установлена первый раз!";
}




