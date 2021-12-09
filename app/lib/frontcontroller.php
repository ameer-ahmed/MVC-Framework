<?php

namespace APP\LIB;

class FrontController {

    const NOT_FOUND_CONTROLLER = \NS . '\Controllers\NotFoundController';
    const NOT_FOUND_ACTION = 'notFoundAction';

    private $_controller = 'index';
    private $_action = 'default';
    private $_params = [];

    public function __construct() {
        $this->_parseURL();
    }

    private function _parseURL() {
        $url = \explode('/', trim($_SERVER['REQUEST_URI'], '/'), 3);
        if(isset($url[0]) && $url[0] !== '') {
            $this->_controller = $url[0];
        }
        if(isset($url[1]) && $url[1] !== '') {
            $this->_action = $url[1];
        }
        if(isset($url[2]) && $url[2] !== '') {
            $this->_params = explode('/', $url[2]);
        }
    }

    public function dispatch() {
        $controllerClassName = \NS . '\\Controllers\\' . \ucfirst($this->_controller) . 'Controller';
        $controllerActionName = \lcfirst($this->_action) . 'Action';
        $controllerPassedParams = $this->_params;
        if(!\class_exists($controllerClassName)) {
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
        }
        $controller = new $controllerClassName();
        if(!\method_exists($controller, $controllerActionName)) {
            $controllerActionName = self::NOT_FOUND_ACTION;
        }
        $controller->setController($controllerClassName);
        $controller->setAction($controllerActionName);
        $controller->setParams($controllerPassedParams);
        $controller->$controllerActionName();
    }
}