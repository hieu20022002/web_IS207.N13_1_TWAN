﻿<?php
session_start();

/*
//echo $_SESSION['username'];
if(isset($_POST['loginBtn'])){
    if(empty($_SESSION['username'])){
        header('Location: DangNhap.php');
    }
}
*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Trang chủ</title>
    <link rel="stylesheet" href="/app/Views/Css/HomePage.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            var stt_left = 0,
                stt_right = 0;
            arr = {
                left: stt_left,
                right: stt_right,
            }
            // tự động chuyển slide
            function auto(arr) {
                var thoigian = setInterval(function () {
                    if (++arr["right"] <= 2) {
                        $(".slide").eq(arr["left"]).hide();                        
                        $(".slide").eq(arr["right"]).show();
                        arr["left"]++;
                    } else {
                        arr["right"] = 2;
                    }
                }, 3000);
            }
            auto(arr);

            $(".btn-change-right").click(function () {
                if (++arr["right"] <= 2) {
                        $(".slide").eq(arr["left"]).hide();                        
                        $(".slide").eq(arr["right"]).show();
                        arr["left"]++;
                    } else {
                        arr["right"] = 2;
                    }
            });

            $(".btn-change-left").click(function () {
                if (--arr["left"] >= 0) {
                    $(".slide").eq(arr["right"]).hide();                    
                    $(".slide").eq(arr["left"]).show();                    
                    arr["right"]--;
                } else {
                    arr["left"] = 0;
                }
            });
        });
    </script>
</head>

<body>
    <form method ="POST">
    <img class="logo" src="/Images/Logo.svg">
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
            <div class="dropdown-content" id="content" <?php if (!isset($_SESSION['login'])) echo "style ='display: none';" ?>>
                <a href="http://localhost:3000/index.php?url=user/infomanagement">Thay đổi thông tin</a>
                <a href="#">Đơn hàng</a>
                <a href="http://localhost:3000/index.php?url=login/logout">Đăng xuất</a>
            </div>
        </div>      
        </button>
    </div>

    <?php include_once ('./system/libs/nav.php'); ?>

    <div class="container">
        <div class="frame1">
            <div>
                <img src="/Images/Banner/Banner 1.png" alt="Banner 1" class="slide slide-1" />
            </div>
            <div>
                <img src="/Images/Banner/Banner 2.png" alt="Banner 2" class=" slide slide-2" />
            </div>
            <div>
                <img src="/Images/Banner/Banner 3.png" alt="Banner 3" class="slide slide-3" />
            </div>
        </div>
        
        <div class="btn-change btn-change-left"><i class="icon-left fas fa-angle-double-left"></i></div>
        <div class="btn-change btn-change-right"><i class="icon-right fas fa-angle-double-right"></i></div>

    </div>
    <div class="frame2">
        <h1>SẢN PHẨM MỚI</h1>
        <div class="flex-container">
            <div>
                <img src="/Images/Products/Manyo/cleansing_soda_foam-removebg-preview.png" class="image-product" />
                <p class="name-product"> Manyo Factory Pore Cleansing Soda Foam 150ml</p>
                <pre class="cost-product">475.000 <u>đ</u></pre>
            </div>
            <div>
                <img src="/Images/Products/Manyo/pure_deep_cleansing_foam-removebg-preview.png" class="image-product" />
                <p class="name-product">
                    Manyo Factory Pure & Deep Cleansing Soda Foam 100ml
                </p>
                <pre class="cost-product">327.000 <u>đ</u></pre>

            </div>
            <div>
                <img src="/Images/Products/Manyo/vegan_foam-removebg-preview (1).png" class="image-product" />
                <p class="name-product">  Manyo Our Vegan Heartleaf Cica Cleansing Foam 120ml</p>
                <pre class="cost-product">315.000 <u>đ</u></pre>
            </div>
            <div>
                <img src="/Images/Products/Manyo/serum_manyo-removebg-preview.png" class="image-product" />
                <p class="name-product"> MANYO FACTORY Bifida Biome Complex Ampoule 50ml</p>
                <pre class="cost-product">820.000 <u>đ</u></pre>
            </div>
        </div>
    </div>
    <div class="frame3">
        <hr />
        <h1>BÁN CHẠY NHẤT</h1>
        <img src="/Images/Products/Cocoon/Bộ sản phẩm Cocoon.jpg" class="frame3-1" />
        <div>
            <img src="/Images/Products/Cocoon/Gel bí đao rửa mặt Cocoon.jpg" class="frame3-2" />
            <img src="/Images/Products/Cocoon/Tinh chất bí đao Cocoon.jpg" class="frame3-3" />
            <button class="button1">
                TÌM HIỂU THÊM <span class="material-symbols-outlined" id="icon-arrow">
                    trending_flat
                </span>
            </button>

        </div>

        <img src="/Images/Products/Cocoon/Nước bí đao cân bằng Cocoon.jpg" class="frame3-4" />

        <div class="frame3-text">
            <p>
                Bí đao thuộc họ Cucurbitaceae, là một loại thực vật được sử dụng phổ biến ở Việt Nam, Thái Lan, Ấn độ và những nước nhiệt đới khác.
            </p>
            <p>
                Trong quả bí đao có chứa các amino acid, mucins, muối khoáng, vitamin B và C.. Những nghiên cứu về loại quả này xác định có 2 loại triterpenes đó là alunsenol và mutiflorenol có tác dụng chống oxi hóa.
            </p>
            <p>
                Theo sách y học cổ truyền, bí đao có đặc tính làm mát, làm giảm nhiệt, kháng viêm và diệt khuẩn giúp hạn chế mụn trứng cá, mụn viêm và làm giảm vết bỏng.
            </p>
        </div>
    </div>
    <section class="blog">
        <hr />
        <h1>BÀI VIẾT</h1>
        <div class="flex-container2">
            <div>
                <img src="/Images/Posters/Bài viết/255851207_4488384907923767_5021908811223513261_n_d1d0829cfb.jpg" class="image-blog" />
                <article>
                    <h6 class="title-post">23.09.2021</h6>
                    <h6>
                        DA DẦU, MỤN SẼ “ĂN CHAY” NHƯ THẾ NÀO?
                    </h6>
                    <p>
                        Vẻ đẹp của làn da được xem như một tấm gương phản chiếu tốt nhất về tình trạng sức khỏe thể chất và tinh thần của chúng ta. Giống như các loại da khác, da dầu cũng sẽ đạt được trạng thái khỏe mạnh ...
                    </p>
                    <button class="button-post">
                        TÌM HIỂU THÊM
                        <span class="material-symbols-outlined" id="icon-arrow">
                            trending_flat
                        </span>
                    </button>
                </article>
            </div>
            <div>
                <img src="/Images/Posters/Bài viết/dewy-skin-insta-jin-4.jpg" class="image-blog" />
                <article>
                    <h6>02.10.2022</h6>
                    <h6>XU HƯỚNG LÀM ĐẸP DEWY SKIN “LÀM MƯA LÀM GIÓ” CỘNG ĐỒNG LÀM ĐẸP</h6>
                    <p>
                        Trong thời gian gần đây, xu hướng làm đẹp dewy skin với làn da sáng bóng như phủ sương đang liên tục được “lăng xê” trên các sàn diễn thời trang và được giới làm đẹp nhiệt liệt ủng hộ.
                    </p>
                    <button class="button-post">
                        TÌM HIỂU THÊM
                        <span class="material-symbols-outlined" id="icon-arrow">
                            trending_flat
                        </span>
                    </button>

                </article>
            </div>
        </div>
    </section>
    <a href="http://localhost:3000/index.php"><img class="logo2" src="/Images/Logo.svg"> </a>
    
    <?php include_once './system/libs/footer.php'; ?>
    </form>
    
</body>
</html>