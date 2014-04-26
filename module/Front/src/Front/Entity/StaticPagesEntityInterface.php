<?php
/**
 * namespace definition and usage
 */
namespace Front\Entity;

use Zend\Stdlib\ArraySerializableInterface;

/**
 * Project entity interface
 */
interface StaticPagesEntityInterface extends ArraySerializableInterface
{
    function setId($Id);
    function getId();
    function setPagename($Pagename);
    function getPagename();
    function setTitle($Title);
    function getTitle();
    function setContent($Content);
    function getContent();
    function setCreated_at($Created_at);
    function getCreated_at();
}