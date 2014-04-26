<?php


/**
 * namespace definition and usage
 */
namespace Front\Service;

use Front\Table\TableInterface;

/**
 * Project Service interface
 * 
 * @package    Project
 */
interface ServiceInterface
{


    /**
     * @param TableInterface $table
     */
    public function __construct($table);
    
    /**
     * Get blog table
     * 
     * @return TableInterface
     */
    public function getTable();
    
    /**
     * Set blog table
     * 
     * @param TableInterface $table
     * @return ProjectServiceInterface
     */
    public function setTable($table);
    
    /**
     * Get service message
     * 
     * @return array
     */
    public function getMessage();
    
    /**
     * Clear service message
     */
    public function clearMessage();
    
    /**
     * Add service message
     * 
     * @param string new message
     */
    public function setMessage($message);
    
    /**
     * Get form with triggering the Event-Manager
     * 
     * @param  string $type form type
     * @return ProjectFormInterface
     */
    public function getForm($type = 'add');


    /**
     * @param \Admin\Form\ProjectForm $form
     * @param string $type
     * @return mixed
     */
    public function setForm($form, $type = 'create');

    /**
     * Fetch single by url
     *
     * @param varchar $url
     * @return EntityInterface
     */
    public function fetchSingleByUrl($url);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function fetchSingleById($id);

    /**
     * @param int $page
     * @param int $perPage
     *
     * @return mixed
     */
    public function fetchList($page = 1, $perPage = 15);


    /**
     * @param array $data
     * @param null  $id
     *
     * @return mixed
     */
    public function save(array $data, $id = null);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);
}
