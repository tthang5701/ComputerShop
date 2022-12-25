<?php
class newModel extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insertNew($news_table, $data)
    {
        return $this->db->insert($news_table, $data);
    }
    public function updateNew($news_table, $data, $conditon)
    {
        return $this->db->update($news_table, $data, $conditon);
    }
    public function selectNewByAll($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC ";
        return $this->db->select($sql);
    }
    public function deleteNew($table, $conditon)
    {
        return $this->db->delete($table, $conditon);
    }
    public function selectNewById($table, $conditon)
    {
        $sql = "SELECT * FROM $table WHERE $conditon";
        return $this->db->select($sql);
    }
    public function SelectOrder($table, $sort, $limit = 10, $offset = 0)
    {
        $sql = "SELECT * FROM $table ORDER BY $sort DESC LIMIT $offset,$limit";
        return $this->db->select($sql);
    }
    public function CountRow($table)
    {
        $sql = "SELECT * FROM $table ";
        return $this->db->getNumbersRow($sql);
    }
}
