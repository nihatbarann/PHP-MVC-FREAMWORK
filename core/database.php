<?php
defined('APP') or exit('Klasöre Erişim Yetkiniz yok');

 trait database{

   public function db_connect(){
            try {
                $db=NEW PDO("mysql:host=localhost;dbname=".DBNAME.";charset=utf8;",USERNAME,PASSWORD);
                return $db;
            } catch (PDOException $th) {
                Echo $th;
            }
    }
    public function read($query,$data=""){
        $db=$this->db_connect();
       $stm=$db->prepare($query);
         $stm->execute($data);
         $row=$stm->fetch(PDO::FETCH_ASSOC);    
        if($stm){
            return $row;
        }
        else{
            return false;
        }
    
    }

    public function allRead($query,$data=""){
        $db=$this->db_connect();
       $stm=$db->prepare($query);
         $stm->execute();
         $rows=$stm->fetchAll(PDO::FETCH_ASSOC);    
        if($stm){
            return $rows;
        }
        else{
            return false;
        }
        

    }
    public function write($query,$data){
        $db=$this->db_connect();
        $stm=$db->prepare($query);
         if($data != ""){
           $stm->execute($data);
         }
         else{
                return false;
         }
         if($stm){
            return true;
        }
         else{
             return false;
         }
         

    }
}


?>