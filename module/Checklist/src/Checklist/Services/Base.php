<?php
/**
 * Created by PhpStorm.
 * User: Serdar
 * Date: 24.04.14
 * Time: 20:39
 */
namespace Checklist\Services;

class Base {
    /**
     * @var
     */
    public $username;
    /**
     * @var
     */
    public $password;

    public function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
    }

    public function returnBack(){
        return $this->username.$this->password;
    }
}


class Rood{
    public function __construct(Base $base){
        return $base->returnBack();
    }
}