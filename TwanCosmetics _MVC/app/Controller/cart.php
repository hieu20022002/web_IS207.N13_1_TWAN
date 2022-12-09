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
                /*
                Unset session voucher và newtotal khi quay trở về từ trang order-> cart
                */
                unset($_SESSION['newTotal']); 
                unset($_SESSION['voucherID']); 


                $cartModel = $this->load->model('cartModel');
                $userid =$_SESSION['userid'];
                $dataCart =$cartModel->showcart($userid);
                if(isset($dataCart[0]['ivn_id'])){
                    $_SESSION['cartid'] = $dataCart[0]['id'];
                    $this->load->view('cartView', $dataCart);
                }
                else{
                    $this->load->view('cartView');
                }
            }
            else{
                $this->load->view('cartView');
            }
        
        }
        public function updatecart($invid, $quantity){
            if(isset($_SESSION['cartid'])){
                $cartModel = $this->load->model('cartModel');
            
                $cartid =$_SESSION['cartid'];
                $dataCart =$cartModel->updatecart($invid, $quantity, $cartid);
                if($dataCart ==1){
                    global $BASE_URL;
                    header("Location:$BASE_URL?url=cart");
                    //header("Location:http://localhost:3000/index.php?url=cart");
                }            
            }
            else{
                global $BASE_URL;
                header("Location:$BASE_URL?url=index/notFound");
            }
        }

        public function deleteproduct($invnid){

            if(isset($_SESSION['cartid'])){
                $cartModel =$this->load->model('cartModel');
                $cartid =$_SESSION['cartid'];
                $result =$cartModel->deleteproduct($invnid, $cartid);
                if($result ==1){
                    global $BASE_URL;
                    header("Location:$BASE_URL?url=cart");
                }
            }
            else{
                global $BASE_URL;
                header("Location:$BASE_URL?url=index/notFound");
            }  
        }

        public function order(){
            global $BASE_URL;
            header("Location:$BASE_URL?url=order");
        }


        /*
        this function is called when all data in table cart is inserted into table `order` and `orderdetail`
            So we dont need table `cart` and `cartdetail` anymore
        */
        public function deletecart(){
            global $BASE_URL;

            if(isset($_SESSION['cartid'])){
                $cartModel = $this->load->model('cartModel');
                $result = $cartModel->deletecart($_SESSION['cartid']);
                if($result ==1){
                    unset($_SESSION['cartid']);
                    unset($_SESSION['oldTotal']);

                    header("Location:$BASE_URL");
                }
            }
            else{
                header("Location:$BASE_URL?url=index/notFound");
            }
        }
    }
?>