<?php
namespace tp4_password;
class User {    
    private $id;
    private $name;
    private $note;
    private $psw_md5;
    private $psw_hash;
    private $psw_salt;
                   
    public function __construct(){
        
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }

    function getNote()
    {
        return $this->note;
    }

    function setNote($note)
    {
        $this->note = $note;
    }

    function getPasswordMD5()
    {
        return $this->psw_md5;
    }

    function setPasswordMD5($psw_md5)
    {
        $this->psw_md5 = $psw_md5;
    }

    function getPasswordSalt()
    {
        return $this->psw_salt;
    }

    function setPasswordSalt($psw_salt)
    {
        $this->psw_salt = $psw_salt;
    }

    function getPasswordHashed()
    {
        return $this->psw_hash;
    }

    function setPasswordHashed($psw_hash)
    {
        $this->psw_hash = $psw_hash;
    }

    function getPasswordClear()
    {
        return $this->psw_clear;
    }

    function setPasswordClear($psw_clear)
    {
        $this->psw_clear = $psw_clear;
    }
}
