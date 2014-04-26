<?php
/**
 * Created by PhpStorm.
 * User: Serdar
 * Date: 11.04.14
 * Time: 21:54
 */

namespace Application\Models;

class PostIdentityMap{

    public $_postDataMapper;

    public function __construct(PostDataMapper $pdm){
        $this->_postDataMapper = $pdm;
    }
} 