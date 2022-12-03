<?php
    class orderModel{
        protected $conn;
        public function __construct()
        {
            $model = new DModel();
            $this->conn= $model->connectDB();
        }
        public function changeInfo($cusname, $cusphone, $address, $ward, $district, $city){
            $user_id=  $_SESSION['userid'];
           
            $sql ="INSERT INTO address (user_id, Name, Phone, Region ,Ward, District, City) VALUES ('$user_id', '$cusname', '$cusphone' 
                                            ,'$address', '$ward', '$district', '$city')";
            $statement =$this->conn->prepare($sql);
            //$statement->execute();
            //$result= $statement->rowCount();
            $result =$statement->execute();
            return $result;
        }
        public function shownewaddress(){
            $user_id= $_SESSION['userid'];

            $sql= "SELECT * FROM address WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
            $statement = $this->conn->query($sql);
            $result =$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>