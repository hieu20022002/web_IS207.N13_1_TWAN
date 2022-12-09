<?php
class productModel {
    protected $conn;
    public function __construct()
    {
        $model = new DModel();
        $this->conn = $model->connectDB();
    }
    public function showAllProduct(){
        $sql = "SELECT product.id as product_id, inventory.price, product.name, image.u_image
                FROM product, inventory, image 
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id 
                GROUP BY product.id;";
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function showAllProductPriceSort($condition){
        $sql = "SELECT product.id as product_id, inventory.price, product.name, image.u_image 
                FROM product, inventory, image 
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id 
                GROUP BY product.id ORDER BY price $condition;";
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function showProductPriceFromTo($priceFrom, $priceTo, $priceSort=NULL){
        $sql = "SELECT product.id as product_id, inventory.price, product.name, image.u_image 
                FROM product, inventory, image 
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id 
                AND (inventory.price BETWEEN $priceFrom AND $priceTo) 
                GROUP BY product.id";
        if($priceTo ==0){
            $sql="SELECT product.id as product_id, inventory.price, product.name, image.u_image 
                    FROM product, inventory, image 
                    WHERE product.id=inventory.product_id AND image.id=inventory.image_id 
                    AND (inventory.price >= $priceFrom) 
                    GROUP BY product.id";
        }

        if($priceSort!= NULL){
            $sql .= " ORDER BY price $priceSort;";
        }
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function showProductBrand($brand, $priceSort=NULL){
        $sql="SELECT product.id as product_id, inventory.price, product.name, image.u_image
                FROM product, inventory, image, brand 
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id AND product.brand_id=brand.id 
                        AND brand.name IN(";
        for($i=0; $i<count($brand); $i++){
            $sql .="'$brand[$i]'";
            if($i<count($brand)-1){
                $sql .=", ";
            }
        }
        $sql .=") GROUP BY product.id";

        if($priceSort !=NULL){
            $sql .= " ORDER BY price $priceSort;";
        }
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function showProduct_brand_price($brand, $priceFrom, $priceTo, $priceSort=NULL){
        $sql = "SELECT product.id as product_id, inventory.price, product.name, image.u_image 
                FROM product, inventory, image, brand
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id AND product.brand_id=brand.id 
                AND (inventory.price BETWEEN $priceFrom AND $priceTo) ";

        if($priceTo ==0){
            $sql="SELECT product.id as product_id, inventory.price, product.name, image.u_image 
                    FROM product, inventory, image, brand
                    WHERE product.id=inventory.product_id AND image.id=inventory.image_id AND product.brand_id=brand.id 
                    AND (inventory.price >= $priceFrom) ";
        }
        $sql .=" AND brand.name IN(";
        for($i=0; $i<count($brand); $i++){
            $sql .="'$brand[$i]'";
            if($i<count($brand)-1){
                $sql .=", ";
            }
        }
        $sql .=") GROUP BY product.id";

        if($priceSort !=NULL){
            $sql .= " ORDER BY price $priceSort;";
        }
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function showProduct_category($categoryID){
        $sql = "SELECT product.id as product_id, inventory.price, product.name, image.u_image
                FROM product, inventory, image, category
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id AND category.id=product.category_id AND category.id='$categoryID'
                GROUP BY product.id;";
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>