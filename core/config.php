<?php
defined('APP') or exit('Klasöre Erişim Yetkiniz yok');

Define('HOST','localhost');
Define('DBNAME','deneme');
Define('USERNAME','root');
Define('PASSWORD','');

//eğer porje developer aşamasında ise url kısmındaki proje ismini değiştirin
define('ROOT',str_replace("core","",__DIR__));
define('URL',"http://localhost/PhpFreamwork/");    
define('ASSETS',ROOT."assets/");
define('ADMIN',ROOT."view/admin/");

//log un tutalacağı dosya yolunu belirleyin
ini_set('error_log', ROOT.'/storage/logs/error.log');


//Developer modunda ise true internette yayında ise false
define('DEBUG',true);
error_reporting(E_ALL);

// Hata günlüğünü belirli bir dosyaya kaydetme



?>