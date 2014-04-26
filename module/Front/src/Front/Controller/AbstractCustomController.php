<?php
/**
 * @author Ersin Keser <ersin@7style.net>
 * @package Admin IndexController
 *
 */


namespace Front\Controller;

use Zend\Mvc\Controller\AbstractActionController;

abstract class AbstractCustomController extends AbstractActionController
{


    /**
     * @param $name
     * @return array|object
     */
    function getService($name) {
        return $this->getServiceLocator()->get($name);
    }


}
