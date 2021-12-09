<?php

namespace APP\Controllers;

class IndexController extends AbstractController {

    public function defaultAction() {
        echo 'Hello from index!';
        $this->_view();
    }

}