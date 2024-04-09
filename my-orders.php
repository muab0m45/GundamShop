<?php session_start();
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Đơn Hàng | Gundam Shop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/jquery.min.js"></script>
       <!--  <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
    </head>
<style type="text/css"></style>
    <body>
<?php include_once('includes/header.php');?>
        <!-- Header-->
        <header class="bg-dark py-5 login-background">
            <div class="container px-4 px-lg-5 my-5">


                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">ORDERS</h1>
                </div>

            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4  mt-5">
     

    <div class="table-responsive">
        <table class="table" style="color: #fff;">
            <thead>
                <tr>
                    <th colspan="4"><h4>Danh Sách Đơn Hàng</h4></th>
                </tr>
            </thead>
            <tr>
                <thead>
                    <th>#</th>
                    <th>Mã Đơn Hàng </th>
                    <th>Ngày Đặt</th>
                    <th>Thanh Toán</th>
                    <th>Tổng Số Tiền</th>
                    <th>Tình Trạng</th>
                    <th>Chi Tiết</th>
                </thead>
            </tr>
            <tbody>
<?php
$uid=$_SESSION['id'];
$ret=mysqli_query($con,"select * from orders where userId='$uid'");
$num=mysqli_num_rows($ret);
$cnt=1;
    if($num>0)
    {
while ($row=mysqli_fetch_array($ret)) {

?>

                <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td><?php echo htmlentities($row['orderNumber']);?></td>
                    <td><?php echo htmlentities($row['orderDate']);?></td>
                    <td><?php echo htmlentities($row['txnType']);?></td>
                    <td><?php echo htmlentities($row['totalAmount']);?></td>
                    <td><?php $ostatus=$row['orderStatus'];
                    if( $ostatus==''): echo "Chờ Xác Nhận";
                        else: echo $ostatus; endif;?><br />
                    </td>
                    <td><a href="order-details.php?onumber=<?php echo htmlentities($row['orderNumber']);?>" class="btn-design-5" style="padding: 2px 28px;">Xem</a></td>
                
                </tr>
            
                <?php $cnt++;}  } else{ ?>
                <tr>
                    <td style="font-size: 18px; font-weight:bold ">Không Có Đơn Hàng&nbsp;
<a href="shop-categories.php" class="btn-upper btn btn-warning">Tiếp Tục Mua Sắm</a>
                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
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
<?php } ?>
