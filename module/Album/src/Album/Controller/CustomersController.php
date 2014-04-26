<?php

namespace Album\Controller;

use Album\Model\Customers;
use Album\Form\CustomersForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\View;

class CustomersController extends AbstractActionController
{
    /**
     * @var
     */
    protected $customersTable;

    public function indexAction()
    {
        return new ViewModel(array(
            'customers' => $this->getCustomersTable()->fetchAll()
        ));
    }

    public function showAction(){
        $id = $this->params()->fromRoute('id');

        if(!$id){
            $this->redirect($this->url("customersIndex",array("action" => "index")));
        }

        $customer = $this->getCustomersTable()->getCustomer($id);

        return new ViewModel(array(
            'customer' => $customer
        ));
    }

    /**
     */
    public function addAction()
    {
        $front_message = '';
        $form = new CustomersForm();
        $form->get("submit")->setValue("Yeni Kullaniciyi Ekle");

        $request = $this->getRequest();
        if($request->isPost()){
            $customers = new Customers();
            $form->setInputFilter($customers->getInputfilter());
            $form->setData($request->getPost());

            if($form->isValid()){
                $customers->exchangeArray($form->getData());
                $save = $this->getCustomersTable()->saveCustomer($customers);

                if($save){
                    $this->redirect()->toRoute('customersIndex');
                }
            }else{
                $front_message = array('type' => 'danger','message'=> 'Bazi Hatalar Yapmissiniz..');
            }
        }

        return new ViewModel(array(
            'form' => $form,
            'front_message' => $front_message
        ));
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute("id");

        if(empty($id)){
            throw new \Exception("Id not found!");
        }

        $customer = $this->getCustomersTable()->getCustomer($id);

        $form = new CustomersForm();
        $form->bind($customer);

        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if($request->isPost()){
            $form->setInputFilter($customer->getInputfilter());
            $form->setData($request->getPost());

            if($form->isValid()){
                $save = $this->getCustomersTable()->savecustomer($customer);

                if($save){
                    $this->redirect()->toRoute("customersIndex");
                }
            }
        }

        return new ViewModel(array(
            'form' => $form,
            'id'   => $id
        ));
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute("id");

        if(!$id){
            throw new \Exception("Id not found");
        }

        echo $this->getCustomersTable()->deleteCustomer($id);
        exit();
    }

    public function getCustomersTable(){
        if(!isset($this->customersTable)){
            $sm = $this->getServiceLocator();
            $this->customersTable = $sm->get('Album\Model\CustomersTable');
        }
        return $this->customersTable;
    }
}