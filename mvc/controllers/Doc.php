<?php
class Doc extends Controller{

    // public $PostModel;

    public function __construct(){
      
    } 
    function SayHi(){
        $this->view("masterDoc", [
            "page"=>"about"
        ]);
    }
    
    function Privacy(){
        $this->view("masterDoc", [
            "page"=>"privacy"
        ]);
    }

    function Copyright(){
        $this->view("masterDoc", [
            "page"=>"copyright"
        ]);
    }

    function Help(){
        $this->view("masterDoc", [
            "page"=>"help"
        ]);
    }
}
?>