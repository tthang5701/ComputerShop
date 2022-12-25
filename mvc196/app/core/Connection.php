<?php

class Connection
{
    protected $db = array();

    public function __construct()
    {
        $connect = "mysql:host=localhost;dbname=webphukiendt;";
        $userName = 'root';
        $password = '';
        $this->db = new Database($connect, $userName, $password);
    }
}
