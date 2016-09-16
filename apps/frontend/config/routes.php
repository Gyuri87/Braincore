<?php

return array(
    '/:action' => array(
        'module'        => 'frontend',
        'controller'    => 'index',
        'action'        => 1
    ),

    '/'=> array(
        'module'        => 'frontend',
        'controller'    => 'index',
        'action'        => 'index'
    ),
    '/:controller/:action/:params'=> array(
        'module'        => 'frontend',
        'controller'    => 1,
        'action'        => 2,
        'params'        =>3
    )
);