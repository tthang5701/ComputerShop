<?php

class loginModel extends Connection{
    public function __construct()
    {
        parent::__construct();
    }
    public function logIn($table,$username,$password){
        $sql = "SELECT * FROM $table WHERE username = ? AND password = ? ";
        return $this->db->affectedRows( $sql,$username,$password);
    }
    public function getLogIn($table,$username,$password){
        $sql = "SELECT * FROM $table WHERE username = ? AND password = ? ";
        return $this->db->selectUser($sql,$username,$password);
    }
}
