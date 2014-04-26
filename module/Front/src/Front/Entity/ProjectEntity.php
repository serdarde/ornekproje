<?php
/**
 * @package    Front
 * @author     Ersin Keser <ersin@7style.net>
 */

/**
 * namespace definition and usage
 */
namespace Front\Entity;

/**
 * Project entity
 *
 * @package    Blog
 */
class ProjectEntity implements ProjectEntityInterface

{

    protected $id;
    protected $name;
    protected $url;
    protected $firma;
    protected $date;
    protected $technology;
    protected $task;
    protected $type;
    protected $desc;
    protected $tag;
    protected $img;


    /**
     * Set Array Map
     * @var array
     */
    protected $arrayMap = array(
        "id",
        "name",
        "url",
        "firma",
        "date",
        "technology",
        "task",
        "type",
        "desc",
        "tag",
        "img",
    );


    /**
     * SetId
     * @param $id
     */
    function setId($id)
    {
        $this->id = $id;
    }

    function getId()
    {
        return $this->id;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }

    function setUrl($url)
    {
        $this->url = $url;
    }

    function getUrl()
    {
        return $this->url;
    }

    function setFirma($firma)
    {
        $this->firma = $firma;
    }

    function getFirma()
    {
        return $this->firma;
    }

    function setDate($date)
    {
        $this->date = $date;
    }

    function getDate()
    {
        return $this->date;
    }

    function setTechnology($technology)
    {
        $this->technology = $technology;
    }

    function getTechnology()
    {
        return $this->technology;
    }

    function setTask($task)
    {
        $this->task = $task;
    }

    function getTask()
    {
        return $this->task;
    }

    function setType($type)
    {
        $this->type = $type;
    }

    function getType()
    {
        return $this->type;
    }

    function setDesc($desc)
    {
        $this->desc = $desc;
    }

    function getDesc()
    {
        return $this->desc;
    }

    function setTag($tag)
    {
        $this->tag = $tag;
    }

    function getTag()
    {
        return $this->tag;
    }

    function setImg($img)
    {
        $this->img = $img;
    }

    function getImg()
    {
        return $this->img;
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
