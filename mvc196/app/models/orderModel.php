<?php

class orderModel extends Connection
{

  public function __construct()
  {
    parent::__construct();
  }
  public function insertToOrderTable($table, $data)
  {
    return $this->db->insert($table, $data);
  }
  public function CountRowToCheckIsset($table, $id)
  {
    $sql = "SELECT * FROM $table WHERE `$table`.`cart_id` = $id";
    return $this->db->getNumbersRow($sql);
  }
  public function selectproductListInOrder($table, $tableProduct, $tableOrder, $collum, $id)
  {
    $sql = "SELECT * FROM $table INNER JOIN $tableProduct ON `$table`.`product_id` = `$tableProduct`.`id`  INNER JOIN $tableOrder ON `$table`.`order_id` = `$tableOrder`.`id` WHERE `$table`.`$collum` = $id ";
    return $this->db->select($sql);
  }
  public function countProductNumberInOrder($tableOrder, $tableOrderDetail, $collum, $id)
  {
    $sql = "SELECT * FROM $tableOrder 
    INNER JOIN $tableOrderDetail ON `$tableOrder`.`id` = `$tableOrderDetail`.`order_id`  
    WHERE `$tableOrderDetail`.`$collum` = $id AND `$tableOrder`.`status` = 1";
    return $this->db->getNumbersRow($sql);
  }
  public function selectOrderItem($table, $collum, $id)
  {
    $sql = "SELECT * FROM $table WHERE `$table`.`$collum` = $id";
    return $this->db->select($sql);
  }
  public function deleteOrder($table, $conditon)
  {
    return $this->db->delete($table, $conditon);
  }
  public function updateStatusOfOrder($table, $data, $conditon)
  {
    return $this->db->update($table, $data, $conditon);
  }
  public function selectOrderTracking( $tableOrder,$tablePayment,$tableUser,$userId)
  {
    $sql = "SELECT  `$tableOrder`.`id` as order_id, `$tableOrder`.`status` as `order_status`, `$tableUser`.`name` as order_user,`$tableOrder`.`total` as order_total, `$tablePayment`.`name` as payment_name, `$tableOrder`.`created_date` as created_date FROM `$tableOrder` 
    INNER JOIN $tablePayment ON `$tableOrder`.`payment_id` = `$tablePayment`.`id`
    INNER JOIN $tableUser ON `$tableOrder`.`user_id` = `$tableUser`.`id`
    WHERE `$tableUser`.`id` = $userId;
    ";
    return $this->db->select($sql);
  }
  public function sumOrderTotalPrice($table, $tableOrderDetail, $tableCart, $user_id, $tableProduct)
  {
    $sql = "SELECT SUM(`$tableOrderDetail`.`total_price`) as `subTotal` FROM `$table` INNER JOIN $tableOrderDetail ON `$table`.`id` = `$tableOrderDetail`.`order_id` INNER JOIN $tableCart ON `$tableCart`.`id` = `$table`.`cart_id` INNER JOIN $tableProduct ON `$tableOrderDetail`.`product_id` = `$tableProduct`.`id` WHERE `$tableCart`.`user_id` = $user_id  ";
    return $this->db->select($sql);
  }
  public function selectAllOrder($tableOrder, $tableOrderDetail, $tableProduct, $tablePayment, $tableUser, $tableCart)
  {
    $sql = "SELECT `$tableOrder`.`id` as order_id, `$tableOrder`.`status` as status, `$tableUser`.`name` as order_user, total_price, `$tablePayment`.`name` as payment_name, `$tableOrder`.`created_date` as created_date FROM $tableOrder 
    INNER JOIN $tableCart ON `$tableCart`.`id` = `$tableOrder`.`cart_id`
    INNER JOIN $tableOrderDetail ON `$tableOrderDetail`.`order_id` = `$tableOrder`.`id`
    INNER JOIN $tableProduct ON `$tableOrderDetail`.`product_id` = `$tableProduct`.`id`
    INNER JOIN $tablePayment ON `$tablePayment`.`id` = `$tableOrder`.`payment_id`
    INNER JOIN $tableUser ON `$tableUser`.`id` = `$tableCart`.`user_id`
    GROUP BY `$tableOrderDetail`.`order_id`;
    ";
    return $this->db->select($sql);
  }
  public function selectLatestOrderIn($tableOrder){
     $sql = "SELECT MAX(`$tableOrder`.`id`) as `latest_order_id` FROM $tableOrder";
     return $this->db->select($sql);
  }
}
