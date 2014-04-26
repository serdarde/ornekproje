<?php

/**
 * namespace definition and usage
 */
namespace Gb\Service;


use Gb\Service;


/**
 * Project Service
 * 
 * @package    Project
 */
class GbService  extends AbstractCustomService
{

    /**
     * @param \Front\Table\TableInterface $table
     */
    public function __construct($table)
    {
        $this->_class = 'Gb\Service\Gb';
        $this->_table = 'gb';
        parent::__construct($table);
    }


    /**
     * @return mixed
     */
    public function fetchAll() {
       return $this->getTable()->fetchAll();

    }

}
