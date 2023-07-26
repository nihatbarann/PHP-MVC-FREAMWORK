<?php
defined('APP') or exit('Klasöre Erişim Yetkiniz yok');

Define('HOST','localhost');
Define('DBNAME','deneme');
Define('USERNAME','root');
Define('PASSWORD','');

define('ROOT',str_replace("core","",__DIR__));
define('URL',"http://localhost/PhpFreamwork/");
define('ASSETS',URL."assets/");
define('ADMIN',URL."view/admin/");


define('DEBUG',true);

?>