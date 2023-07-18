<?php
defined('APP') or exit('Klasöre Erişim Yetkiniz yok');

    function showArray($stuff){
        echo "<pre>";
        print_r($stuff);
        echo "</pre>";
    }

    function post($post){
    if(isset($_POST[$post]))
     {
        return $_POST[$post] ;
     }
      else{
        return null;
     } 

    }
    function get($get){
        if(isset($_GET[$get]))
         {
            return $_GET[$get] ;
         }
          else{
            return null;
         } 
    }
        
    function redirect($path){

     header("Location:".ROOT.$path);
     die;

    }


    function setSession($key,$value){
      $_SESSION[$key]=$value;
      if(isset($_SESSION[$key])){
            return true;
      }
    }
    function getSession($key){
      if(isset($_SESSION[$key])){
      return $_SESSION[$key];
      }
      else{
         return false;
      }
    }

    function alertMessage($msg,$type){
          return "<div class='alert alert-$type' role='alert'>".$msg."</div>";
   }

    function removeFile($filename,$folder=ROOT."/assets/images/"){

         if(file_exists($folder.$filename)){

            unlink($folder.$filename);
            echo "Dosya başarı ile silindi";
            return true;
         }
         else {
           Echo "Dosya bulunamadı";
            return false;

         }
    }
        














?>