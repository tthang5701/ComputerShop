<?php

class User extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }
    public function selectUsersAll($table, $tableRole)
    {
        $sql = "SELECT `$table`.*, `$tableRole`.`name` AS role_name FROM `$table` INNER JOIN `$tableRole` ON `$table`.`role_id` = `$tableRole`.`id` ";
        return $this->db->select($sql);
    }
    public function insertUser($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function selectSpecifyUser($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE `id` = $id";
        return $this->db->select($sql);
    }
    public function updateUser($table, $data, $conditon)
    {
        return $this->db->update($table, $data, $conditon);
    }
    public function getUserOnlineList($table)
    {
        $sql = "SELECT * FROM `$table` WHERE `$table`.`status` = 1";
        return $this->db->select($sql);
    }
    public function updateOnlineStatus($table, $data, $conditon)
    {
        return $this->db->update($table, $data, $conditon);
    }
    public function deleteRecords($table, $conditon)
    {
        return $this->db->delete($table, $conditon);
    }
    public function selectUsersAndRoleCondition($table, $tableRole, $condition)
    {
        $sql = "SELECT `$table`.*, `$tableRole`.`name` AS role_name FROM $table INNER JOIN $tableRole ON `$table`.`role_id` = `$tableRole`.`id` WHERE $condition";
        return $this->db->select($sql);
    }
}
