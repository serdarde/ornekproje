<?php

/**
 * namespace definition and usage
 */
namespace Admin\Form;

use Zend\Form\Element\Csrf;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Password;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Submit;
use Zend\Form\Form;


class StandardForm extends Form
{
    protected $captcha;

    public function __construct(CaptchaAdapter $captcha = null)
    {

        parent::__construct('client-form');
        $this->captcha = $captcha;

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'name',
            'class' => 'form-control',
            'required' => true,
            'validators' =>
                array(
                    'name'    => 'StringLength',
                    'options' => array( 'min' => 6 ),
                ),
            'options' => array(
                'label' => 'Projektname',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'url',
            'options' => array(
                'label' => 'Url',
            ),
            'attributes' => array (
                'placeholder' => 'http://',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'firma',
            'options' => array(
                'label' => 'Firma',
                'placeholder' => 'http://',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'technology',
            'options' => array(
                'label' => 'Technology',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' => 'task',
            'options' => array(
                'label' => 'Task',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'type',
            'options' => array(
                'label' => 'Type',
            ),
        ));


        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'date',
            'options' => array(
                'label' => 'Date',
            ),
        ));


        /**
        $this->add(array(
            'type' => 'Zend\Form\Element\Captcha',
            'name' => 'captcha',
            'options' => array(
                'label' => 'Captcha',
            ),
        ));**/


        $this->add(array(
            'type' => 'Zend\Form\Element\Submit',
            'name' => 'submit',
            'options' => array(

            ),
            'attributes' => array(
                'value' => 'Speichern',
            ),
        ));

    }
}
