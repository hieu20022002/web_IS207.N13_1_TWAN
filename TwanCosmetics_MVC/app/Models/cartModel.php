<?php
    class cartModel{
        protected $conn;

        public function __construct()
        {
            //session_start();

            $this->conn = new DModel();
            $this->conn = $this->conn->connectDB();    
        }
        public function showcart($userid){
               
                $sql ="SELECT inventory.id as ivn_id,cart.id, product.name, inventory.price, cartdetail.quantity FROM cart, cartdetail, product, inventory WHERE cart.user_id ='$userid' 
                    AND cart.id=cartdetail.cart_id AND product.id = inventory.product_id AND cartdetail.inventory_id = inventory.id;";

                $statement =$this->conn->query($sql);
                $result =$statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            
        }
        public function updatecart($inventoryid, $quantity, $cartid){

            $sql ="UPDATE cartdetail SET quantity='$quantity' WHERE inventory_id='$inventoryid' AND cart_id='$cartid'";
            $statement =$this->conn->prepare($sql);
            return $statement->execute();
                
        }

        public function deleteproduct($inventoryid, $cartid){
            $sql= "DELETE FROM cartdetail WHERE cart_id='$cartid' AND inventory_id='$inventoryid'";
            $statement =$this->conn->prepare($sql);
            return $statement->execute();
        }
        public function order($userData, $cartData){
            //insert order 
            $total = $_SESSION['total'];
            $user_id=$userData[0]['id'];
            $name=$userData[0]['fullname'];
            $email= $userData[0]['email'];
            $address = $userData[0]['address'];

            $sql = "INSERT INTO `order` (user_id, name, email, address, phone, total, paid, created_at) VALUES ('$user_id', '$name', '$email'
                    ,'$address', '$userData[0]['phoneNumber']', '$total', 0, current_timestamp())";
            $statement= $this->conn->prepare($sql);
            $result= $statement->execute();

            //select oderID
            $sql ="SELECT * FROM `order` WHERE user_id='$userData[0]['id']' ORDER BY id DESC LIMIT 1;";
            $statement =$this->conn->query($sql);
            $orderData =$statement->fetchAll(PDO::FETCH_ASSOC);

            //insert oderdetail
            for($i =0; $i<count($cartData); $i++){
                $sql = "INSERT INTO orderdetail (order_id, inventory_id, quantity) VALUES ('$orderData[0]['id']', '$cartData[$i]['ivn_id']', '$cartData[$i]['quantity']')";
                $statement= $this->conn->prepare($sql);
                $result= $statement->execute();
            }
            return $result;
        }
    }
?>