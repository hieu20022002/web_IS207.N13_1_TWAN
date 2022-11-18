<?php
    class index extends DController{
        public function __construct()
        {
            parent::__construct();
        }
        public function homepage(){
            $this->load->model('home');
            $this->load->view('home');
        }
    }
?>