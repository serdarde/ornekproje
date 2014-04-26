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
            'gb' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/gb',
                    'defaults' => array(
                        'controller' => 'Index',
                        'action'     => 'index'
                    )
                )
            ),

        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'invokables' => array(
            'Gb\Entity\Gb'   => 'Gb\Entity\GbEntity',
        ),
        'factories' => array (
            'Gb\Service\Gb'     => 'Gb\Service\GbServiceFactory',
            'Gb\Table\GbTable'  => 'Gb\Table\GbTableFactory',
        ),

    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'gb' => __DIR__ . '/../view'
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Index' => 'Gb\Controller\IndexController',
        ),
    ),
);
