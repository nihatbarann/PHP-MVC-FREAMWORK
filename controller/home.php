<?php 
defined('APP') or exit('Klasöre Erişim Yetkiniz yok');

 class home extends Controller{
    public function index(){
            $this->view('home',"");
    }

}

?>