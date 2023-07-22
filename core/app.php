<?php
defined('APP') or exit('Klasöre Erişim Yetkiniz yok');

class app{

    private $class="home";
    private $method="index";
    private $param=[];

   public function __construct(){
        $url=$this->splitUrl();
       
        if(file_exists(ROOT."/controller/$url[0].php")){    
                    $this->class=$url[0];
                    unset($url[0]);
                }
                else{
                  require(ROOT."/view/404.php");
                  exit;
                }
             
       require (ROOT."/controller/$this->class.php");
        $this->class = new $this->class;
        if(isset($url[1])){

                    if(method_exists($this->class,$url[1])){
                            $this->method=$url[1];
                            unset($url[1]);
                    }
                    else{
                      require(ROOT."/view/404.php");
                      exit;
                    }   
        }
       
          if(is_array($url)){
            $this->param=(array_values($url));
          } 
        call_user_func_array([$this->class,$this->method],$this->param);

    }
function splitUrl(){

    if(isset($_GET['url'])){
        $url=explode("/",trim($_GET['url'],"/"));
    
        return $url;
        }
    else {
           return ['home'];
        }
}
}
?>