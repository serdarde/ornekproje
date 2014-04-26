<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Front\Controller;

use Zend\View\Model\ViewModel;

class IndexController extends AbstractCustomController
{


    /**
     * Start Page
     *
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $this->getService("Test");
            return new ViewModel(
        );
    }


    /**
     * Project page
     *
     * @return ViewModel
     */
    public function projectAction()
    {
        $project = $this->getService('Front\Service\Project');
        $projects = $project->fetchAll();

        pa ($projects);


        return new ViewModel(array(
                'projects' => $projects
            )
        );
    }


    /**
     * @return ViewModel
     */
    public function deleteAction()
    {

        return new ViewModel();
    }
}
