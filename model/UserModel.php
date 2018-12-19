<?php
namespace tp4_password;
use \PDO;

require_once '../config/DBConnection.php';
require_once 'User.php';
require_once 'JsonResult.php';


class UserModel extends User {
    
    private $table;

    public function __construct() {
        $this->table = "users";
        parent::__construct($this->table);
    }

    public function create(){
        $pdo = new DBConnection();
        $db = $pdo->DBConnect();
        try {
            $sql = "INSERT INTO " . $this->table . "(name, date_create_at, psw_clear, psw_md, psw_hash, psw_salt, note) VALUES(?, NOW(), ?, ?, ?, ?, ?)";
            $record = $db->prepare($sql);
            $myarray = array($this->getName(), $this->getPasswordClear(), $this->getPasswordMD5(), $this->getPasswordHashed(), $this->getPasswordSalt(), $this->getNote());
            return $record->execute($myarray) ? JsonResult::succeededReturn() :
                JsonResult::failledReturn();
        } catch (PDOException $exc) {
            return JsonResult::failledReturn($exc->getMessage());
        }   
    } 

    public function get_users(){
        $pdo = new DBConnection();
        $db = $pdo->DBConnect();
        try {
            $sql = "SELECT * FROM " . $this->table;
            $record = $db->prepare($sql);

            $users = $record->execute();
            if ($users) {
                $dataList = $record->fetchAll(PDO::FETCH_ASSOC);
                return JsonResult::succeededDataReturn($dataList);
            } else {
                JsonResult::failledReturn();
            }                            
        } catch (PDOException $exc) {
            return JsonResult::failledReturn($exc->getMessage());
        }   
    } 
}
