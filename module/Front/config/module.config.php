<?php
return array(
    'router' => array(
        'routes' => array(
            'front' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Front',
                        'action'     => 'index',
                    ),
                ),
            ),

            'ss-project' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/project',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Front',
                        'action'     => 'project',
                    ),
                ),

                'may_terminate' => true,
                'child_routes' => array(
                    'action' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/:name',
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
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'front' => __DIR__ . '/../view'
        )
    ),


    'navigation' => array(
        'default' => array(
            'home' => array(
                'order'      => '0',
                'label'      => 'Home',
                'route'      => 'home',
                'controller' => 'index',
                'action'     => 'index',
                'pages'      => array(
                    'team' => array(
                        'type'       => 'mvc',
                        'label'      => 'Project',
                        'route'      => 'ss-project',
                        'controller' => 'index',
                        'action'     => 'project',
                    ),
                    'contact' => array(
                        'type'       => 'mvc',
                        'label'      => 'Kontakt',
                        'route'      => 'application',
                        'controller' => 'about',
                        'action'     => 'contact',
                    ),
                    'imprint' => array(
                        'type'       => 'mvc',
                        'label'      => 'Impressum',
                        'route'      => 'application',
                        'controller' => 'about',
                        'action'     => 'imprint',
                    ),
                ),
            ),
            'front' => array(

                'order'      => '10',
                'label'      => 'Projekte',
                'route'      => 'ss-project',
                'controller' => 'index',
                'action'     => 'index',
            ),
        ),
    ),

    'controllers' => array(

        'invokables' => array(
            'Front'   => 'Front\Controller\IndexController',
        ),

        'factories' => array(
           // 'Front\Controller\IndexController'  => 'Front\Controller\IndexControllerFactory',
           // 'Front'     => 'Front\Controller\IndexControllerFactory',
           // 'front'     => 'Front\Controller\IndexControllerFactory',
          //  'Front'     => 'Front\Controller\IndexController',

        ),


    ),


    'service_manager' => array(
        'invokables' => array(
            'Front\Entity\Project'   => 'Front\Entity\ProjectEntity',
        ),
        'factories' => array(
            'Front\Table\Project'       => 'Front\Table\ProjectTableFactory',
            'Front\Form\Create'         => 'Front\Form\CreateFormFactory',
            'Front\Form\Update'         => 'Front\Form\UpdateFormFactory',
            'Front\Form\Delete'         => 'Front\Form\DeleteFormFactory',
            'Front\Service\Project'     => 'Front\Service\ProjectServiceFactory',

        ),
    ),

    'acl' => array(
        'guest'   => array(
            'Front' => array('allow' => array("project", "index")),
        ),
    ),
);