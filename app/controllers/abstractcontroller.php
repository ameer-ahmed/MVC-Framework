<?php

namespace APP\Controllers;

use APP\LIB\FrontController;
use APP\LIB\Template;

class AbstractController {

    const NOT_FOUND_PATH = \VIEW_PATH . 'notfound' . \DS . 'notfound.view.php';
    const NO_VIEW_PATH = \VIEW_PATH . 'notfound' . \DS . 'noview.view.php';

    protected $_controller;
    protected $_action;
    protected $_params;

    protected $_template;

    protected $_data = [];

    public function setController($controllerName) {
        $this->_controller = $controllerName;
    }

    public function setAction($actionName) {
        $this->_action = $actionName;
    }

    public function setParams(array $params) {
        $this->_params = $params;
    }

    public function setTemplate(Template $template) {
        $this->_template = $template;
    }

    protected function _view() {
        if($this->_controller == FrontController::NOT_FOUND_CONTROLLER) {
            require_once self::NOT_FOUND_PATH;
        } else {
            $view = \VIEW_PATH . $this->_controller . DS . $this->_action . '.view.php';
            if(\file_exists($view)) {
                $this->_template->setActionView($view);
                $this->_template->setAppData($this->_data);
                $this->_template->renderApp();
            } else {
                require_once self::NO_VIEW_PATH;
            }
        }
    }

    public function notFoundAction() {
        $this->_view();
    }

}
