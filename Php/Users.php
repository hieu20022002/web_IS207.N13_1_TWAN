<?php
Class Users {
    public function __construct(){

    }
    public function __destruct(){

    }
    public function Register($fullname,$gender,$email,$phoneNumber,$address,$city,$username,$password){
        include "dbconn.php";
        $password = md5($password);
        $query = "INSERT INTO `user`(`fullname`,`gender`,`email`,`phoneNumber`,`address`,`city`,`username`,`password`,`role_id`) 
            VALUES (:fullname,:gender,:email,:phoneNumber,:address,:city,:username,:password,11)";
        $stmt = $db->prepare($query);
        $stmt->execute(
            array(
                ':fullname' => $fullname,
                ':gender' => $gender,
                ':email' => $email,
                ':phoneNumber' => $phoneNumber,
                ':address' => $address,
                ':city' => $city,
                ':username' => $username,
                ':password' => $password
            )
        );
        $last_id = $db->lastInsertId();
        if(isset($last_id) && !empty($last_id)):
            return true;
        else:
            return false;
        endif;

    }
}
?>