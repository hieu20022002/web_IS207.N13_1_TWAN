<?php
    class cart extends DController{
        public function __construct()
        {
            parent::__construct();
        }
        public function index(){
            $this->showcart();
        }
        public function showcart(){
            $cartModel = $this->load->model('cartModel');
            
            $this->load->view('cartView');

        }
    }
?>