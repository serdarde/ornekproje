<?php
/**
 * Generate with EntityCreater from 7Style.Net
 * @package    StaticPages
 * @version 1.0.0
 * @date 2014/04/21
 */

/**
 * namespace definition and usage
 */
namespace Front\Entity;


/**
 * StaticPages entity
 *
 * @package Front
 */
class StaticPagesEntity implements StaticPagesEntityInterface
{

    protected $id;
    protected $pagename;
    protected $title;
    protected $content;
    protected $created_at;
     

     /* Set Array Map
     * @var array
     */
     protected $arrayMap = array(
            "id",
            "pagename",
            "title",
            "content",
            "created_at",
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
     * Set pagename
     * @param pagename
     */
     function setPagename($pagename)
     {
         $this->pagename = $pagename;
     }

    /**
     * Get pagename
     * @param pagename
     */
     function getPagename()
     {
         return $this->pagename;
     }

    /**
     * Set title
     * @param title
     */
     function setTitle($title)
     {
         $this->title = $title;
     }

    /**
     * Get title
     * @param title
     */
     function getTitle()
     {
         return $this->title;
     }

    /**
     * Set content
     * @param content
     */
     function setContent($content)
     {
         $this->content = $content;
     }

    /**
     * Get content
     * @param content
     */
     function getContent()
     {
         return $this->content;
     }

    /**
     * Set created_at
     * @param created_at
     */
     function setCreated_at($created_at)
     {
         $this->created_at = $created_at;
     }

    /**
     * Get created_at
     * @param created_at
     */
     function getCreated_at()
     {
         return $this->created_at;
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
