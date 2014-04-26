<?php



/**
 * namespace definition and usage
 */
namespace Front\Table;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGatewayInterface;

/**
 * Blog table interface
 * 
 * Handles the blogs table for the Blog module 
 * 
 * @package    Blog
 */
interface TableInterface extends TableGatewayInterface
{

    /**
     * @param Adapter $adapter
     * @param  $entity
     */
    public function __construct(Adapter $adapter, $entity);


    /**
     * @param $url
     * @return mixed
     */
    public function fetchSingleByUrl($url);

    /**
     * @param $id
     * @return mixed
     */
    public function fetchSingleById($id);


    /**
     * @param null $limit
     * @return mixed
     */
    public function fetchAll($limit = null);

    /**
     * @param $id
     * @return mixed
     */
    public function fetchRow($id);

    /**
     * @param $id
     * @return mixed
     */
    public function fetchOne($id);
}
