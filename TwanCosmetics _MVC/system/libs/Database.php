<?php
    class Database extends PDO{

        public function __construct()
        {
            $connect ='mysql:dbname=twancosmetics_mvc; host=localhost';
            $user ='root';
            $pass ='';
            parent::__construct($connect, $user, $pass);
        }
    }
?>