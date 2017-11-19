<?php
/**
 * Created by PhpStorm.
 * User: Vladymyrlem
 * Date: 07.08.2017
 * Time: 12:54
 */
require_once '../load.php';
include ('config/db.php');
include ('../application/web/libs/Session.php');
require_once ('../application/core/route.php');
//include (SITE_PATH . DS . 'core' . DS . 'application/core/core.php');
//$registry->set('routing', $router);
$router = new Route();
$router->start();
ini_set('display_errors', 1);
//include ('application/bootstrap.php');

//require ('..application/web/libs/Bootstrap.php');
require 'application/web/libs/Controller.php';
$app = new Bootstrap();