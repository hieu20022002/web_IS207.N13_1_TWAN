
<?php
if(isset($data[0]['checkmsg'])){
    $msg =$data[0]['checkmsg'];
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
/*
 if(isset($data[0]['checkmsg'])){
    $msg =$data[0]['checkmsg'];    
    echo "<script type='text/javascript'>alert('".$msg."');</script>";
}
    */

//session_start();
/*
function checkEmpty(){
    if(empty($_POST['newUserName'])){
        echo "<script type = 'text/javascript'>alert('Bạn chưa nhập tên đăng nhập');</script>";   
        return false;
    }
    elseif(empty($_POST['newFullname'])){
        echo "<script type = 'text/javascript'>alert('Bạn chưa nhập họ tên!');</script>";
        return false;
    }
    elseif(empty($_POST['newPhoneNumber'])){
        echo "<script type = 'text/javascript'>alert('Bạn chưa nhập Số điện thoại!');</script>";
        return false;
    }
    elseif(empty($_POST['newAddress'])){
        echo "<script type = 'text/javascript'>alert('Bạn chưa nhập Địa chỉ!');</script>";
        return false;

    }
    elseif(empty($_POST['newCity'])){
        echo "<script type = 'text/javascript'>alert('Bạn chưa nhập Tỉnh/ thành phố!)';</script>";
        return false;
    }
    return true;
}
if(isset($_POST['UpdateBtn'])){
    $_SESSION['checkEmpty'] = checkEmpty();
}
*/
/*
    LOAD DỮ LIỆU CỦA USER TỪ DB

    session_start();
    include '../Php/Connect.php';
    
    $sql ="SELECT * FROM user WHERE username ='".$_SESSION['username']."'";
    $result = $con->query($sql);

    //$username;
    $oldFfullname; 
    $oldAddress; 
    $oldCity;
    $oldPhonenumber ='';
    $oldGender;
    
    if($result->num_rows >0){
        while($row =$result->fetch_assoc()){
            //$username = $row["username"];
            $oldFfullname = $row["fullname"];
            $oldPhonenumber = $row["phoneNumber"];
            $oldAddress  = $row["address"];
            $oldCity = $row["city"];
            if($row["gender"] == 1 ){
                $oldGender = 'Nam';
            }
            else{
                $oldGender ='Nu';
            }
            
            }
        }
    //$con->close();


/*
        CẬP NHẬT DỮ LIỆU CỦA USER

    $check=0;
    if(isset($_POST['updateBtn'])){
        $newUsername = $_POST['tendn'];
        $newFullname = $_POST['hoten'];
        $newPhonenumber =$_POST['sdt'];
        $newAddress =$_POST['diachi'];
        $newCity = $_POST['tinh'];
        $newGender;
        if($_POST['gioitinh'] == 'Nam'){
            $newGender =1;
        }
        else{
            $newGender =0;
        }
        $dbUsername ='liemqt';
        //echo $newGender;

        checkEmpty();
        checkAvaliable($newUsername, $newFullname, $newPhonenumber, $newAddress, $newCity);
        if($check ==0){
            
            include '../Php/Connect.php';
            $sql ="UPDATE user SET username ='".$newUsername."', fullname ='".$newFullname."', phoneNumber ='".$newPhonenumber."', address ='".$newAddress."', city ='".$newCity."', gender =".$newGender." WHERE username ='".$_SESSION['username']."';";
            if($con->query($sql) == TRUE){
                echo "<script type = 'text/javascript'>alert('Cập nhật thông tin thành công!');</script>";
                $_SESSION['username'] = $newUsername;   
            }
            else{
                echo "update fail".$con->error;
            }
            
        }
        $con->close(); 
    }
    
    function checkAvaliable($newUsername, $newFullname, $newPhonenumber, $newAddress, $newCity){
        include '../Php/Connect.php';
        

        // check username có trong db hay chưa
        $sql ="SELECT * FROM user WHERE username ='".$newUsername."'";
        $result = $con->query($sql);
        if($result->num_rows >0){
            if($newUsername == $_SESSION['username']){
                //return;
            }
            else{
                echo "<script type = 'text/javascript'>alert('Tên đăng nhập đã được sử dụng!');</script>"; 
                global $check;
                $check =1;
                
                //$con->close();  
                //return;
            }
            
        }

        //check sdt có trong db hay chưa
        $sql ="SELECT * FROM user WHERE phoneNumber ='".$newPhonenumber."'";
        $result = $con->query($sql);
        if($result->num_rows >0){
            global $oldPhonenumber;
            if($oldPhonenumber == $newPhonenumber){
                //echo $oldPhonenumber;
                //echo $newPhonenumber;
                //return;
            }
            else{
                echo "<script type = 'text/javascript'>alert('Số điện thoại đã được sử dụng!');</script>"; 
                global $check;
                $check =1;
                
                //$con->close();  
                //return ;
            }
        }     
    }
    
    //Function kiểm tra user có nhập thiếu trường nào hay không
    

    }
*/

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Thông tin tài khoản</title>
    <link rel="stylesheet" href="/app/Views/Css/InfoManagement.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    <a href="<?php global $BASE_URL; echo $BASE_URL; ?>"><img class="logo" src="/Images/Logo.svg"></a>
    <div class="heading1">
        CỬA HÀNG TRỰC TUYẾN 24/7 - GIAO HÀNG NHANH CHÓNG
    </div>
    <div class="thanhtimkiem">
        <input class="timkiemsp" type="text" id="mySearch" onkeyup="myFunction()" placeholder="Tìm kiếm sản phẩm" title="Type in a category" />
        <button type="button" class="material-symbols-outlined" id="icon-search">
            search
        </button>
    </div>
    <div class="icon2">
        <button class="material-symbols-outlined" id="icon">
            shopping_cart
        </button>
        <div class="accountBtn">
        <button class="material-symbols-outlined" name ="loginBtn" id="icon">
            account_circle
            <div class="dropdown-content" id="content" <?php if (empty($_SESSION['username'])) echo "style ='display: none';" ?>>
                <a href="#">Thay đổi thông tin</a>
                <a href="#">Đơn hàng</a>
                <a href="http://localhost:3000/index.php?url=login/logout">Đăng xuất</a>
            </div>
        </div>      
        </button>
    </div>
    </div>
    
    <?php include_once './system/libs/nav.php'; ?>
    <div class="frame">
        Trang chủ/Thông tin tài khoản
    </div>
    <div class="frame2">
        <div class="frame21">
            <p class="txtTaikhoan">Tài khoản của tôi </p>
            <hr />
            <form class ="userInfor" action ="http://localhost:3000/index.php?url=user/updateinfo" method ="POST" style="overflow-x: auto;">
                <table>
                    <tr>
                        <td>
                            <label>Tên đăng nhập</label>
                        </td>
                        <td>
                            <input type="text" id="tendn" name="newUserName" class="input" <?php if(isset($_SESSION['login'])){echo "value ='".$data[0]['username']."'";} ?> />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Họ và tên</label>
                        </td>
                        <td>
                            <input type="text" id="hoten" name="newFullname" class="input"<?php if(isset($_SESSION['login'])){echo "value ='".$data[0]['fullname']."'";} ?> />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Số điện thoại</label>
                        </td>
                        <td>
                            <input type="tel" id="sdt" name="newPhoneNumber" class="input" <?php if(isset($_SESSION['login'])){echo "value ='".$data[0]['phoneNumber']."'";} ?>/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Giới tính</label>
                        </td>
                        <td>
                            <label for="nam">Nam</label>
                            <input type="radio" id="nam" name="gioitinh" value="1" class="radio" />
                            <label for="nu">Nữ</label>
                            <input type="radio" id="nu" name="gioitinh" value="0" class="radio" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tỉnh/Thành phố</label>
                        </td>
                        <td>
                            <select class="input" id="city" name="city" aria-label=".form-select-sm">
                            <option value="" selected >Chọn tỉnh thành</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Quận/Huyện</label>
                        </td>
                        <td>
                            <select class="input" id="district" name="district" aria-label=".form-select-sm">  
                            <option value="" selected>Chọn quận huyện</option>      
                            </select>                          
                        </td>
                    </tr>
                    <tr>
                        <td> <label>  Phường/Xã </label></td> 
                        <td>
                            <select class="input" id="ward" name="ward" aria-label=".form-select-sm">
                                <option value="" selected>Chọn phường xã</option>
                            </select>
                        </td>       
                    </tr>
                    <tr>
                        <td>
                            <label>Địa chỉ</label>
                        </td>
                        <td>
                            <input type="text" id="diachi" name="newAddress" class="input" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="button-capnhat" name= "updateBtn" onclick="return confirm('Xác nhận cập nhật')">Cập nhật</button>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </div>
    <a href="<?php global $BASE_URL; echo $BASE_URL; ?>"><img class="logo2" src="/Images/Logo.svg"> </a>
    
    <?php include_once './system/libs/footer.php' ?>
    <script>
       var gender = "<?php echo $data[0]['gender']; ?>";
        if(gender ==0){
            radiobtn = document.getElementById("nu");
            radiobtn.checked = true;
        }
        else{
            radiobtn = document.getElementById("nam");
            radiobtn.checked = true;
        }
    </script>
</body>
</html>


<td>
                            <label>Địa chỉ</label>
                        </td>
                        <td>
                            <input type="text" id="diachi" name="newAddress" class="input" <?php if(isset($_SESSION['login'])){echo "value ='".$data[0]['address']."'";} ?>/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tỉnh/Thành phố</label>
                        </td>
                        <td>
                            <input type="text" id="tinh" name="newCity" class="input" <?php if(isset($_SESSION['login'])){echo "value ='".$data[0]['city']."'";} ?> />
                        </td>
                    </tr>