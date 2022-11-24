<?php
  $servername = "localhost";
  $username = "root";
  $password = "";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=twancosmetics_mvc", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
  } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
  }
  //include_once './system/libs/DModel.php';
  //global $conn;
  $sql ="SELECT * FROM product";
  $statement = $conn->query($sql);
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $key){
    echo $key['name'].'<br>';
  };
?>