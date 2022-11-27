<?php
    class login extends DController{
        //public $message;
        public $data =array();
        public function __construct()
        {
            parent::__construct();
        }
        public function index(){
            $this->login();
        }
        public function login(){
            session_start();
            if(isset ($_SESSION['login']) && $_SESSION['login']==true){
                header("Location:http://localhost:3000/index.php");
            }else{
                $this->load->view('login');
            }
        }
        public function authentication(){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $loginModel= $this->load->model('loginModel');
            $result =$loginModel->login($username, $password);
           // echo $count;
            
            if(isset($result[0]['password']) && $result[0]['password'] == $password){

                session_start();
                $_SESSION['username'] = $result[0]['username'];
                $_SESSION['userid'] = $result[0]['id'];
                $_SESSION['login'] = true;

                header("Location:http://localhost:3000/index.php");

            }else{

                $message ="Wrong Password/Username";
                //header("Location:http://localhost:3000/index.php?url=login");
                $this->load->view('login', $message);
                //$this->authentication();
            }
        
        }
        public function logout(){
            session_start();
            session_destroy();
            header("Location: http://localhost:3000/index.php");
        }
    }
?>