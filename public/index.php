<?php

namespace APP;

use APP\LIB\FrontController;

if(!\defined('DS')) \define('DS', \DIRECTORY_SEPARATOR);

require_once '..' . \DS . 'app' . \DS . 'config' . \DS . 'config.php';
require_once \APP_PATH . 'lib' . \DS . 'autoload.php';

$frontController = new FrontController();
$frontController->dispatch();