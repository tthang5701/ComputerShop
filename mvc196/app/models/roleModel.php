<?php

class roleModel extends Connection
{
  public function __construct()
  {
    parent::__construct();
  }
  public function seletcRoleRecoreds($table)
  {
    $sql = "SELECT * FROM `$table`";
    return $this->db->select($sql);
  }
  public function insertToRoleTable($table, $data)
  {
    return $this->db->insert($table, $data);
  }
  public function updateRoleTable($table, $data, $conditon)
  {
    return $this->db->update($table, $data, $conditon);
  }
  public function deleteRoleRecords($table, $conditon)
  {
    return $this->db->delete($table, $conditon);
  }
  public function selectWithCondition($table, $collum, $id)
  {
    $sql = "SELECT * FROM $table WHERE `$table`.`$collum` = $id";
    return $this->db->select($sql);
  }
}
