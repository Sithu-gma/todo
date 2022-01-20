<?php
namespace db;
use db;
use PDOException;
class Users{
    private $db=null;
    public function __construct(MySQL $db) {
        $this->db=$db->connect();
    }

    public function insert() {
      
            echo "good";
        
    }
}

$obj= new Users(new MySQL);
$obj->insert();