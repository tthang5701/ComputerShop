<?php
class category extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insertcaretoryProducts($news_table, $data)
    {
        return $this->db->insert($news_table, $data);
    }
    public function updatecaretoryProducts($news_table, $data, $conditon)
    {
        return $this->db->update($news_table, $data, $conditon);
    }
    public function selectcaretoryProductsByAll($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC ";
        return $this->db->select($sql);
    }
    public function deletecaretoryProduct($table, $conditon)
    {
        return $this->db->delete($table, $conditon);
    }
    public function selectcaretoryProductById($table, $conditon)
    {
        $sql = "SELECT * FROM $table WHERE $conditon";
        return $this->db->select($sql);
    }
    public function CountRow($table)
    {
        $sql = "SELECT * FROM $table ";
        return $this->db->getNumbersRow($sql);
    }
    public function SelectOrder($table, $sort, $limit = 12, $offset = 0)
    {
        $sql = "SELECT * FROM $table ORDER BY $sort DESC LIMIT $offset,$limit";
        return $this->db->select($sql);
    }
}
