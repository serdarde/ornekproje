<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'indexPost' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/asdasdasd',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Blog',
                        'action'     => 'index'
                    )
                )
            ),
            'blogPost' => array(
                'type'  => 'Segment',
                'options' => array(
                    'route' => '/blog/post[/:postId]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Blog',
                        'action'     => 'post'
                    )
                )
            ),
            'testPost' => array(
                "type"    => "Segment",
                "options" => array(
                    "route"   => '/Application/blog/test',
                    "defaults" => array(
                        "controller" => 'Application\Controller\Blog',
                        "action"     => 'test'
                    )
                )
            )
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Blog'  => 'Application\Controller\BlogController',
            'Application\Controller\Static'  => 'Application\Controller\StaticController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            'static/menu'             => __DIR__ . '/../view/Application/static/menu.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    )
);
