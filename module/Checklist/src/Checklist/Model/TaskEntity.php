<?php
namespace Checklist\Model;

class TaskEntity
{
    protected $id;
    protected $title;
    protected $completed = 0;
    protected $created;

    public function __construct()
    {
        $this->created = date('Y-m-d H:i:s');
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($Value)
    {
        $this->id = $Value;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($Value)
    {
        $this->title = $Value;
    }

    public function getCompleted()
    {
        return $this->completed;
    }

    public function setCompleted($Value)
    {
        $this->completed = $Value;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($Value)
    {
        $this->created = $Value;
    }

    /**
     * @param $data
     */
    public function exchangeArray($data){
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->artist = (!empty($data['artist'])) ? $data['artist'] : null;
        $this->title  = (!empty($data['title'])) ? $data['title'] : null;
    }

}