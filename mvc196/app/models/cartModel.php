<?php

class cartModel extends Connection
{

    public function __construct()
    {
        parent::__construct();
    }
    public function updateCart($table, $data, $conditon)
    {
        return $this->db->update($table, $data, $conditon);
    }
    public function deleteCart($table, $conditon)
    {
        return $this->db->delete($table, $conditon);
    }
    public function selectCartAll($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->db->select($sql);
    }
    public function insertToCart($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function checkCartIsset($id)
    {
        $sql = "SELECT count(*) FROM `cart` WHERE `id` = $id ";
        return $sql;
    }
    public function selectSpecifieldCartOfUser($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE `$table`.`user_id` = $id";
        return $this->db->select($sql);
    }
    public function CountRowToCheckIsset($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE `$table`.`user_id` = $id";
        return $this->db->getNumbersRow($sql);
    }
    public function selectCartInformation($table, $tableCartDetail, $tableProduct, $id)
    {
        $sql = "SELECT `$tableCartDetail`.*, `$tableProduct`.`name` as product_name, 
			`$tableProduct`.`image` as product_image, `$table`.`user_id` as user_id FROM `$table` 
			INNER JOIN `$tableCartDetail` ON `$table`.`id` = `$tableCartDetail`.`cart_id` 
			INNER JOIN `$tableProduct` ON `$tableCartDetail`.`product_id` = `$tableProduct`.`id` 
			WHERE `$table`.`user_id` = $id";
        return $this->db->select($sql);
    }
    public function sumTotalPrice($table, $tableCartDetail, $tableProduct, $id)
    {
        $sql = "SELECT SUM(`$tableCartDetail`.`total_price`) as 'subTotal' FROM `$table` INNER JOIN `$tableCartDetail` ON `$table`.`id` = `$tableCartDetail`.`cart_id` INNER JOIN `$tableProduct` ON `$tableCartDetail`.`product_id` = `$tableProduct`.`id` WHERE `$table`.`user_id` = $id
        ";
        return $this->db->total($sql);
    }
    public function countProductInCart($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE `$table`.`cart_id` = $id";
        return $this->db->getNumbersRow($sql);
    }
    public function getSpecifyInCart($tableCartDetail, $id)
    {
        $sql = "SELECT * FROM $tableCartDetail WHERE `$tableCartDetail`.`cart_id` = $id";
        return $this->db->select($sql);
    }
    public function getQuantitiesOfProductInCartDetail($tableCartDetail, $id, $product_id)
    {
        $sql = "SELECT `$tableCartDetail`.`quantity` FROM $tableCartDetail WHERE `$tableCartDetail`.`cart_id` = $id AND `$tableCartDetail`.`product_id` = $product_id";
        return $this->db->select($sql);
    }
}
