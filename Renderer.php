<?php

class Renderer
{
  private $selector = null;
  
  public function __construct(DbSelector $selector)
  {
    $this->selector = $selector;
  }
  
  public function render()
  {
    var_dump($this->selector->getFirst());
  }
  
}