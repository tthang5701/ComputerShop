<?php

class productModel extends Connection
{

    public function __construct()
    {
        parent::__construct();
    }
    public function selectProductByBrandName($table, $idsanpham)
    {
        $sql = "SELECT * FROM $table WHERE id =:id";
        $data = [
            ':id' => $idsanpham
        ];
        return $this->db->select($sql, $data);
    }
    public function insertProduct($news_table, $data)
    {
        return $this->db->insert($news_table, $data);
    }
    public function updateProduct($news_table, $data, $conditon)
    {
        return $this->db->update($news_table, $data, $conditon);
    }
    public function selectProductByAll($table, $table2, $table3)
    {
        $sql = "SELECT * FROM `$table` INNER JOIN `$table2` ON `$table`.`brand_id` = `$table2`.`id`
           INNER JOIN `$table3` ON `$table`.`category_id` = `$table3`.`id`
           ORDER BY `$table`.`id` DESC ";
        return $this->db->select($sql);
    }
    public function deleteProduct($table, $conditon)
    {
        return $this->db->delete($table, $conditon);
    }
    public function selectProductById($table, $conditon = null)
    {
        $sql = "SELECT * FROM $table WHERE $conditon";
        return $this->db->select($sql);
    }
    public function selectProductAll($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->db->select($sql);
    }
    public function SelectOrder($table, $sort, $limit = 12, $offset = 0)
    {
        $sql = "SELECT * FROM $table ORDER BY $sort DESC LIMIT $offset,$limit";
        return $this->db->select($sql);
    }
    public function sortByProduct($table, $sort, $limit = 12, $offset = 0)
    {
        $sql = "SELECT * FROM $table ORDER BY $sort DESC LIMIT $offset,$limit";
        return $this->db->select($sql);
    }
    public function CountRow($table)
    {
        $sql = "SELECT * FROM $table ";
        return $this->db->getNumbersRow($sql);
    }
    public function GetProductByCategoryId($table, $table_product, $id)
    {
        $sql = "SELECT * FROM `$table` INNER JOIN `$table_product` ON `$table`.`id` = `$table_product`.`category_id` WHERE `$table_product`.`category_id` = $id ORDER BY `$table_product`.`id` DESC";
        return $this->db->select($sql);
    }
    public function GetProductByIdPagination($table, $table_product, $id, $limit = 8, $offset = 0)
    {
        $sql = "SELECT `$table`.`name` as `category_name`,`$table_product`.* FROM `$table` INNER JOIN `$table_product` ON `$table`.`id` = `$table_product`.`category_id` WHERE `$table`.`id` = $id ORDER BY `$table_product`.`id` DESC LIMIT $offset,$limit";
        return $this->db->select($sql);
    }
    public function getProductDetailInfor($table, $table_brand, $table_category, $id)
    {

        $sql = "SELECT `$table`.*, `$table_brand`.`name` as brand_name, `$table_category`.`name` as category_name 
			FROM `$table` INNER JOIN `$table_brand` ON `$table`.`brand_id` = `$table_brand`.`id` 
			INNER JOIN `$table_category` ON `$table`.`category_id` = `$table_category`.`id` WHERE `$table`.`id` =  $id";
        return $this->db->select($sql);
    }

    public function countRecord($table, $tableSecond, $id)
    {
        $value = $this->GetProductByCategoryId($table, $tableSecond, $id);
        return count($value);
    }
    public function selectSortByPrice($table, $sortType, $limit = 12, $offset = 0)
    {
        $sql = "SELECT * FROM $table ORDER BY `price` $sortType LIMIT $offset,$limit";
        return $this->db->select($sql);
    }
    public function searchProduct($table, $textSearch)
    {
        $sql = "SELECT * FROM `$table` WHERE `$table`.`name` LIKE  '%$textSearch%' ";
        return $this->db->select($sql);
    }
    public function searchProductPagination($table, $textSearch, $limit = 12, $offset = 0)
    {
        $sql = "SELECT * FROM `$table` WHERE `$table`.`name` LIKE  '%$textSearch%' ORDER BY `id` DESC LIMIT $offset,$limit ";
        return $this->db->select($sql);
    }
    public function selectProductPaginateAdmin($tableProduct, $tableBrand, $tableCategory, $limit = 12, $offset = 0)
    {
        $sql = "SELECT `$tableProduct`.*, `$tableBrand`.`name` as brand_name, `$tableCategory`.`name` as category_name FROM $tableProduct 
                INNER JOIN $tableBrand ON `$tableProduct`.`brand_id` = `$tableBrand`.`id`
                INNER JOIN $tableCategory ON `$tableCategory`.`id` = `$tableProduct`.`category_id` ORDER BY `$tableProduct`.`id` DESC LIMIT $offset, $limit ";
        return $this->db->select($sql);
    }
    public function updateViewCountNumber($tableProduct,$data,$conditon){
        return $this->db->update($tableProduct, $data, $conditon);
    }
    public function updateQuanlitiesOfProduct($tableProduct,$data,$conditon){
        return $this->db->update($tableProduct, $data, $conditon);
    }
}
