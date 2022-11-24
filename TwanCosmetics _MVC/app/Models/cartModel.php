<?php
    class cartModel{
        protected $conn;

        public function __construct()
        {
            session_start();

            $this->conn = new DModel();
            $this->conn = $this->conn->connectDB();    
        }
        public function showcart(){
            if(isset($_SESSION['login'])){
                $sql ="SELECT * FROM ";
            }
        }
    }
?>