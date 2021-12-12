<?php

return [
    'template' => [
        'main_start'        =>      TEMPLATE_PATH . 'mainstart.php',
        'sidebar'           =>      TEMPLATE_PATH . 'sidebar.php',
        'navbar'            =>      TEMPLATE_PATH . 'navbar.php',
        'content_start'     =>      TEMPLATE_PATH . 'contentstart.php',
        ':view'             =>      ':action_view',
        'content_end'       =>      TEMPLATE_PATH . 'contentend.php',
        'main_end'          =>      TEMPLATE_PATH . 'mainend.php',
    ],
    'header_resources' => [
        'css' => [
            'normalize'     =>      FIXED_CSS . 'normalize.css',
            'main'          =>      CSS . 'main.css',
        ],
    ],
    'footer_resources' => [
        'js' => [
            'main'          =>      JS . 'main.js',
            'jquery'        =>      FIXED_JS . 'jquery-3.6.0.min.js',
        ],
    ],
];