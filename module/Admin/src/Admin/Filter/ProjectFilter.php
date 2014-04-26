<?php
/**
 * ZF2 Buch Kapitel 22
 * 
 * Das Buch "Zend Framework 2 - Von den Grundlagen bis zur fertigen Anwendung"
 * von Ralf Eggert ist im Addison-Wesley Verlag erschienen. 
 * ISBN 978-3-8273-2994-3
 * 
 * @package    User
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.awl.de/2994
 */

/**
 * namespace definition and usage
 */
namespace Admin\Filter;

use Zend\InputFilter\FileInput;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

/**
 * User filter
 * 
 * @package    User
 */
class ProjectFilter extends InputFilter
{
    /**
     * Build filter
     */
    public function __construct()
    {
        $name = new Input('name');
        $name->setRequired(true);
        $name->getFilterChain()->attachByName('StripTags');
        $name->getFilterChain()->attachByName('StringTrim');

        /**
        $name->getValidatorChain()->attachByName('InArray', array(
            'haystack' => array('ersin', 'customer', 'staff', 'admin')
        )); **/ 

        /**
        $name->getValidatorChain()->attachByName('EmailAddress', array(
            'useDomainCheck' => false,
            'message'        => 'Keine gültige E-Mail-Adresse',
        )); **/



        $url = new Input('url');



    $file = new FileInput('img');
    $file->getFilterChain()->attachByName(
        'filerenameupload',
        array(
            'target'    =>  getcwd() .  '/data/upload/',
            'overwrite' => true,
        )
    );

    $file->getValidatorChain()->attachByName(
        'filemimetype',
        array('mimeType' => array ('image/jpeg','image/png' ))
    );


        $this->add($name);
        $this->add($file);
        $this->add($url);
    }
}
