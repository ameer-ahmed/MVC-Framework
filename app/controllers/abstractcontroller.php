<?php

namespace APP\Controllers;

use APP\LIB\FrontController;

class AbstractController {

    const NOT_FOUND_PATH = \VIEW_PATH . 'notfound' . \DS . 'notfound.view.php';
    const NO_VIEW_PATH = \VIEW_PATH . 'notfound' . \DS . 'noview.view.php';

    private $_controller;
    private $_action;
    private $_params = [];

    public function setController($controllerName) {
        $this->_controller = $controllerName;
    }

    public function setAction($actionName) {
        $this->_action = $actionName;
    }

    public function setParams(array $params) {
        $this->_params = $params;
    }

    protected function _view() {
        if($this->_controller == FrontController::NOT_FOUND_CONTROLLER) {
            require_once self::NOT_FOUND_PATH;
        } else {
            $view = \VIEW_PATH . $this->_controller . DS . $this->_action . '.view.php';
            if(\file_exists($view)) {
                require_once $view;
            } else {
                require_once self::NO_VIEW_PATH;
            }
        }
    }

    public function notFoundAction() {
        $this->_view();
    }

}
