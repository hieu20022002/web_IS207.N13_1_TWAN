<?php
    include_once '../Php/Connect.php';
    if(isset($_POST['loginBtn'])){
        //include './ConnectDB/Connect.php';
        if(empty($_POST['username'])){
            echo "<script type = 'text/javascript'>alert('Bạn chưa nhập tên đăng nhập');</script>";   
        }
        elseif(empty($_POST['password'])){
            echo "<script type = 'text/javascript'>alert('Bạn chưa nhập mật khẩu');</script>";   
        }
        else {
            $sql = "SELECT * FROM user";
            $result = $con->query($sql);
            
            $dbUserName;
            $dbPassword;
            $flag =0;
            if($result->num_rows >0){
                while($row =$result->fetch_assoc()){
                    $dbUserName =$row["username"];
                    $dbPassword = $row["password"];

                    if($_POST['username'] == $dbUserName && $_POST['password'] == $dbPassword){
                        echo "You loggin!";
                        $flag =1;
                        break;
                    }
                }
                if($flag ==0){
                    echo "Wrong Password/Username";
                }
            }
            $con->close();   
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../Css/DangNhap.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">

</head>
<body>
    <div class="flex-container">
        <div class="flex-item-left">
            <img src="..\Images\T_W_A_N-removebg-preview.png"/>
        </div>
        <div >
            <form class="flex-item-right" method ="POST" >
                <p>
                    <span class="dangnhap">Đăng nhập</span>
                </p>
                <input type="text" id="tendn" name="username" class="input" placeholder="Tên đăng nhập" />
                <p>
                    <input type="password" id="matkhau" name="password" class="input" placeholder="Mật khẩu" />
                </p>
                <button class="btdangnhap" name ="loginBtn" value ="Login">Đăng nhập</button>
                <p style="text-align:center">
                    <a href="#quenmatkhau" class="quenmk">Quên mật khẩu? </a>
                </p>
                <button class="bttaotk">Tạo tài khoản mới </button>
            </form>
            
        </div>
    </div>
  
</body>
</html>