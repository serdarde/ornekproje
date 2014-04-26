<?php


namespace Admin\Controller;

use Zend\Http\PhpEnvironment\Response;
use Zend\Mvc\Controller\AbstractController;
use Zend\View\Model\ViewModel;

class ProjectController extends AbstractCustomController
{


    /**
     * Project list
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $page = (int) $this->params()->fromRoute('page');
        $maxPage = 20;
        return new ViewModel(array(
            'projectList'  => $this->getService()->fetchList($page, $maxPage),
        ));
    }


    public function addAction()
    {
        $form = $this->getService()->getForm('add');
        $prg  = $this->fileprg($form,$this->url()->fromRoute('adm-project/add', array('action' => 'add')), true );
        if ($prg instanceof Response) {
            return $prg;
        } elseif ($prg !== false) {
            $project = $this->getService()->save($prg);

            pa ($project);

            if ($project) {
                $this->flashMessenger()->addMessage(
                    $this->getService()->getMessage()
                );
            }
        }
        return new ViewModel(
            array (
                'form' => $form,
            )
        );
    }


    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $prg = $this->prg($this->url()->fromRoute('adm-project/edit', array('id' => $id)), true );

        if ($prg instanceof Response) {
            return $prg;
        }

        if ($prg !== false) {
            $this->getService()->save($prg, $id);
        }
        $user = $this->getService()->fetchSingleById($id);
        $form = $this->getService()->getForm('edit');
        $form->bind($user);
        return new ViewModel(
            array (
                'form' => $form,
            )
        );
    }


    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $res = $this->getService()->delete($id);
        if ($res) {
            $this->redirect()->toRoute('adm-project');
        }

        return new ViewModel();
    }


}
