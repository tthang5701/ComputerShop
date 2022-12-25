<?php

class paymentModel extends Connection
{

  public function __construct()
  {
    parent::__construct();
  }
  public function selectPaymentList($table)
  {
    $sql = "SELECT * FROM $table";
    return $this->db->select($sql);
  }
  public function insertPayment($table, $data)
  {
    return $this->db->insert($table, $data);
  }
  public function updatePayment($table, $data, $conditon)
  {
    return $this->db->update($table, $data, $conditon);
  }
  public function deletePayment($table, $conditon)
  {
    return $this->db->delete($table, $conditon);
  }
  public function selectToEditPayment($table, $id)
  {
    $sql = "SELECT * FROM $table WHERE `$table`.`id` = $id";
    return $this->db->select($sql);
  }
}
