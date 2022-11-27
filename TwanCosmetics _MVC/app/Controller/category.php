<?php
//include_once './system/libs/DController.php';
    class category extends DController{
        public function __construct()
        {
            //echo 'category controller';
        }
        public function categorybyid(){
            $categoryModel = new Load();
            $categoryModel= $categoryModel->model('categoryModel');
            $table='product';
            $id=1000002;
            $data['categorybyid'] =  $categoryModel->categorybyid($table, $id);
            $this->load->view('categoryid', $data);
        }

        public function categorybyid2(){
            echo '123';
            //$this->load->model('home');
        }
    }
?>