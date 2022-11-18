<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Đặt hàng</title>
    <link rel="stylesheet" href="../Css/Order.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    <header>
    <div class="row">
        <div class="column left">        
            <img src="../Images/Logo.svg">
        </div>        
        <div class="column right">
           <h2>   Đặt hàng  </h2>          
        </div>
    </div>
    
    
    </header>
    <section class="main">
        <div class="row2">
        <div class="column2 left">
            
            <h2>
            <span class="material-symbols-outlined" id="icon">
            location_on
            </span>
            Địa chỉ nhận hàng
            </h2>
            <div class="address-details">
                <div>
                <span>Nguyễn Ngọc Hiền</span> - <span> 0812922218 </span> - <span>abc@gmail.com</span>
                </div>           
            </div>
            <h3>
            123/A Khu phố 7, Phường B, Thành phố Thủ Đức
            </h3>
           
        </div>
           
        <div class="column2 right">
            <button class="button-thaydoi" type="button" onclick="Order()">Thay đổi </button>
        </div>
        </div>
        <div class="order-details">
            <div class="title">
                <h4 class="title-sanpham">Sản phẩm</h4>
                <h4 class="title-giatien">Giá tiền </h4>
                <h4 class="title-soluong">Số lượng</h4>
                <h4 class="title-thanhtien">Thành tiền</h4>
            </div>
            <div class="flex-container">
                <div class="product">
                    <img src="../Images_Web/Products/Cocoon/Gel bí đao rửa mặt Cocoon.jpg" id="image-product" />
                    <a class="name-product">Gel bí đao rửa mặt Cocoon</a>
                </div>
                <div class="title-giatien">
                    <input type="text" class="giatien" value="5.000đ">

                </div>
                <div class="title-soluong">
                    <input type="number" id="quantity" name="quantity" min="1" max="1000" class="soluong">
                </div>
                <div class="title-giatien">
                    <input type="text" class="giatien" value="5.000đ">

                </div>
                
            </div>
            <div class="flex-container">
                <div class="product">
                    <img src="../Images_Web/Products/Cocoon/Gel bí đao rửa mặt Cocoon.jpg" id="image-product" />
                    <a class="name-product">Gel bí đao rửa mặt Cocoon </a>
                </div>
                <div class="title-giatien">
                    <input type="text" class="giatien" value="5.000đ">

                </div>
                <div class="title-soluong">
                    <input type="number" id="quantity" name="quantity" min="1" max="1000" class="soluong">
                </div>
                <div class="title-giatien">
                    <input type="text" class="giatien" value="5.000đ">

                </div>
            </div>
        </div>
        <div class="discount">
            <h2> <span class="material-symbols-outlined" id="icon">
            confirmation_number
            </span> Mã giảm giá</h2>
            <input type="text" class="voucher">
            <button class="button-apdung">Áp dụng</button>
        </div>
        <div class="total">
        <h1>Tổng tiền</h1>
        <div class="invoice">
            <p>Tạm tính:</p>
            <p>Giảm giá:</p>
            <p>Tổng cộng:</p>
            <p style="color:#909497; font-weight:200">(Đã bao gồm VAT)</p>
        </div>
        <div class="dathang">
        <hr>    
        <button class="button-dathang">Tiến hành đặt hàng</button>
        </div>
        </div>
        
    </section>
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
        function Order(){
            document.write('<p><b>Thông tin đăng ký</b></p>');
        }
        
    </script>
</body>
</html>