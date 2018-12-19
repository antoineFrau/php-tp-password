<?php
namespace tp4_password;

require_once '../config/properties.php';
require_once '../model/UserModel.php';

class UserController{
    
    public function __construct() {        
    }
    
    public function create($name, $password){
        $user = new UserModel;
        $user->setName($name);
        $user->setNote(implode("", $this->getNote($password)));
        $user->setPasswordClear($password);
        $user->setPasswordSalt($this->mySalt($name));
        $user->setPasswordMD5(md5($password));
        $user->setPasswordHashed(password_hash($password, PASSWORD_DEFAULT));
        $response = $user->create();
        echo json_encode($response);
    }

    public function getNote($password){
        $digit_rg = '/[0-9]/';
        $maj_rg = '/[A-Z]/';
        $charspe_rg = '/[!@#$%&*,.?:+=\-_]/';
        $nb_digit = $this->count_regex($password, $digit_rg);
        $nb_maj = $this->count_regex($password, $maj_rg);
        $nb_charspe = $this->count_regex($password, $charspe_rg);
        $nb_lenght = $this->count_length($password);
        return [$nb_digit, $nb_maj, $nb_charspe, $nb_lenght];
    }

    public function count_regex($data, $regex){
        $count = 0;
        preg_replace_callback($regex, function ($m) use (&$count) {
            $count++;
        }, $data);
        if($count>=10)
            return 9;
        return $count;
    }

    public function count_length($data){
        if(strlen($data)<12)
            return 0;
        else if(strlen($data) >= 12 && strlen($data) <= 15)
            return 1;
        else if (strlen($data) >= 16 && strlen($data) <= 17)
            return 2;
        else 
            return 3;
    }

    public function mySalt($name){
        $A = 0;
        $M = 1;
        for ($i = 0; $i < strlen($name); $i++) {
            $A = $A + ord($name {$i});
            $M = $M * ord($name {$i});
        }
        return $A . $name . $M;
    }

    public function get_users(){
        $user = new UserModel;
        $response = $user->get_users();
        echo json_encode($response);
    }
    
}

