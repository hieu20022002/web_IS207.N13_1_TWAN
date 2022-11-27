<?php
    class userModel{
        protected $conn;

        public function __construct()
        {
            session_start();

            $this->conn = new DModel();
            $this->conn = $this->conn->connectDB();
        }
        public function showUserInfo(){
            if(isset($_SESSION['login'])){
                $username = $_SESSION['username'];
                $sql = "SELECT * FROM user WHERE username ='$username'";
                $statement =$this->conn->query($sql);
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        }
        public function checkUpdate($newUserName, $newPhoneNumber){
            //session_start();
            $oldUserInfo =$this->showUserInfo();
            //
            if($newUserName != $oldUserInfo[0]['username']){
                $sql= "SELECT * FROM user WHERE username ='$newUserName'";
                $statement = $this->conn->query($sql);
                $count =$statement->rowCount();
                
                if($count >0){
                    return "Tên đăng nhập này đã được sử dụng";
                }
            }
            if($newPhoneNumber !=$oldUserInfo[0]['phoneNumber']){
                $sql= "SELECT * FROM user WHERE phoneNumber ='$newPhoneNumber'";
                $statement = $this->conn->query($sql);
                $count =$statement->rowCount();
                
                if($count >0){
                    return "Số điện thoại này đã được sử dụng";
                }
            }
            return "valid";
        }

        public function updateInfo($oldUserName, $newUserName, $newfullName, $newPhoneNumber, $newAddress, $newCity){
            $sql="UPDATE user SET username='$newUserName', fullname='$newfullName', phoneNumber='$newPhoneNumber', address='$newAddress', city='$newCity'
            WHERE username='$oldUserName'";
            $statement =$this->conn->prepare($sql);
            return $statement->execute();
        }
    }
?>