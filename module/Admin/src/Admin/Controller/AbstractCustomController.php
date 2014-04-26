<?php
/**
 * @author Ersin Keser <ersin@7style.net>
 * @package Admin IndexController
 *
 */


namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;

abstract class AbstractCustomController extends AbstractActionController
{

    /**
     * get Entity Service
     * @var null
     */
    protected  $service = null;


    /**
     * @param $service
     */
    function setService ($service) {
        $this->service = $service;
    }


    /**
     * @return mixed
     */
    function getService() {
        return $this->service;
    }


}
