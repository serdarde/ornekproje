<?php
/**
 * Generate with EntityCreater from 7Style.Net
 * @package    Gb
 * @version 1.0.0
 * @date 2014/04/26
 */

/**
 * namespace definition and usage
 */
namespace Gb\Entity;


/**
 * Gb entity
 *
 * @package Gb
 */
class GbEntity implements GbEntityInterface
{

    protected $id;
    protected $name;
    protected $subject;
    protected $message;
    protected $datum;
     

     /* Set Array Map
     * @var array
     */
     protected $arrayMap = array(
            "id",
            "name",
            "subject",
            "message",
            "datum",
     );

    /**
     * Set id
     * @param id
     */
     function setId($id)
     {
         $this->id = $id;
     }

    /**
     * Get id
     * @param id
     */
     function getId()
     {
         return $this->id;
     }

    /**
     * Set name
     * @param name
     */
     function setName($name)
     {
         $this->name = $name;
     }

    /**
     * Get name
     * @param name
     */
     function getName()
     {
         return $this->name;
     }

    /**
     * Set subject
     * @param subject
     */
     function setSubject($subject)
     {
         $this->subject = $subject;
     }

    /**
     * Get subject
     * @param subject
     */
     function getSubject()
     {
         return $this->subject;
     }

    /**
     * Set message
     * @param message
     */
     function setMessage($message)
     {
         $this->message = $message;
     }

    /**
     * Get message
     * @param message
     */
     function getMessage()
     {
         return $this->message;
     }

    /**
     * Set datum
     * @param datum
     */
     function setDatum($datum)
     {
         $this->datum = $datum;
     }

    /**
     * Get datum
     * @param datum
     */
     function getDatum()
     {
         return $this->datum;
     }



    /**
     * @param array $array
     */
    public function exchangeArray(array $array)
    {
        foreach ($array as $key => $value) {
            if (empty($value)) {
                continue;
            }
            $method = 'set' . ucfirst($key);
            if (!method_exists($this, $method)) {
                continue;
            }
            $this->$method($value);
        }
    }

    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        $data = array ();
        foreach ($this->arrayMap as $map) {
            $method = 'get' . ucfirst($map);
            if (!method_exists($this, $method)) {
                continue;
            }
            $data[$map]  = $this->$method();
        }
        return $data;
    }

}
