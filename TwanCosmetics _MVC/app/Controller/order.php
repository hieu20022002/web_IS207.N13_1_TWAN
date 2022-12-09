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
            else{
                global $BASE_URL;
                header("Location:$BASE_URL?url=index/notFound");
            }
           
        }
        public function showorder($msg=NULL){
            if(!isset($_SESSION['cartid'])){
                global $BASE_URL;
                header("Location:$BASE_URL?url=index/notFound");

            }
            else{
                $cartModel = $this->load->model('cartModel');
                $dataCart = $cartModel->showcart($_SESSION['userid']);
                
                $orderModel = $this->load->model('orderModel');
                $newAddress = $orderModel->shownewaddress();
                if($msg !=NULL){
                    //echo $msg;
                    $dataCart[0]['msg'] = $msg;
                    //echo $dataCart[0]['msg'];
    
                }
                $this->load->view('Order',$dataCart, $newAddress);
            }
           
            
        }

        public function changeinfoorder(){
            if(!isset($_SESSION['cartid'])){
                global $BASE_URL;
                header("Location:$BASE_URL?url=index/notFound");

            }
            else{
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
           
        }
        public function addorder(){
            if(!isset($_SESSION['cartid'])){
                global $BASE_URL;
                header("Location:$BASE_URL?url=index/notFound");
            }
            else{
                /*
                Load address
                */
                $orderModel=$this->load->model('orderModel');
                $address =$orderModel->shownewaddress();

                /*
                Load product in cart
                */
                $cartModel =$this->load->model('cartModel');
                $cartData =$cartModel->showcart($_SESSION['userid']);

                if(isset($_SESSION['newTotal'])){
                    $total = $_SESSION['newTotal'];
                    $voucherID = $_SESSION['voucherID'];
                }
                else{
                    $total = $_SESSION['oldTotal'];
                    $voucherID =NULL;
                }
                $result = $orderModel->addorder($cartData, $address, $total, $voucherID);                
                if($result ==1){
                    global $BASE_URL;
                    header("Location:$BASE_URL?url=cart/deletecart");
                }          
            }
        }

        public function discount(){
            if(!isset($_SESSION['cartid'])){
                global $BASE_URL;
                header("Location:$BASE_URL?url=index/notFound");

            }
            else{
                if(isset($_POST['discountBtn'])){
                    if(!empty($_POST['voucher'])){
                        $voucherModel =$this->load->model('voucherModel');
                        $result =$voucherModel->findVoucher($_POST['voucher']);
                        $_SESSION['voucherID'] = $result[0]['id'];
                        /*
                        Xử lý datetime của voucher với today
                        */
                        $voucherDate = strtotime($result[0]['exp']);
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $today= date("Y-m-d h:i:sa" );
                        $today =strtotime($today);
                        
                        if($result[0]['remain'] <=0){
                            $this->showorder('Voucher này đã hết lượt sử dùng rồi!');
                        }
                        elseif($_SESSION['oldTotal'] < $result[0]['min_bill']){
                            $this->showorder('Đơn hàng của bạn không đủ giá trị tối thiểu để sử dụng Voucher này!');

                        }
                        elseif($voucherDate <$today){
                            $this->showorder('Voucher này đã hết thời hạn sử dụng!');
                        }
                        else{
                            $_SESSION['newTotal'] =$_SESSION['oldTotal'] -($_SESSION['oldTotal'] * $result[0]['discount_percentage']/100);
                            header("Location:$BASE_URL?url=order");
                        }
                                               
                    }
                    else{
                        global $BASE_URL;
                        header("Location:$BASE_URL?url=order");
                    }
                }
            }
            
        }
    }    
?>