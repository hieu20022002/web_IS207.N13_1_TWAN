<?php
    //include_once './system/libs/DModel.php';
    
    class home1Model{
        public function __construct()
        {
            echo 'this is home1Model';
        }
        public function category(){
            $conn = new DModel();
            $conn = $conn->connectDB();
            
            $sql ="SELECT * FROM product";
            $statement = $conn->query($sql);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>