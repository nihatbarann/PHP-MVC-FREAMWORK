<?php 

 class home extends Controller{
    use database;
    
    function index(){

        $this->view('home');


    }
}

?>