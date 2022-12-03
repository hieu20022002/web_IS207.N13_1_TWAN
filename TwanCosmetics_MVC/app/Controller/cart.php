<?php
    class cart extends DController{
        public function __construct()
        {
            session_start();

            parent::__construct();
        }
        public function index(){
            $this->showcart();
        }
        public function showcart(){
            if(isset($_SESSION['login'])){
                $cartModel = $this->load->model('cartModel');
                $userid =$_SESSION['userid'];
                $dataCart =$cartModel->showcart($userid);
                if(isset($dataCart[0]['ivn_id'])){
                    $_SESSION['cartid'] = $dataCart[0]['id'];
                    $this->load->view('cartView', $dataCart);
                }
             
                $this->load->view('cartView');
            }else{
                $this->load->view('cartView');
            }
        
        }
        public function updatecart($invid, $quantity){
            $cartModel = $this->load->model('cartModel');
            
                $cartid =$_SESSION['cartid'];
                $dataCart =$cartModel->updatecart($invid, $quantity, $cartid);
                if($dataCart ==1){
                    global $BASE_URL;
                    header("Location:$BASE_URL?url=cart");
                    //header("Location:http://localhost:3000/index.php?url=cart");

                }

            
        }

        public function deleteproduct($invnid){

                $cartModel =$this->load->model('cartModel');
                $cartid =$_SESSION['cartid'];
                $result =$cartModel->deleteproduct($invnid, $cartid);
                if($result ==1){
                    global $BASE_URL;
                    header("Location:$BASE_URL?url=cart");

                }
        }

        public function order(){
            global $BASE_URL;
            header("Location:$BASE_URL?url=order");
        }
    }
?>