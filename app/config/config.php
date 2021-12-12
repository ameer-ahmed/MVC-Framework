<?php

if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

define('NS', 'APP');

define('CURRENT_TEMPLATE', 1);

define('APP_PATH', dirname(realpath(__FILE__)) . DS . '..' . DS);
define('VIEW_PATH', APP_PATH . 'views' . DS);
define('TEMPLATE_PATH', APP_PATH . 'templates' . DS . 'template' . CURRENT_TEMPLATE . DS);

define('FIXED_CSS', '/fixed/css/');
define('FIXED_JS', '/fixed/js/');
define('CSS', '/templates/template' . CURRENT_TEMPLATE . '/css/');
define('JS', '/templates/template' . CURRENT_TEMPLATE . '/js/');