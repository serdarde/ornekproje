<?php
/**
 * @author Ersin Keser <ersin@7style.net>
 * @package Admin IndexController
 *
 */


namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    /**
     * get Project Entity Service
     * @var null
     */
    protected $projectServices = null;


    /**
     * Set Project Service
     * @param \Front\Service\ProjectService $projectService
     */
    function setProjectService (\Front\Service\ProjectService $projectService) {
        $this->projectServices = $projectService;
    }


    /**
     * get Project Service
     * @return \Front\Service\ProjectService | null
     */
    function getProjectService() {
        return $this->projectServices;
    }


    /**
     * index Action
     * start page for admin
     * @return array|ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }


    /**
     * get project list
     *
     * @return ViewModel
     */
    public function setupAction()
    {
        return new ViewModel();
    }


}
