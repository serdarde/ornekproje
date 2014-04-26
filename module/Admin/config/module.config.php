<?php
return array(
    'router' => array(
        'routes' => array(
            'adm-index' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Admin',
                        'action'     => 'index',
                    ),
                ),

                'may_terminate' => true,
                'child_routes' => array(
                    'add' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/add-project',
                            'constraints' => array(
                                'url' => '[a-zA-Z][a-zA-Z0-9-]*',
                            ),
                            'defaults' => array(
                                'action'     => 'project',
                            ),
                        ),
                    ),


                    'delete' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/delete/:id',
                            'constraints' => array(
                                'url' => '[a-zA-Z][a-zA-Z0-9-]*',
                            ),
                            'defaults' => array(
                                'action'     => 'delete',
                            ),
                        ),
                    ),

                ),

            ),

            'adm-project' => array(
                'type'    => 'segment',
                'options' => array(
                    'route' => '/admin/project',
                    'defaults' => array(
                        'controller' => 'Project',
                        'action'     => 'index',
                    ),
                ),

                'may_terminate' => true,
                'child_routes' => array(
                    'add' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/add',
                            'constraints' => array(
                                'url' => '[a-zA-Z][a-zA-Z0-9-]*',
                            ),
                            'defaults' => array(
                                'action'     => 'add',
                            ),
                        ),
                    ),


                    'delete' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/delete/:id',
                            'constraints' => array(
                                'url' => '[a-zA-Z][a-zA-Z0-9-]*',
                            ),
                            'defaults' => array(
                                'action'     => 'delete',
                            ),
                        ),
                    ),

                    'edit' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/edit/:id',
                            'constraints' => array(
                                'url' => '[a-zA-Z][a-zA-Z0-9-]*',
                            ),
                            'defaults' => array(
                                'action'     => 'edit',
                            ),
                        ),
                    ),
                    'action' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/:action[/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                        ),
                    ),
                    'page' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/:page[/:sort]',
                            'constraints' => array(
                                'page'   => '[0-9]+',
                                'sort'   => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                        ),
                    ),

                ),

            ),

            'adm-technology' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/technology',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Technology',
                        'action'     => 'index',
                    ),
                ),
            ),

            'adm-socialmedia' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/technology',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Technology',
                        'action'     => 'index',
                    ),
                ),
            ),

            'adm-emails' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/technology',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Technology',
                        'action'     => 'index',
                    ),
                ),
            ),


            'adm-setup' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/setup',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Admin',
                        'action'     => 'setup',
                    ),
                ),
            ),

            'adm-pages' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/pages',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Page',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),



    'controllers' => array(
        'invokables' => array(
            'Admin'         => 'Admin\Controller\IndexController',
           // 'Project'       => 'Admin\Controller\ProjectController',
            'Technology'    => 'Admin\Controller\TechnologyController',
            'Page'          => 'Admin\Controller\PageController',
            'Socialmedia'   => 'Admin\Controller\SocialmediaController',
        ),

        'factories' => array(
            'Admin'       => 'Admin\Controller\IndexControllerFactory',
            'Project'     => 'Admin\Controller\ProjectControllerFactory',
        ),
    ),



    'service_manager' => array(
        'invokables' => array(
        ),
        'factories' => array(
            'Admin\Form\Add'  => 'Admin\Form\AddFormFactory',
            'Admin\Form\Edit' => 'Admin\Form\EditFormFactory',
        ),
    ),



    'view_manager' => array(
        'template_path_stack' => array(
            'admin'     => __DIR__ . '/../view',
            'project'   => __DIR__ . '/../view'
        )
    ),

    'acl' => array(
        'admin'   => array(
            'Admin'         => array('allow' => null),
            'Project'       => array('allow' => null),
            'Technology'    => array('allow' => null),
            'Page'          => array('allow' => null),
            'Socialmedia'   => array('allow' => null),
        ),
    ),
);