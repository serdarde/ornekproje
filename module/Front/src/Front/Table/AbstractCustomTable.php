<?php
/**
 * @author Ersin Keser <ersin@7style.net>
 * @package Abstract CLass for Tables
 *
 */


namespace Front\Table;


use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


abstract class AbstractCustomTable extends TableGateway implements TableInterface
{


    /**
     * Database Adapter
     *
     * @var Adapter|null
     */
    protected $_db = null;


    protected $_table = '';

    /**
     * @param Adapter $adapter
     * @param  $entity
     */
    public function __construct(Adapter $adapter, $entity)
    {
        $this->_db = $adapter;
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype($entity);
        parent::__construct($this->_table, $adapter, null, $resultSet);

    }


    /**
     * @param $name
     * @return mixed
     */
    public function fetchSingleByUrl($name)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('name', $name);

        return $this->selectWith($select)->current();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function fetchSingleById($id)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('id', $id);

        return $this->selectWith($select)->current();
    }


    /**
     * fetch all entries
     *
     * @param null $limit
     * @return array|mixed
     */
    public function fetchAll($limit = null){
        $select = $this->getSql()->select();
        if (!empty($limit) && is_numeric($limit)) {
            $select->limit($limit);
        }
        $result = $this->selectWith($select);
        $rows   = array ();
        foreach ($result as $set) {
            $rows[] = $set;
        }
        return $rows;
    }


    /**
     * @param $id
     * @return mixed|void
     */
    public function fetchRow($id){

    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function fetchOne($id){

    }

} 