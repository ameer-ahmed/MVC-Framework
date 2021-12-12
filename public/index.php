<?php

namespace APP;

use APP\LIB\FrontController;
use APP\LIB\Template;

if(!\defined('DS')) \define('DS', \DIRECTORY_SEPARATOR);

require_once '..' . \DS . 'app' . \DS . 'config' . \DS . 'config.php';
require_once \APP_PATH . 'lib' . \DS . 'autoload.php';

$template_parts = require_once \APP_PATH . 'config' . \DS . 'template' . \CURRENT_TEMPLATE . 'config.php';
$template = new Template($template_parts);

$frontController = new FrontController($template);
$frontController->dispatch();