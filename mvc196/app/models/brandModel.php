<?php
class brandModel extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insertBrand($news_table, $data)
    {
        return $this->db->insert($news_table, $data);
    }
    public function updateBrand($news_table, $data, $conditon)
    {
        return $this->db->update($news_table, $data, $conditon);
    }
    public function selectBrandByAll($table)
    {
        $sql = "SELECT * FROM `$table` ORDER BY 'id' DESC ";
        return $this->db->select($sql);
    }
    public function deleteBrand($table, $conditon)
    {
        return $this->db->delete($table, $conditon);
    }
    public function selectBrandById($table, $conditon)
    {
        $sql = "SELECT * FROM `$table` WHERE $conditon";
        return $this->db->select($sql);
    }
    public function GetProductByIdPagination($table, $table_product, $id, $limit, $offset)
    {
        $sql = "SELECT `$table`.`name` as `brand_name`,`$table_product`.* FROM `$table` INNER JOIN `$table_product` ON `$table`.`id` = `$table_product`.`brand_id` WHERE `$table`.`id` = $id ORDER BY `$table_product`.`id` DESC LIMIT $offset,$limit";
        return $this->db->select($sql);
    }
    public function GetProductById($table, $table_product, $id)
    {
        $sql = "SELECT * FROM `$table` INNER JOIN `$table_product` ON `$table`.`id` = `$table_product`.`brand_id` WHERE `$table`.`id` = $id ORDER BY `$table_product`.`id` DESC";
        return $this->db->select($sql);
    }
    public function SelectOrder($table, $sort, $limit = 6, $offset = 0)
    {
        $sql = "SELECT * FROM `$table` ORDER BY $sort DESC LIMIT $offset,$limit";
        return $this->db->select($sql);
    }
    public function CountRow($table)
    {
        $sql = "SELECT * FROM `$table` ";
        return $this->db->getNumbersRow($sql);
    }
    public function countRecord($table,$tableSecond,$id){
        $value = $this->GetProductById($table,$tableSecond,$id);
        return count($value);
    }
}
