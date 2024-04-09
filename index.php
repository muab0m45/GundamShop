<?php session_start();
error_reporting(0);
include_once('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gundam Lap</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/custom-index.css" rel="stylesheet" />
         <script src="js/jquery.min.js"></script>
       <!--  <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
    </head>
    <body>
<?php include_once('includes/header.php');?>
        <!-- Header-->
        <div class="video-hero jquery-background-video-wrapper demo-video-wrapper">
  <video class="jquery-background-video" autoplay muted loop poster="#">
    <source src="assets/video-bg.mp4" type="video/mp4">
  </video>
	  <div class="video-overlay"></div>
  	<div class="page-width">
		    <div class="video-hero--content">
			      <p>Uy Tín Đặt Lên Hàng Đầu!</p>
			      <h2>GUNDAM SHOP</h2>
                  <section class="btn_section" name="Button Style 4">
                    <a href="#products" class="btn-design-5" name="Dark Border" preview="true">
                        <span>KHÁM PHÁ NGAY</span>
                    </a>
                  </section> 
    		</div>
            
  	</div>
</div>
        <!-- Section-->
        
        <section class="py-5">
            <div class="product-heading">
                <h2>GRADES</h2>
            </div>
            <div class="container px-4 px-lg-5 mt-5" id="grades">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="category-item" style="width: 50%;">
                        <div class="h-100 btn-design-5 category-btn--custom-yellow" style="height: 100% !important; width: 100%;">
                            <!-- Product image-->
                            <a href="http://localhost/shop1/categorywise-products.php?cid=12">
                            <div class="category-img" style="padding: 4px; border-color: red;">
                                <img class="card-img-top category-item-img-big" src="assets/hg-bg.png" width="350" height="300" alt="ROBINHOOD GUNDAM AGE-2 - SDW HEROES ">
                                <h3 class="category-title">High Grade (HG)</h3>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="category-item" style="width: 50%;">
                        <div class="h-100 btn-design-5 category-btn--custom-yellow" style="height: 100% !important; width: 100%;">
                            <!-- Product image-->
                            <div class="category-img" style="padding: 4px;">
                                <img class="card-img-top category-item-img-big" src="assets/sd-bg.png" width="350" height="300" alt="ROBINHOOD GUNDAM AGE-2 - SDW HEROES ">
                                <h3 class="category-title">SD & BB</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5" id="products">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="category-item" style="width: 33.3333333333%;">
                        <div class="h-100 btn-design-5 category-btn--custom-red" style="height: 100% !important; width: 100%;">
                            <!-- Product image-->
                            <div class="category-img" style="padding: 4px;">
                                <img class="card-img-top category-item-img-big" src="assets/rg-bg.png" width="350" height="300" alt="ROBINHOOD GUNDAM AGE-2 - SDW HEROES ">
                                <h3 class="category-title" style="color: #fb2f38;">Real Grade (RG)</h3>
                            </div>
                        </div>
                    </div>
                    <div class="category-item" style="width: 33.3333333333%;">
                        <div class="h-100 btn-design-5 category-btn--custom-red" style="height: 100% !important; width: 100%;">
                            <!-- Product image-->
                            <div class="category-img" style="padding: 4px;">
                                <img class="card-img-top category-item-img-big" src="assets/mg-bg.png" width="350" height="300" alt="ROBINHOOD GUNDAM AGE-2 - SDW HEROES ">
                                <h3 class="category-title" style="color: #fb2f38;">Master Grade (MG)</h3>
                            </div>
                        </div>
                    </div>
                    <div class="category-item" style="width: 33.3333333333%;">
                        <div class="h-100 btn-design-5 category-btn--custom-red" style="height: 100% !important; width: 100%;">
                            <!-- Product image-->
                            <div class="category-img" style="padding: 4px;">
                                <img class="card-img-top category-item-img-big" src="assets/og-bg.png" width="350" height="300" alt="ROBINHOOD GUNDAM AGE-2 - SDW HEROES ">
                                <h3 class="category-title" style="color: #fb2f38;">Other Grade (OG)</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5" id="products">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="category-item" style="width: 100%;">
                        <div class="h-100 btn-design-5 category-btn--custom-blue" style="height: 100% !important; width: 100%;">
                            <!-- Product image-->
                            <a href="http://localhost/shop1/categorywise-products.php?cid=12">
                            <div class="category-img" style="padding: 4px;">
                                <img class="card-img-top category-item-img-big" style="height: 100px !important;" src="assets/all-bg.png" width="350" height="300" alt="ROBINHOOD GUNDAM AGE-2 - SDW HEROES ">
                                <h3 class="category-title" style="color: #2c52b3;">All Products</h3>
                            </div>
                            </a>
                        </div>
                    </div>
            </div>

        </section>
        <section class="py-5">
            <div class="product-heading">
                <h2>PRODUCTS</h2>
            </div>
            <div class="container px-4 px-lg-5 mt-5" id="products">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
<?php 

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
 
    $total_records_per_page = 12;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 
 
    $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM products ");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1


    $query=mysqli_query($con,"select products.id as pid,products.productImage1,products.productName,products.productPriceBeforeDiscount,products.productPrice from products order by pid desc LIMIT $offset, $total_records_per_page ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?> 

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <div class="product-img">
                                <img class="card-img-top" src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" width="350" height="300" alt="<?php echo htmlentities($row['productName']);?>" />
                            </div>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo htmlentities($row['productName']);?></h5>
                                    <!-- Product price-->
                                    <span class="text-decoration-line-through">đ<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span> - đ<?php echo htmlentities($row['productPrice']);?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn-design-5" href="product-details.php?pid=<?php echo htmlentities($row['pid']);?>">MUA NGAY</a></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
</div>
        </section>
        <!-- Coupon -->
        <section class="py-5 coupon">
            <div class="product-heading">
                <h2 style="padding: 200px 0;">COUPON</h2>
            </div>
            <div class="container px-4 px-lg-5 mt-5" style="width: 100%;" id="coupon">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="category-item" style="width: 100%;">
                        <div class="card h-100" style="height: 100% !important; width: 100%;">
                            <!-- Product image-->
                            <div class="category-img" style="padding: 12px;">
                                <img class="card-img-top category-item-img-big" style="height: 500px;" src="assets/coupon-bg2.jpg" width="350" height="300" alt="ROBINHOOD GUNDAM AGE-2 - SDW HEROES ">
                                <div class="coupon-frame">
                                    <div class="coupon-frame__desc">
                                        <span>96SDGUNDAM</span>
                                        <p style="font-size: 36px;color: #fff;margin: 20px 0;">Giảm 96% Toàn Bộ Sản Phẩm SD!</p>
                                        <div class="coupon-btn btn-design-5">
                                            NHẬN NGAY
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5" style="width: 100%;margin-top: 120px !important;" id="coupon">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="category-item" style="width: 100%;">
                        <div class="card h-100" style="height: 100% !important; width: 100%;">
                            <!-- Product image-->
                            <div class="category-img" style="padding: 12px;">
                                <img class="card-img-top category-item-img-big" style="height: 500px;" src="assets/coupon-bg.png" width="350" height="300" alt="ROBINHOOD GUNDAM AGE-2 - SDW HEROES ">
                                <div class="coupon-frame">
                                    <div class="coupon-frame__desc">
                                        <span>69HGGUNDAM</span>
                                        <p style="font-size: 36px;color: #fff;margin: 20px 0;">Giảm 69% Toàn Bộ Sản Phẩm HG!</p>
                                        <div class="coupon-btn btn-design-5">
                                            NHẬN NGAY
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>    
        <!-- Contact -->
        <section class="py-5 contact-index" style="padding-bottom: 165px !important;">
            <div class="contact-index__heading">
                <h3 style="padding: 20px 0; font-size: 80px;">CONTACT US</h3>
                <p>Chúng Tôi Hoạt Động 24/7, Hãy Liên Hệ Ngay Nếu Bạn Cần Sự Trợ Giúp!</p>
            </div>
            <div class="contact-index__img">
                <img src="assets/unit.webp" alt="">
            </div>
            <div class="contact-index__btn">
                <div class="btn-design-5">
                    THÔNG TIN LIÊN HỆ
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
