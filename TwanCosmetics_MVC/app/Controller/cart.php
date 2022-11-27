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
            $dataCart =$cartModel->showcart();
            $_SESSION['cartid'] = $dataCart[0]['id'];
            $this->load->view('cartView', $dataCart);
            $cartModel ==NULL;
        }
        public function updatecart($invid, $quantity){
            $cartModel = $this->load->model('cartModel');
            if(isset($_SESSION['login'])){
            
                $cartid =$_SESSION['cartid'];
                $dataCart =$cartModel->updatecart($invid, $quantity, $cartid);
                if($dataCart ==1){
                    //$cartModel ==NULL;

                    //global $ca
                    //$cartModel =NULL;
                    header("Location:http://localhost:3000/index.php?url=cart");

                }

            }
        }

        public function deleteproduct($invnid){
            $cartModel =$this->load->model('cartModel');
            if(isset($_SESSION['login'])){
            
                $cartid =$_SESSION['cartid'];
                $result =$cartModel->deleteproduct($invnid, $cartid);
                if($result ==1){
                    header("Location:http://localhost:3000/index.php?url=cart");

                }

            }
        }
    }
?>