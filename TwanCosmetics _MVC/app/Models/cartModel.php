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

        /*
        this function is used to delete data in table cart
        */
        public function deletecart($cartid){
            $result =$this->deletecartdetail($cartid);

            $sql = "DELETE FROM cart WHERE id='$cartid';";
            $statement =$this->conn->prepare($sql);
            $result= $statement->execute();
            return $result;
        }

        public function deletecartdetail($cartid){
            $sql = "DELETE FROM cartdetail WHERE cart_id='$cartid';";
            $statement =$this->conn->prepare($sql);
            return $statement->execute();
        }
    }
?>