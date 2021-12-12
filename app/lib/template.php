<?php

namespace APP\LIB;

class Template {

    private array $_templateParts;
    private $_data;
    private $_actionView;

    public function __construct($parts) {
        $this->_templateParts = $parts;
    }

    public function setActionView($actionViewPath) {
        $this->_actionView = $actionViewPath;
    }

    public function setAppData($data) {
        $this->_data = $data;
    }

    private function renderHeaderStart() {
        require_once \TEMPLATE_PATH . 'headerstart.php';
    }

    private function renderResources($resourceKey) {
        $generatedResources = '';
        if(!\array_key_exists($resourceKey, $this->_templateParts)) {
            \trigger_error('Template engine cannot find `' . $resourceKey . '` key.', \E_USER_WARNING);
        } else {
            $resources = $this->_templateParts[$resourceKey];

            $css = isset($resources['css']) ? $resources['css'] : '';
            if(!empty($css)) {
                foreach($css as $key => $file) {
                    $generatedResources .= '<link rel="stylesheet" type="text/css" href="' . $file . '" />'."\r\n";
                }
            }

            $js = isset($resources['js']) ? $resources['js'] : '';
            if(!empty($js)) {
                foreach($js as $key => $file) {
                    $generatedResources .= '<script src="' . $file . '"></script>'."\r\n";
                }
            }
        }
        return $generatedResources;
    }

    private function renderHeaderEnd() {
        require_once \TEMPLATE_PATH . 'headerend.php';
    }

    private function renderAppBlocks() { // What inside <body></body> tags
        if(!\array_key_exists('template', $this->_templateParts)) {
            \trigger_error('Template engine cannot find `template` key.', \E_USER_WARNING);
        } else {
            $parts = $this->_templateParts['template'];
            if(!empty($parts)) {
                \extract($this->_data);
                foreach($parts as $key => $file) {
                    if($key === ':view') {
                        require_once $this->_actionView;
                    } else {
                        require_once $file;
                    }
                }
            }
        }
    }

    private function renderFooter() {
        require_once \TEMPLATE_PATH . 'footer.php';
    }

    public function renderApp() {
        $this->renderHeaderStart();
        echo $this->renderResources('header_resources');
        $this->renderHeaderEnd();
        $this->renderAppBlocks();
        echo $this->renderResources('footer_resources');
        $this->renderFooter();
    }

}