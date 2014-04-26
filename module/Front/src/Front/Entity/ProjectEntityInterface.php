<?php
/**
 * namespace definition and usage
 */
namespace Front\Entity;

use Zend\Stdlib\ArraySerializableInterface;

/**
 * Project entity interface
 *
 * @package    Blog
 */
interface ProjectEntityInterface extends ArraySerializableInterface
{


    function setId($id);

    function getId();

    function setName($name);

    function getName();

    function setUrl($url);

    function getUrl();

    function setFirma($firma);

    function getFirma();

    function setDate($date);

    function getDate();

    function setTechnology($technology);

    function getTechnology();

    function setTask($task);

    function getTask();

    function setType($type);

    function getType();

    function setDesc($desc);

    function getDesc();

    function setTag($tag);

    function getTag();

    function setImg($tag);

    function getImg();

}
