<?php

session_start();

require_once("vendor/autoload.php");

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

$app->config("debug", true);

require_once("functions.php");
require_once("admin.php");
require_once("user.php");
require_once("category.php");
require_once("product.php");
require_once("order.php");

$app->run();

?>