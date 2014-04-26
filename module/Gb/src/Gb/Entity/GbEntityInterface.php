<?php
/**
 * namespace definition and usage
 */
namespace Gb\Entity;

use Zend\Stdlib\ArraySerializableInterface;

/**
 * Project entity interface
 */
interface GbEntityInterface extends ArraySerializableInterface
{
    function setId($Id);
    function getId();
    function setName($Name);
    function getName();
    function setSubject($Subject);
    function getSubject();
    function setMessage($Message);
    function getMessage();
    function setDatum($Datum);
    function getDatum();
}