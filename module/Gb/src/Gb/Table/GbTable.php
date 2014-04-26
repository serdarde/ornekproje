<?php

/**
 * namespace definition and usage
 */
namespace Gb\Table;


use Zend\Db\Adapter\Adapter;

/**
 * Class ProjectTable
 *
 * @package Front\Table
 */
class GbTable extends AbstractCustomTable
{


    /**
     * @param Adapter $adapter
     * @param         $entity
     */
    public function __construct(Adapter $adapter, $entity)
    {
        $this->_table = 'gb';
        parent::__construct($adapter, $entity);
    }


}
