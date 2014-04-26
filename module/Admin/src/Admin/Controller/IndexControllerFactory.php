<?php

/**
 * namespace definition and usage
 */
namespace Admin\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class IndexControllerFactory
 * @package Front\Controller
 */
class IndexControllerFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed|IndexController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm         = $serviceLocator->getServiceLocator();
        $service    = $sm->get('Front\Service\Project');
        $controller = new IndexController();
        $controller->setProjectService($service);
        return $controller;
    }
}
