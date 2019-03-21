<?php
require(__DIR__.'/vendor/autoload.php');
require(__DIR__.'/DbSelector.php');
require(__DIR__.'/Renderer.php');

use Pimple\Container;

$config = require(__DIR__.'/config.php');
$container = new Container();
$container['db_host'] = $config['db_host'];
$container['db_user'] = $config['db_user'];
$container['db_pass'] = $config['db_pass'];
$container['db_scheme'] = $config['db_scheme'];
$container['table_name'] = $config['table_name'];

$container['db'] = function($c) {
  $dsn = 'mysql:dbname='.$c['db_scheme'].';host='.$c['db_host'];
  return new PDO($dsn, $c['db_user'], $c['db_pass']);
};

$container['selector'] = function($c) {
  return new DbSelector($c['db'], $c['table_name']);
};

$container['renderer'] = function($c) {
  return new Renderer($c['selector']);
};

$container['renderer']->render();


