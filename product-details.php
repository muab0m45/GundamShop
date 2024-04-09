<?php session_start();
include_once('includes/config.php');
error_reporting(0);

//Code for Wish List
$pid=intval($_GET['pid']);
if(isset($_POST['wishlist'])){
if(strlen($_SESSION['id'])==0)
{   
echo "<script>alert('Vui Lòng Đăng Nhập!');</script>";
} else{
$userid=$_SESSION['id'];    
$query=mysqli_query($con,"select id from wishlist where userId='$userid' and productId='$pid'");
$count=mysqli_num_rows($query);
if($count==0){
mysqli_query($con,"insert into wishlist(userId,productId) values('$userid','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
  echo "<script type='text/javascript'> document.location ='my-wishlist.php'; </script>";
} else { 
echo "<script>alert('This product is already added in your wishlist.');</script>";
}
}}

//Code for Adding Product in to Cart
if(isset($_POST['addtocart'])){
if(strlen($_SESSION['id'])==0)
{   
echo "<script>alert('Vui Lòng Đăng Nhập!');</script>";
} else{
$userid=$_SESSION['id']; 
$pqty=$_POST['inputQuantity'];  
$query=mysqli_query($con,"select id,productQty from cart where userId='$userid' and productId='$pid'");
$count=mysqli_num_rows($query);
if($count==0){
mysqli_query($con,"insert into cart(userId,productId,productQty) values('$userid','$pid','$pqty')");
echo "<script>alert('Product aaded in cart');</script>";
  echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
} else { 
$row=mysqli_fetch_array($query);
$currentpqty=$row['productQty'];
$productqty=$pqty+$currentpqty;
mysqli_query($con,"update cart set productQty='$productqty' where userId='$userid' and productId='$pid'");
echo "<script>alert('Product aaded in cart');</script>";
  echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}
}}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shopping Portal  | Product Details</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
<?php include_once('includes/header.php');?>
        <!-- Product section-->

<?php 
$pid=intval($_GET['pid']);
$query=mysqli_query($con,"select products.id as pid,products.productImage1,products.productImage2,products.productImage3,products.productName,category.categoryName,subcategory.subcategoryName as subcatname,products.postingDate,products.updationDate,subcategory.id as subid,tbladmin.username,category.id as catid,products.productCompany,products.productPrice,products.productPriceBeforeDiscount,products.productAvailability,products.productDescription,products.shippingCharge from products join subcategory on products.subCategory=subCategory.id join category on products.category=category.id join tbladmin on tbladmin.id=products.addedBy where  products.id='$pid'");
while($row=mysqli_fetch_array($query))
{
$catid=$row['catid'];
?>
<form name="productdetails" method="post">
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <div class="product-image" style="max-height: 680px; border-left: 4px solid #f8ed1a; margin-bottom: 8px;">
                        <img class="card-img-top mb-md-0" src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>" style="object-fit: contain;"/>
                        </div>
<img src="admin/productimages/<?php echo htmlentities($row['productImage2']);?>" width="291" style="border:solid 1px #000;">
<img src="admin/productimages/<?php echo htmlentities($row['productImage3']);?>" width="292" style="border:solid 1px #000;">

                    </div>
                    <div class="col-md-6">
                        <span style="background-color: #fb2f38;color: #fff;padding:4px; border-radius: 8px;"><?php echo htmlentities($row['productCompany']);?></span>
                        <h1 class="display-5 fw-bolder" style="color: #f8ed1a;"><?php echo htmlentities($row['productName']);?></h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through" style="color: #fff;">đ<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
                            <span style="color: #f8ed1a; font-size: 28px; margin-left: 12px;">đ<?php echo htmlentities($row['productPrice']);?></span>
                            <div class="small mb-1"><strong>CATEGORY</strong> <?php echo htmlentities($row['categoryName']);?></div>
                        <div class="small mb-1"><strong>SUB CATEGORY</strong> <?php echo htmlentities($row['subcatname']);?></div>
                            <div class="small mb-1"><strong>SHIPPING</strong> $<?php echo htmlentities($row['shippingCharge']);?></div>
                        </div>

                        <p class="lead"><?php echo $row['productDescription'];?></p>
<?php if($row['productAvailability']=='In Stock'):?>

                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" name="inputQuantity" type="num" value="1" style="max-width: 60px;max-height: 50px; background-color: #000; color: #f8ed1a;border: 1px solid #f8ed1a;font-size: 20px;" />
                            <button class="btn-design-5" type="submit" name="addtocart">
                                <i class="bi-cart-fill me-1"></i>
                                Thêm Vào Giỏ
                            </button> &nbsp;
   <button class="btn-design-5 wish-btn--custom" type="submit" name="wishlist">
                                <i class="bi bi-heart"></i>
                               Yêu Thích
                            </button>

                        </div>
<?php else: ?>
    <h5 style="color:red;">Out of Stock</h5>
      <button class="btn btn-outline-dark flex-shrink-0" type="submit" name="wishlist">
                                <i class="bi bi-heart"></i>
                               Wishlist
                            </button>
<?php endif;?>    

                    </div>
                </div>
            </div>
        </section>
        </form>
<?php } ?>

        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4" style="color: #f8ed1a;" >SẢN PHẨM LIÊN QUAN</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
   <?php 
    $query=mysqli_query($con,"select products.id as pid,products.productImage1,products.productName,products.productPriceBeforeDiscount,products.productPrice from products where category='$catid' order by pid desc limit 8 ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{ ?>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" style="padding: 12px;object-fit: cover;" src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>" width="350" height="300"/>
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo htmlentities($row['productName']);?></h5>
                                    <!-- Product price-->
                                    <span class="text-decoration-line-through" style="color: #fff;">đ<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
                            <span style="font-size: 24px;">đ<?php echo htmlentities($row['productPrice']);?></span>
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
        </section>
        <!-- Footer-->
        <?php include_once('includes/footer.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
