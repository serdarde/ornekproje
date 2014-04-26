<?php

namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;

class CustomersTable{
    /**
     * @var
     */
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll(){
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getCustomer($id){
        $id =  (int) $id;

        $rowSet = $this->tableGateway->select(array('id' => $id));
        $row    = $rowSet->current();

        if(!$row){
            throw new \Exception("Bu id'ye ait bilgiler veritabaninda bulunamamistir.");
        }
        return $row;
    }

    public function saveCustomer(Customers $customer){

        $data = array(
            'name'    => $customer->name,
            'gender'  => $customer->gender,
            'email'   => $customer->email,
            'town'    => $customer->town
        );

        $id = $customer->id;

        if($id == 0){
            $this->tableGateway->insert($data);
        }else{
            if($this->getCustomer($id)){
                $this->tableGateway->update($data,array('id' => $id));
            }
        }

        return true;
    }

    public function deleteCustomer($id){
        return $this->tableGateway->delete(array('id' => (int) $id));
    }
}