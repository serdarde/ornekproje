<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);



        // add route listener
    //    $e->getApplication()->getEventManager()->attachAggregate(new UserListener());

        // set service locator
        $this->serviceLocator = $e->getApplication()->getServiceManager();

        // get shared event manager
        $sharedEventManager = $this->serviceLocator->get('SharedEventManager');

        // add form event
        $sharedEventManager->attach('Front\Service\AbstractCustomService', 'set-project-form', array($this, 'onFormSet'));
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }


    public function onFormSet($e)
    {



        $type    = $e->getParam('type', 'add');
        $class   = $e->getParam('class');
        $service = $this->serviceLocator->get($class);
        $form    = $this->serviceLocator->get('Admin\Form\\' . ucfirst($type));
        $service->setForm($form, $type);
    }
}
