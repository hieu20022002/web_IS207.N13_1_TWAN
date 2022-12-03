<?php
    class user extends DController{
        public function __construct()
        {   
            session_start();
            parent::__construct();
        }
        public function infomanagement(){
            if(isset($_SESSION['login'])){
                $userModel = $this->load->model('userModel');  
                $userInfo = $userModel->showUserInfo( $_SESSION['username']);
                $this->load->view('InfoManagement', $userInfo);
            }else{
                $this->load->view('InfoManagement');

            }
           

        }
        public function updateinfo(){
            //session_start();
            $checkEmpty ='';
            $checkValid ='';

            $userModel = $this->load->model('userModel');
           
                $checkValid = $userModel->checkUpdate($_SESSION['username'], $_POST['newUserName'], $_POST['newPhoneNumber']);
                if(empty($_POST['newUserName'])){
                    $checkEmpty= "Bạn chưa nhập tên đăng nhập";   
                }
                elseif(empty($_POST['newFullname'])){
                    $checkEmpty= 'Bạn chưa nhập họ tên!';
    
                }
                elseif(empty($_POST['newPhoneNumber'])){
                    $checkEmpty= "Bạn chưa nhập Số điện thoại!";
                }
                elseif(empty($_POST['newAddress'])){
                    $checkEmpty= "Bạn chưa nhập Địa chỉ!";
            
                }
                elseif(empty($_POST['newCity'])){
                    $checkEmpty= "Bạn chưa nhập Tỉnh/ thành phố!";
                }
            
            $userInfo = $userModel->showUserInfo();
            
            if($checkEmpty == '' && $checkValid =='valid'){
                $result =$userModel->updateinfo($_SESSION['username'], $_POST['newUserName'], $_POST['newFullname'], $_POST['newPhoneNumber'], $_POST['newAddress'], $_POST['newCity']);
                if($result ==1){
                    header("Location:http://localhost:3000/index.php?url=login/logout");
                }
            }
            elseif($checkEmpty !='' && $checkValid =='valid'){
                $userInfo[0]['checkmsg'] =$checkEmpty;
                $this->load->view('InfoManagement', $userInfo);
            }
            elseif($checkEmpty =='' && $checkValid !='valid'){
                $userInfo[0]['checkmsg'] = $checkValid;
                $this->load->view('InfoManagement', $userInfo);
            }
            elseif($checkEmpty !='' && $checkValid !='valid'){
                $userInfo[0]['checkmsg'] =$checkEmpty;
                $this->load->view('InfoManagement', $userInfo);
            }
    }
}
?>