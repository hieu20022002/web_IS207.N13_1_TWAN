
<?php
    include_once '../Php/Connect.php';
    $dbUsername ='liemqt';
    $sql ="SELECT * FROM user WHERE username ='".$dbUsername."'";
    $result = $con->query($sql);

    $username;
    $fullname; 
    $adddress; 
    $city;
    
    if($result->num_rows >0){
        while($row =$result->fetch_assoc()){
            $username = $row["username"];
            $fullname = $row["fullname"];
            $phoneNumber = $row["phoneNumber"];
            $adddress  = $row["address"];
            $city = $row["city"];
            }
        }
    $con->close();
    
    $check =0;
    function checkAvaliable(){
        include_once '../Php/Connect.php';
        $newUsername = $_POST['tendn'];
        $sql ="SELECT * FROM user WHERE username ='".$newUsername."'";
        $result = $con->query($sql);
        if($result->num_rows >0){
            $check =1;
            echo "<script type = 'text/javascript'>alert('Tên đăng nhập đã được sử dụng!');</script>";   
        }
        $con->close();
    }
    
    function checkEmpty(){
        if(empty($_POST['tendn'])){
            echo "<script type = 'text/javascript'>alert('Bạn chưa nhập tên đăng nhập');</script>";   
            $check =1;
        }
        elseif(empty($_POST['hoten'])){
            echo "<script type = 'text/javascript'>alert('Bạn chưa nhập họ tên!);</script>";   
            $check =1;
        }
        elseif(empty($_POST['sdt'])){
            echo "<script type = 'text/javascript'>alert('Bạn chưa nhập Số điện thoại!);</script>";   
            $check =1;
        }
        elseif(empty($_POST['diachi'])){
            echo "<script type = 'text/javascript'>alert('Bạn chưa nhập Địa chỉ!);</script>";   
            $check =1;
        }
        elseif(empty($_POST['tinh'])){
            echo "<script type = 'text/javascript'>alert('Bạn chưa nhập Tỉnh/ thành phố!);</script>";   
            $check =1;
        }
    }
    function updateInfor(){
        
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Thông tin tài khoản</title>
    <link rel="stylesheet" href="../Css/InfoManagement.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    <img class="logo" src="../Images/Logo.svg">
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
        <button class="material-symbols-outlined" id="icon">
            account_circle
        </button>
    </div>
    <div class="nav">
        <ul>
            <li><a href="#trangchu">Trang chủ</a></li>
            <li >
                <a href="#sanpham">Sản phẩm </a>
            </li>
            <li><a href="#khuyenmai">Khuyến mãi</a></li>
            <li><a href="#kienthuc">Kiến thức chăm sóc da</a></li>
            <li><a href="#lienhe">Liên hệ </a></li>
        </ul>
    </div>
    <div class="frame">
        Trang chủ/Thông tin tài khoản
    </div>
    <div class="frame2">
        <div class="frame21">
            <p class="txtTaikhoan">Tài khoản của tôi </p>
            <hr />
            <form class ="userInfor" method ="POST" style="overflow-x: auto;">
                <table>
                    <tr>
                        <td>
                            <label>Tên đăng nhập</label>
                        </td>
                        <td>
                            <input type="text" id="tendn" name="tendn" value="" class="input" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Họ và tên</label>
                        </td>
                        <td>
                            <input type="text" id="hoten" name="hoten" value ="" class="input" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Số điện thoại</label>
                        </td>
                        <td>
                            <input type="tel" id="sdt" name="sdt" value ="" class="input" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Giới tính</label>
                        </td>
                        <td>
                            <label for="nam">Nam</label>
                            <input type="radio" id="nam" name="gioitinh" value="Nam" class="radio" />
                            <label for="nu">Nữ</label>
                            <input type="radio" id="nu" name="gioitinh" value="Nu" class="radio" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Địa chỉ</label>
                        </td>
                        <td>
                            <input type="text" id="diachi" name="diachi" value ="" class="input" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tỉnh/Thành phố</label>
                        </td>
                        <td>
                            <input type="text" id="tinh" name="tinh" value ="" class="input" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="button-capnhat">Cập nhật</button>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </div>
    <img class="logo2" src="../Images/Logo.svg">
    <footer>
        <div class="nav2">
            <a href="#info">Về chúng tôi </a>
            <a href="#sanpham">Sản phẩm </a>
            <a> </a>
            <a href="#hotro">Hỗ trợ khách hàng</a>
            <a href="#lienhe">Liên hệ </a>
        </div>
        <p>
            <hr class="line2" />
        </p>

        <pre class="footer-text">
            Địa chỉ: Khu phố 6, Phường Linh Trung, Thành phố Thủ Đức, Thành phố Hồ Chí Minh - Email: cskh@hotro.twancosmestics.vn
                        Chịu Trách Nhiệm Quản Lí Nội Dung: Nguyễn Ngọc Hiền - Điện thoại liên hệ: 0812922218
                                © 2022 Twan Comestics. All rights reserved.
        </pre>
    </footer>
    <script>
        var username = "<?php echo $username; ?>";
        document.getElementById('tendn').setAttribute('value', username);

        var fullname = "<?php echo $fullname; ?>";
        document.getElementById('hoten').setAttribute('value', fullname);

        var phoneNumber = "<?php echo $phoneNumber; ?>";
        document.getElementById('sdt').setAttribute('value', phoneNumber);   

        var address = "<?php echo $adddress; ?>";
        document.getElementById('diachi').setAttribute('value', address);

        var city = "<?php echo $city; ?>";
        document.getElementById('tinh').setAttribute('value', city);
    </script>
</body>
</html>