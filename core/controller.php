<?php

class Controller{
public function view($page,$data=[]){
            if(file_exists(ROOT."/view/".$page.".view.php")){
                return require(ROOT."/view/".$page.".view.php"); 
            }
            else{
                return require(ROOT."/view/404.php"); 
            }
}
public function loadModel($model){
            if(file_exists(ROOT."/model/".$model.".model.php")){
            
            $model = new $model();
            return $model;
            }
            return false;
            }
}


?>