<?php
/**
 * Created by PhpStorm.
 * User: ekeser
 * Date: 22.04.14
 * Time: 15:34
 */

namespace Front\Service;

use Zend\Db\Adapter\Exception\InvalidQueryException;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\Filter\StaticFilter;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\DbSelect;
use Front\Entity\ProjectEntity;
use Front\Entity\ProjectEntityInterface;


abstract class AbstractCustomService implements EventManagerAwareInterface, ServiceInterface
{

    protected $_class = null;


    /**
     * @var EventManagerInterface
     */
    protected $eventManager = null;

    /**
     * @var ProjectTableInterface
     */
    protected $table = null;

    /**
     * @var ProjectFormInterface[]
     */
    protected $forms = array();

    /**
     * @var string
     */
    protected $message = null;


    /**
     * @param \Front\Table\TableInterface $table
     */
    public function __construct($table)
    {
        $this->setTable($table);
    }

    /**
     * Inject an EventManager instance
     *
     * @param  EventManagerInterface $eventManager
     *
     * @return void
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->setIdentifiers(array(__CLASS__));
        $this->eventManager = $eventManager;
    }

    /**
     * Retrieve the event manager
     *
     * Lazy-loads an EventManager instance if none registered.
     *
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        return $this->eventManager;
    }

    /**
     * Get blog table
     *
     * @return ProjectTableInterface
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Set blog table
     *
     * @param ProjectTableInterface $table
     *
     * @return ProjectServiceInterface
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * Get service message
     *
     * @return array
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Clear service message
     */
    public function clearMessage()
    {
        $this->message = null;
    }

    /**
     * Add service message
     *
     * @param string new message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get form with triggering the Event-Manager
     *
     * @param  string $type form type
     *
     * @return ProjectFormInterface
     */
    public function getForm($type = 'add')
    {
        if (!isset($this->forms[$type])) {
            $this->getEventManager()->trigger(
                'set-project-form', __CLASS__, array('type' => $type, 'class' => $this->_class)
            );
        }
        return $this->forms[$type];
    }


    /**
     * @param \Admin\Form\ProjectForm $form
     * @param string $type
     *
     * @return mixed|void
     */
    public function setForm( $form, $type = 'add')
    {
        $this->forms[$type] = $form;
    }

    /**
     * Fetch single by url
     *
     * @param varchar $url
     *
     * @return ProjectEntityInterface
     */
    public function fetchSingleByUrl($url)
    {
        return $this->getTable()->fetchSingleByUrl($url);
    }

    /**
     * Fetch single by id
     *
     * @param varchar $id
     *
     * @return ProjectEntityInterface
     */
    public function fetchSingleById($id)
    {
        return $this->getTable()->fetchSingleById($id);
    }


    /**
     * @param int $page
     * @param int $perPage
     *
     * @return Paginator|Paginator
     */
    public function fetchList($page = 1, $perPage = 15)
    {
        // Initialize select
        $select = $this->getTable()->getSql()->select();
        $select->order('id DESC');

        // Initialize paginator
        $adapter = new DbSelect(
            $select,
            $this->getTable()->getAdapter(),
            $this->getTable()->getResultSetPrototype()
        );
        $paginator = new Paginator($adapter);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($perPage);
        $paginator->setPageRange(9);

        // return paginator
        return $paginator;
    }


    /**
     * @return mixed
     */
    public function fetchAll() {
        return $this->getTable()->fetchAll();
    }


    /**
     * Save a blog
     *
     * @param array $data input data
     * @param integer $id id of blog entry
     *
     * @return ProjectEntityInterface
     */
    public function save(array $data, $id = null)
    {
        // check mode
        $mode = is_null($id) ? 'add' : 'edit';
        // get blog entity
        if ($mode == 'add') {
            $project = new ProjectEntity();
        } else {
            $project = $this->fetchSingleById($id);
        }
        // get form and set data
        $form = $this->getForm($mode);
        $form->setData($data);
        if (!$form->isValid()) {
            $this->setMessage('Bitte Eingaben überprüfen!');
            return false;
        }
        // get valid blog entity object
        $project->exchangeArray($form->getData());

        // get insert data
        $saveData = $project->getArrayCopy();
        $formData = $form->getData();
        if (is_array($formData)) {
            if (isset($formData['img']['tmp_name'])) {
                $target = getcwd() . '/public/img/project/' . $formData['img']['name'];
                $tmp_file = $formData['img']['tmp_name'];
                if (copy($tmp_file, $target)) {
                    unlink($tmp_file);
                    $saveData['img'] = strstr($target, "/img/");
                } else {
                    $this->setMessage('Project image konnte nicht kopiert werden.');
                }
            }
        }

        try {
            if ($mode == 'add') {
                $this->getTable()->insert($saveData);
                $id = $this->getTable()->getLastInsertValue();
            } else {
                $this->getTable()->update($saveData, array('id' => $id));
            }
        } catch (InvalidQueryException $e) {
            $this->setMessage('Projectbeitrag wurde nicht gespeichert! <br />' . $e->getMessage());
            return false;
        }
        $project = $this->fetchSingleById($id);
        $this->setMessage('Projectbeitrag wurde gespeichert!');
        return $project;
    }

    /**
     * @param int $id
     *
     * @return bool|ProjectEntityInterface
     */
    public function delete($id)
    {
        $blog = $this->fetchSingleById($id);
        try {
            $result = $this->getTable()->delete(array('id' => $id));
        } catch (InvalidQueryException $e) {
            return false;
        }
        $this->setMessage('Der Projectbeitrag wurde gelöscht!');
        return true;
    }
} 