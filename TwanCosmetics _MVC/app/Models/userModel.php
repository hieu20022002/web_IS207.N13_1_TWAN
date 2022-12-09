<?php
    class userModel{
        protected $conn;

        public function __construct()
        {
            //session_start();

            $this->conn = new DModel();
            $this->conn = $this->conn->connectDB();
        }
        public function showUserInfo($userid){
                
                $sql = "SELECT * FROM user, address WHERE user.id= address.user_id AND user.id='$userid' ORDER BY address.id ASC LIMIT 1;";
                $statement =$this->conn->query($sql);
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            
        }
        public function checkUpdate($userid, $newUserName, $newPhoneNumber){
            //session_start();
            $oldUserInfo =$this->showUserInfo($userid);
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

        public function updateInfo($userid, $newUserName, $newfullName, $newPhoneNumber, $newRegion, $newWard, $newDistrict, $newCity){
            $sql="UPDATE user, address address SET username='$newUserName', fullname='$newfullName', phoneNumber='$newPhoneNumber', Region='$newRegion', Ward='$newWard'
                        , District='$newDistrict', City= '$newCity' WHERE user.id= address.user_id AND user.id='$userid' ORDER BY address.id ASC LIMIT 1;";
            $statement =$this->conn->prepare($sql);
            return $statement->execute();
        }
    }
?>