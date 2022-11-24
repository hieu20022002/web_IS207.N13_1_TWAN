<?php
    class categoryModel extends DModel{
        public function __construct()
        {
            echo 'php';
        }
        public function categorybyid($table, $id){
            $sql="select * from  product where id=:$id";
            $data = array(':id' => $id);
            return $this->db->select($sql,$data);
        }
    }
?>