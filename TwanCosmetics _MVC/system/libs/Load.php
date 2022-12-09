<?php
class Load{
    public function __construct(){
    }
    public function view($filename, $data=NULL, $data2=NULL, $data3=NULL, $data4=NULL){    
        include './app/Views/'.$filename.'.php';
       
    }
    public function model($filename){
        include './app/Models/'.$filename.'.php';
        return new $filename();
    }
}
?>