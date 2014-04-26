<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Models;

class BlogController extends AbstractActionController
{
    public function postAction()
    {
        $postId =  $this->getEvent()->getRouteMatch()->getParam("postId");
        $pim = $this->getServiceLocator()->get("PostIdentityMap");

        $viewObj= new ViewModel(
            array(
                "postId" => $postId
            )
        );

        $menu = new ViewModel();
        $menu->setTemplate("static/menu");
        $viewObj->addChild($menu,'menu');

        return $viewObj;
    }
    public function testAction()
    {
        return new ViewModel();
    }
    public function indexAction()
    {
        $view = new ViewModel();

        $menu = new ViewModel();
        $menu->setTemplate("static/menu");
        $view->addChild($menu,'menu');

        return $view;
    }
}
