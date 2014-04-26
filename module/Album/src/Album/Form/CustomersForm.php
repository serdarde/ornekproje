<?php

namespace Album\Form;

use Zend\Form\Form;

class CustomersForm extends  Form{

    public function __construct($name = null){

        parent::__construct("customers");

        $this->add(array(
            'name' => "id",
            'type' => "hidden"
        ));

        $this->add(array(
            'name' => "name",
            'type' => "text"
        ));

        $this->add(array(
            'name' => "gender",
            'type' => "radio",
            'options' => array(
                'value_options' => array(
                        'male' => 'Man',
                        'female' => 'Woman'
                )
            )
        ));

        $this->add(array(
            'name' => "email",
            'type' => "text",
        ));

        $this->add(array(
            'name' => "town",
            'type' => "text"
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary'
            ),
        ));
    }

}