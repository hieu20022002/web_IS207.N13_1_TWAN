<?php
    class post extends DController{
        public function __construct()
        {
            echo 'This is postController';
        }
        public function chitietbaiviet($id, $slug){
            echo 'chi tiet bai viet';
            echo $id;
            echo $slug;
        }
    }
?>