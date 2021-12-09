<?php

namespace APP\LIB;

class Autoload {

    public static function autoload($className) {
        $className = \str_replace(\NS, '', $className);
        $className = \strtolower($className);
        $className .= '.php';
        $path = \DS == '\\' ? \APP_PATH . $className : \APP_PATH . \str_replace('\\', '/', $className);
        if(\file_exists($path)) require_once $path;
    }

}
\spl_autoload_register(__NAMESPACE__ . '\Autoload::autoload');
