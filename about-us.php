<?php session_start();
include_once('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Về Chúng Tôi | Gundam Shop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/custom-index.css" rel="stylesheet" />
       <!--  <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
    </head>
    <body>
<?php include_once('includes/header.php');?>
        <!-- Header-->
        <header class="bg-dark py-5 login-background">
            <div class="container px-4 px-lg-5 my-5">

                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">ABOUT US</h1>
        
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" style="color: #fff;">
                    Gundam Shop được thành lập từ tháng 10 năm 2022, nhằm đem tạo nên một sân chơi phục vụ những bạn trẻ có cùng đam mê sưu tầm và lắp ráp các mô hình Gundam.
                    Cửa hàng cam kết phân phối chính hãng 100% các sản phẩm đồ chơi lắp ráp Gundam đến từ những thương hiệu nổi tiếng như Bandai...
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="product-heading">
                <h2>STAFF</h2>
            </div>
            <div class="container px-4 px-lg-5 mt-5" id="products">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
 

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <div class="product-img">
                                <img class="card-img-top" style="border-radius: 50%; border: 2px solid #f8ed1a;" src="assets/team.jpg" width="350" height="300" alt="SD GUNDAM WORLD HEROES 21 KNIGHT STRIKE GUNDAM">
                            </div>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">CHÍ MẠNH</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                 

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <div class="product-img">
                                <img class="card-img-top" style="border-radius: 50%; border: 2px solid #f8ed1a;" src="assets/team.jpg" width="350" height="300" alt="ROBINHOOD GUNDAM AGE-2 - SDW HEROES ">
                            </div>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">XUÂN THỊNH</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- Footer-->
   <?php include_once('includes/footer.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
