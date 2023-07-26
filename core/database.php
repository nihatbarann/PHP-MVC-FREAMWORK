<?php
defined('APP') or exit('Klasöre Erişim Yetkiniz yok');

 class Database{
   protected $db;
  
   public function __construct(){
          $this->connect();
    }

    public function __destruct(){
        $this->db=null;
}

 private function connect(){
    try {
        $this->db=NEW PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8;",USERNAME,PASSWORD);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $th) {
        die( $th->getMessage());
    }

}

    public function read($query,$data=""){
      
       $stm=$this->db->prepare($query);
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
       $stm=$this->db->prepare($query);
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
        $stm=$this->db->prepare($query);
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


    public function getRowCount($query,$data=[]){

        $stm=$this->db->prepare($query);
        $stm->execute($data);
       if($stm){
           return $stm->rowCount();
       }
       else{
           return false;
       }

    }
}


?>