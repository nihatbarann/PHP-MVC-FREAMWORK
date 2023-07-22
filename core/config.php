<?php
defined('APP') or exit('Klasöre Erişim Yetkiniz yok');

Define('HOST','localhost');
Define('DBNAME','deneme');
Define('USERNAME','root');
Define('PASSWORD','');


define('ROOT',str_replace("core","",__DIR__));
define('ASSETS',ROOT."assets");
define('URL',"http://localhost/PhpFreamwork");


define('DEBUG',true);

?>