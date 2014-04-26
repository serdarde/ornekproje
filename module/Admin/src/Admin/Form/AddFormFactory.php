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
namespace Admin\Form;

use Admin\Filter\ProjectFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Register form factory
 * 
 * @package    User
 */
class AddFormFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return UserForm|mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new ProjectForm('add');
        $form->setAttribute('enctype','multipart/form-data');
        $form->addName();
        $form->addFirma();
        $form->addUrl();
        $form->addDate();
        $form->addDesc();
        $form->addTag();
        $form->addTechnology();
        $form->addCms();
        $form->addTask();
        $form->addImg();
        $form->addType();
        $form->addSubmit();
        $form->setInputFilter(new ProjectFilter());

        return $form;
    }
}
