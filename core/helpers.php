<?php
defined('APP') or exit('Klasöre Erişim Yetkiniz yok');


function seo($title)
{
    // Türkçe karakterleri değiştir
    $search = array('Ç', 'İ', 'I', 'Ğ', 'Ü', 'Ş', 'Ö', 'ç', 'ı', 'ğ', 'ü', 'ş', 'ö', ' ');
    $replace = array('c', 'i', 'i', 'g', 'u', 's', 'o', 'c', 'i', 'g', 'u', 's', 'o', '-');
    $title = str_replace($search, $replace, $title);

    // Alfanümerik ve - harici karakterleri kaldır
    $title = preg_replace("/[^a-zA-Z0-9\-]/", '', $title);

    // Birden fazla - karakterini tek bir - ile değiştir
    $title = preg_replace('/-+/', '-', $title);

    // Başında ve sonunda - karakterini kaldır
    $title = trim($title, '-');

    // Tüm harfleri küçük harf yap
    $title = strtolower($title);

    // URL'yi döndür
    return $title;
}




    function showArray($stuff){
        echo "<pre>";
        print_r($stuff);
        echo "</pre>";
    }

    function post($post){

    if(isset($_POST[$post])){
      $return=trim($_POST[$post]);
      $return=htmlspecialchars($return);
      return $return;
    }
     else
     { return null;

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