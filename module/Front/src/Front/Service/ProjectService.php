<?php

/**
 * namespace definition and usage
 */
namespace Front\Service;


use Front\Service;


/**
 * Project Service
 * 
 * @package    Project
 */
class ProjectService  extends AbstractCustomService
{

    /**
     * @param \Front\Table\TableInterface $table
     */
    public function __construct($table)
    {
        $this->_class = 'Front\Service\Project';
        parent::__construct($table);
    }


    /**
     * @return mixed
     */
    public function fetchAll() {
        $projects =  $this->getTable()->fetchAll();
        $sortedProject = array ();
        foreach ($projects as $project) {
            $sortedProject[$project->getType()][] = $project->getArrayCopy();
        }

        return $sortedProject;
    }

}
