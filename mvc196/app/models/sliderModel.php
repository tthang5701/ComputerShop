<?php

class sliderModel extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }
    public function selectSliderAll($table)
    {
        $sql = "SELECT * FROM $table ";
        return $this->db->select($sql);
    }
    public function selectSliderWithConditon($table, $conditon)
    {
        $sql = "SELECT * FROM $table WHERE $conditon";
        return $this->db->select($sql);
    }
    public function SelectWIthSort($table, $sort)
    {
        $sql = "SELECT * FROM $table ORDER BY $sort DESC";
        return $this->db->select($sql);
    }
    public function insertSlider($news_table, $data)
    {
        return $this->db->insert($news_table, $data);
    }
    public function updateSlider($news_table, $data, $conditon)
    {
        return $this->db->update($news_table, $data, $conditon);
    }
    public function selectSliderByAll($table, $limit = 12, $offset = 0)
    {
        $sql = "SELECT * FROM $table ORDER BY `id` DESC LIMIT $offset,$limit";
        return $this->db->select($sql);
    }
    public function deleteSlider($table, $conditon)
    {
        return $this->db->delete($table, $conditon);
    }
}
