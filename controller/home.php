<?php 
 class home extends Controller{
    use imageUpload;
    public function index(){
$this->view('home',"");
    }
}

?>