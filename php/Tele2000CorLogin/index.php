<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Erwan
 * Date: 05/12/14
 * Time: 16:12
 * To change this template use File | Settings | File Templates.
 */
require_once('autoload.php');

use Controller\Router;

define('VIEWPATH', __DIR__.'\\'.'VIEW\\');

$router = new Router();
$router->routeRequest();