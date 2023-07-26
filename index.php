<?php 
session_start();
ob_start();
Define('APP','FORUM');
require('core/init.php');

DEBUG ?  ini_set('display_errors', 1) :  ini_set('display_errors', 0);

$app=new App();


?>