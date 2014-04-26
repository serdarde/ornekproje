<?php

/**
 * namespace definition and usage
 */
namespace Front\Table;


use Zend\Db\Adapter\Adapter;

/**
 * Class ProjectTable
 *
 * @package Front\Table
 */
class ProjectTable extends AbstractCustomTable
{


    /**
     * @param Adapter $adapter
     * @param         $entity
     */
    public function __construct(Adapter $adapter, $entity)
    {
        $this->_table = 'project';
        parent::__construct($adapter, $entity);
    }


}
