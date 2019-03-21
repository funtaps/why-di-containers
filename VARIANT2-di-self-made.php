<?php
require(__DIR__.'/DbSelector.php');
require(__DIR__.'/Renderer.php');


$config = require(__DIR__.'/config.php');

class MyContainer {
  
  private $config = [];
  
  public function __construct($config)
  {
    $this->config = $config;
  }
  
  private $db = null;
  /**
   * @return PDO
   */
  public function getDB()
  {
    if (!$this->db) {
      $dsn = 'mysql:dbname=' . $this->config['db_scheme'] . ';host=' . $this->config['db_host'];
      $this->db = new PDO($dsn, $this->config['db_user'], $this->config['db_pass']);
    }
    return $this->db;
  }
  
  private $selector = null;
  /**
   * @return DbSelector
   */
  public function getSelector()
  {
    if (!$this->selector) {
      $this->selector = new DbSelector($this->getDB(), $this->config['table_name']);
    }
    return $this->selector;
  }
  
  private $renderer = null;
  /**
   * @return Renderer
   */
  public function getRenderer()
  {
    if (!$this->renderer) {
      $this->renderer = new Renderer($this->getSelector());
    }
    return $this->renderer;
  }
  
}

$container = new MyContainer($config);
$container->getRenderer()->render();
