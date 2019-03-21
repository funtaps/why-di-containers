<?php

class DbSelector
{
  private $db = null;
  private $table_name = null;
  
  public function __construct(PDO $db, string $table_name)
  {
    $this->db = $db;
    $this->table_name = $table_name;
  }
  
  public function getFirst() {
    return $this->db->query("SELECT * FROM $this->table_name LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);
  }
  
}