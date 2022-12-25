<?php

class statisticModel extends Connection
{
  public function __construct()
  {
    parent::__construct();
  }
  public function insertStatisticTable($tableSatistic, $data)
  {
    return $this->db->insert($tableSatistic, $data);
  }
  public function statistiProcessing($tableEarning)
  {
    $sql =  "SELECT SUM(`$tableEarning`.`product_count`) as   `productCounted`,SUM(`$tableEarning`.`order_count`) as  `orderCounted`,`$tableEarning`.`created_date`,SUM(`$tableEarning`.`total_price`) as  `sumPrice` FROM $tableEarning GROUP BY  `$tableEarning`.`created_date` ";
    return $this->db->select($sql);
  }
  public function deleteEarningsTable($tableEarning)
  {
    return $this->db->deleteAll($tableEarning);
  }
  public function selectAll($tableEarning)
  {
    $sql = "SELECT * FROM `$tableEarning` ";
    return $this->db->select($sql);
  }
  public function selectStatisticAll($tableSatistic, $fromDate, $toDate)
  {
    $sql = "SELECT * FROM `$tableSatistic` WHERE `$tableSatistic`.`order_date` BETWEEN '$fromDate' AND '$toDate' ";
    return $this->db->select($sql);
  }
  public function getEarnings($tableSatistic)
  {
    $sql = "SELECT SUM(`$tableSatistic`.`earnings`) as 'Earnings' FROM `$tableSatistic`";
    return $this->db->select($sql);
  }
  public function selectMostViewList($table, $limit = 8)
  {
    $sql = "SELECT * FROM `$table` ORDER BY `$table`.`view_count` DESC LIMIT $limit";
    return $this->db->select($sql);
  }
}
