<?php
/**
 * ZF2 Buch Kapitel 22
 * 
 * Das Buch "Zend Framework 2 - Von den Grundlagen bis zur fertigen Anwendung"
 * von Ralf Eggert ist im Addison-Wesley Verlag erschienen. 
 * ISBN 978-3-8273-2994-3
 * 
 * @package    Blog
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.awl.de/2994
 */

/**
 * namespace definition and usage
 */
namespace Blog\Form;

use Blog\Filter\BlogFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Create form factory
 * 
 * @package    Blog
 */
class CreateFormFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new BlogForm('create');
        $form->addCsrfElement();
        $form->addTitleElement();
        $form->addTeaserElement();
        $form->addContentElement();
        $form->addSubmitElement('save', 'Speichern');
        $form->addSubmitElement('cancel', 'Abbrechen');
        $form->setInputFilter(new BlogFilter());
        $form->setValidationGroup(
            array('title', 'teaser', 'content', 'save', 'cancel')
        );
        return $form;
    }
}
