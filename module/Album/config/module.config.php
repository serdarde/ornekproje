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
            'albumIndex' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/album',
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'index'
                    )
                )
            ),
            'albumAdd' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/album/add',
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'add'
                    )
                )
            ),
            'albumEdit' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/album/edit[/:id]',
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'edit'
                    )
                )
            ),
            'albumDelete' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/album/delete[/:id]',
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'delete'
                    )
                )
            ),
            'customersIndex' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Album\Controller\Customers',
                        'action'     => 'index'
                    )
                ),
            ),
            'customersAdd' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/customers/add',
                    'defaults' => array(
                        'controller' => 'Album\Controller\Customers',
                        'action'     => 'add'
                    )
                )
            ),
            'customersEdit' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/customers/edit[/:id]',
                    'defaults' => array(
                        'controller' => 'Album\Controller\Customers',
                        'action'     => 'edit'
                    )
                )
            ),
            'customersDelete' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/customers/delete[/:id]',
                    'defaults' => array(
                        'controller' => 'Album\Controller\Customers',
                        'action'     => 'delete'
                    )
                )
            ),
            'customersShow' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/customers/show[/:id]',
                    'defaults' => array(
                        'controller' => 'Album\Controller\Customers',
                        'action'     => 'show'
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
            'Album\Controller\Customers' => 'Album\Controller\CustomersController',
            'Album\Controller\Album' => 'Album\Controller\AlbumController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'     => __DIR__ . '/../view/layout/layout.phtml',
            'album/index/index' => __DIR__ . '/../view/album/index/index.phtml',
            'error/404'         => __DIR__ . '/../view/error/404.phtml',
            'error/index'       => __DIR__ . '/../view/error/index.phtml',
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
