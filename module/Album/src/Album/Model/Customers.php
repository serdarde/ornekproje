<?php

namespace Album\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\EmailAddress;

class Customers{
    /**
     * @var
     */
    public $id;

    /**
     * @var
     */
    public $gender;

    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $email;

    /**
     * @var
     */
    public $town;

    /**
     * @var
     */
    protected $inputFilter;

    /**
     * @param $data
     */
    public function exchangeArray($data){
        $this->id     = (!empty($data["id"]))     ? $data["id"]     : null;
        $this->gender = (!empty($data["gender"])) ? $data["gender"] : null;
        $this->name   = (!empty($data["name"]))   ? $data["name"]   : null;
        $this->email  = (!empty($data["email"]))  ? $data["email"]  : null;
        $this->town   = (!empty($data["town"]))   ? $data["town"]   : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter){
        throw new \Exception("Not used");
    }

    public function getInputfilter(){
        if(!$this->inputFilter){
            $inputFilter = new InputFilter();

            $inputFilter->add(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int')
                )
            ));

            $inputFilter->add(array(
                'name'     => 'name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'stringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100
                        )
                    )
                )
            ));

            $inputFilter->add(array(
                'name'     => 'gender',
                'required' => true,
            ));

            $inputFilter->add(array(
                'name'     => 'email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    'name' => new EmailAddress()
                )
            ));

            $inputFilter->add(array(
                'name'     => 'town',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'stringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100
                        )
                    )
                )
            ));

            $this->inputFilter = $inputFilter;

        }

        return $this->inputFilter;
    }

    public function getArrayCopy(){
        return get_object_vars($this);
    }
}








