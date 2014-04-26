<?php

/**
 * namespace definition and usage
 */
namespace Admin\Form;

use Zend\Filter\StripNewlines;
use Zend\Form\Element\Csrf;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Password;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

/**

 *
 * id 	int(11)	NO 	PRI 	NULL	auto_increment
name 	varchar(250)	NO 		NULL
url 	varchar(100)	NO 		NULL
firma 	varchar(150)	NO 		NULL
date 	varchar(25)	NO 		NULL
technology 	text	NO 		NULL
task 	text	NO 		NULL
type 	varchar(250)	NO 		project
desc 	text	NO 		NULL
tag 	varchar(20)	YES 		NULL
img 	varchar(255)	NO 		NULL
created_at 	timestamp	NO 		CURRENT_TIMESTAMP

 *
 */


/**
 * Class ProjectForm
 * @package Admin\Form
 */
class ProjectForm extends Form
{

    private $_inputClass = 'form-control';




    /**
     * Add email element
     */
    public function addId($name = 'id')
    {
        $element = new Hidden($name);
        $this->add($element);
    }


    /**
     * Input for ProjectName
     *
     * @param string $name
     */
    public function addName($name = 'name') {
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' =>  $name,
            'class' => $this->_inputClass,
            'required' => true,
            'filters'=>array(
                array('name'=>'StripTags'),
                array('name'=>'StringTrim'),
            ),
            'validators'=>array(
                array('name'=>'EmailAddress')
            ),
            'options' => array(
                'label' => 'Projektname',
            ),
        ));
    }


    /**
     * Input Field Url
     *
     * @param string $name
     */
    public function addUrl ($name = 'url') {
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' =>  $name,
            'class' => $this->_inputClass,
            'required' => true,
            'options' => array(
                'label' => 'Projekt URL ',
                'class' => 'form-control',
            ),
        ));
    }


    /**
     * Input Field Firma
     *
     * @param string $name
     */
    public function addFirma ($name = 'firma') {
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' =>  $name,
            'class' => $this->_inputClass,
            'required' => true,
            'options' => array(
                'label' => 'Firmaname',
            ),
        ));
    }

    /**
     * Input Field Date
     *
     * @param string $name
     */
    public function addDate ($name = 'date') {
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' =>  $name,
            'class' => $this->_inputClass,
            'required' => true,
            'options' => array(
                'label' => 'Project Datum',
            ),
        ));
    }

    /**
     * Input Field Technology
     *
     * @param string $name
     */
    public function addTechnology ($name = 'technology') {
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' =>  $name,
            'class' => $this->_inputClass,
            'required' => true,
            'options' => array(
                'label' => 'Technology',
            ),
        ));
    }

    /**
     * Input Field Task
     *
     * @param string $name
     */
    public function addTask ($name = 'task') {
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' =>  $name,
            'class' => $this->_inputClass,
            'required' => true,
            'options' => array(
                'label' => 'Task',
            ),
        ));
    }

    /**
     * Input Field Type
     *
     * @param string $name
     */
    public function addType ($name = 'type') {
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' =>  $name,
            'class' => $this->_inputClass,
            'required' => true,
            'options' => array(
                'label' => 'Type',
            ),
        ));
    }

    /**
     * Input Field Description
     *
     * @param string $name
     */
    public function addDesc ($name = 'desc') {
        $this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' =>  $name,
            'class' => $this->_inputClass,
            'required' => true,
            'options' => array(
                'label' => 'Beschreibung',
            ),
        ));
    }

    /**
     * Input Field Tag
     *
     * @param string $name
     */
    public function addTag ($name = 'tag') {
        $this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' =>  $name,
            'class' => $this->_inputClass,
            'required' => true,
            'options' => array(
                'label' => 'Tag',
            ),
        ));
    }
    /**
     * Input Field Tag
     *
     * @param string $name
     */
    public function addCms ($name = 'cms') {
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' =>  $name,
            'class' => $this->_inputClass,
            'required' => true,
            'options' => array(
                'label' => 'CMS',
            ),
        ));
    }

    /**
     * Input Field Image
     *
     * @param string $name
     */
    public function addImg ($name = 'img') {
        $this->add(array(
            'type' => 'Zend\Form\Element\File',
            'name' =>  $name,
            'options' => array(
                'label' => 'Image Pfad',
            ),
        ));
    }


    /**
     * Submit Button
     */
    public function addSubmit() {

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
