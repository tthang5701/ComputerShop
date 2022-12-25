<?php

class Database extends PDO
{
       //connect with database 
       public function __construct($connect, $userName, $password)
       {
              parent::__construct($connect, $userName, $password);
       }
       //total 
       public function total($sql)
       {
              $stmt = $this->prepare($sql);
              $stmt->execute();
              return $stmt->fetchAll();
       }
       //selet function 
       public function select($sql, $data = [], $fetchStyle = PDO::FETCH_ASSOC)
       {
              $stmt = $this->prepare($sql);
              foreach ($data as $key => $value) {
                     $stmt->bindParam($key, $value);
              }
              $stmt->execute();
              return $stmt->fetchAll($fetchStyle);
       }
       //insert function 
       public function insert($news_table, $data)
       {
              $key = implode(",", array_keys($data));
              $value = ':' . implode(', :', array_keys($data));
              $sql = "INSERT INTO $news_table($key) VALUES($value)";
              $stmt = $this->prepare($sql);
              foreach ($data as $key => $value) {
                     $stmt->bindValue(":$key", $value);
              }
              return $stmt->execute();
       }
       //update function 
       public function update($table, $data, $conditon)
       {
              $updateKey  = NULL;
              foreach ($data as $key => $value) {
                     $updateKey .= "$key=:$key,";
              }
              $updateKey = rtrim($updateKey, ",");
              $sql = "UPDATE $table SET $updateKey WHERE $conditon";
              $stmt = $this->prepare($sql);

              foreach ($data as $key => $value) {
                     $stmt->bindValue(":$key", $value);
              }
              return $stmt->execute();
       }
       //delete function 
       public function delete($table, $conditon)
       {
              $sql = "DELETE FROM $table WHERE $conditon";
              return  $this->exec($sql);
       }
       //delete all 
       public function deleteAll($table)
       {
              $sql = "DELETE FROM `$table`";
              return $this->exec($sql);
       }
       //Count the row in database has username and password equal with data in form.
       public function affectedRows($sql, $username, $password)
       {
              $stmt = $this->prepare($sql);
              $stmt->execute([$username, $password]);
              return  $stmt->rowCount();
       }
       public function selectUser($sql, $username, $password)
       {
              $stmt = $this->prepare($sql);
              $stmt->execute([$username, $password]);
              return $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       public function getNumbersRow($sql)
       {
              $stmt = $this->prepare($sql);
              $stmt->execute();
              return  $stmt->rowCount();
       }
}
