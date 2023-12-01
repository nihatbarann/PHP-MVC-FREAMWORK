<?php 
session_start();
ob_start();
//bu sayfadan gidildiğini doğrulamak için sabit oluşturuyoruz ve diğer dosyalara url üzerinden saldırıyı kontrol ediyoruz
Define('APP','FORUM');
//kullanılacak olan dosyaların dahil ediyoruz
require('core/init.php');

//Developer ortamında ise Debug true çalışır Product ortamında ise false kısmı çalışır
DEBUG ?  ini_set('display_errors', 1)&& ini_set('log_errors', 0):
ini_set('display_errors', 0)&&ini_set('log_errors', 1);


//Router kontrollerinin yapıldığı ve gerekli sayfanın çağırıldığı sınıfı oluituruyoruz.
$app=new App();


?>