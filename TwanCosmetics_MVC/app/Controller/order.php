<?php

use LDAP\Result;

    class order extends DController{
        //public $message;
        public $data =array();
        public function __construct()
        {
            session_start();
            parent::__construct();
        }
        public function index(){
            if(isset($_SESSION['login'])){
                $this->showorder();
            }
            global $BASE_URL;
            header("Location:$BASE_URL?url=index/notFound");
        }
        public function showorder(){
            $cartModel = $this->load->model('cartModel');
            $dataCart = $cartModel->showcart($_SESSION['userid']);
            
            $orderModel = $this->load->model('orderModel');
            $newAddress = $orderModel->shownewaddress();

            $this->load->view('Order',$dataCart, $newAddress);    
            
        }

        public function changeinfoorder(){
            $message='';
            if(empty($_POST['cusname'])){
                $message= "Bạn chưa nhập tên";
            }
            elseif(empty($_POST['cusphone'])){
                $message ="Bạn chưa nhập SDT";
            }
            elseif(empty($_POST['cusaddress'])){
                $message ="Bạn chưa nhập Địa chỉ";
            }
            elseif(empty($_POST['city'])){
                $message ="Bạn chưa chọn tỉnh";
            }
            elseif(empty($_POST['district'])){
                $message ="Bạn chưa chọn huyện";
            }
            elseif(empty($_POST['ward'])){
                $message ="Bạn chưa chọn Xã";
            }

            if($message ==''){
                $orderModel = $this->load->model('orderModel');
                $result=$orderModel->changeInfo($_POST['cusname'], $_POST['cusphone'], $_POST['cusaddress'],
                                                $_POST['ward'], $_POST['district'], $_POST['city']);
                if($result ==1){
                    global $BASE_URL;
                   header("Location:$BASE_URL?url=order");
                }
            }else{
                $this->load->view('InfoOrder', $message);
            }
        }
        public function addorder(){
            //echo 'fsfsdf';
            $userModel = $this->load->model('userModel');
            $userData =$userModel->showUserInfo($_SESSION['username']);

            $cartModel =$this->load->model('cartModel');
            $cartData =$cartModel->showcart($_SESSION['userid']);
            if(isset($_POST['btnDatHang']) && isset($cartData) && isset($_SESSION['login'])){
                // inseer order table
                $result = $cartModel->order($userData, $cartData);
                if($result ==1){
                    global $BASE_URL;

                    header("Location:$BASE_URL");
                }else{
                    header("Location:$BASE_URL?url=index/notFound");
                }
            }
        }
        public function abc(){
            include './app/Views/Order.php';
            global $abcd;
            echo $abcd;
        }
    }    
?>