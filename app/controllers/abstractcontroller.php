<?php

namespace APP\Controllers;

class AbstractController {

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

    }

    public function notFoundAction() {
        $this->_view();
    }

}
