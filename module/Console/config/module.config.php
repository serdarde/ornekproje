<?php
return array(


    'console' => array(
        'router' => array(
            'routes' => array(
                'show-users' => array(
                    'options' => array(
                        'route'    => 'create entity <table> <module>',
                        'defaults' => array(
                            'controller' => 'console',
                            'action'     => 'index'
                        )
                    )
                )
            )
        )
    ),



    'controllers' => array(
        'invokables' => array(
            'console'       => 'Console\Controller\DoController'
        ),

    ),

    'acl' => array(
        'guest' => array(
            'console' => array('allow' => null),
        ),
    ),
);