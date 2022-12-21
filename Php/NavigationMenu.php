<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Navigation Menu</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/NavigationMenu.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
<header data-spy="affix" style="background-color:white">   
        <img class="logo" src="../Images_Web/Logo/Logo.svg">
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
        <a href="#" class="notification">
            <span class="material-symbols-outlined" id="icon">
            shopping_cart
            </span>
            <span class="badge">3</span>
        </a>
        <button class="material-symbols-outlined" id="icon">
            account_circle
        </button>
    </div>
    <nav >
        <ul>
            <li><a href="#trangchu" class="active" >Trang chủ</a></li>
            <li>
                <a href="#sanpham">Sản phẩm </a>
            </li>
            <li><a href="#khuyenmai">Khuyến mãi</a></li>
            <li><a href="#kienthuc">Kiến thức chăm sóc da</a></li>
            <li><a href="#lienhe">Liên hệ </a></li>
        </ul>
    </nav>
    </header>
</body>
</html>