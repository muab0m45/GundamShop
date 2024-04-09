<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{
// Code for Product deletion from  cart  
if(isset($_GET['del']))
{
$wid=intval($_GET['del']);
$query=mysqli_query($con,"delete from cart where id='$wid'");
 echo "<script>alert('Đã Xóa Sản Phẩm Khỏi Giỏ Hàng');</script>";
echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
}
// For Address Insertion
if(isset($_POST['submit'])){
$uid=$_SESSION['id'];    
//Getting Post Values
$baddress=$_POST['baddress'];
$bcity=$_POST['bcity'];
$bstate=$_POST['bstate'];
$bpincode=$_POST['bpincode'];
$bcountry=$_POST['bcountry'];
$saddress=$_POST['saddress'];
$scity=$_POST['scity'];
$sstate=$_POST['sstate'];
$spincode=$_POST['spincode'];
$scountry=$_POST['scountry'];

$sql=mysqli_query($con,"insert into addresses(userId,billingAddress,biilingCity,billingState,billingPincode,billingCountry,shippingAddress,shippingCity,shippingState,shippingPincode,shippingCountry) values('$uid','$baddress','$bcity','$bstate','$bpincode','$bcountry','$saddress','$scity','$sstate','$spincode','$scountry')");
if($sql)
{
    echo "<script>alert('Thêm Địa Chỉ Thành Công');</script>";
    echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
}
else{
echo "<script>alert('Vui Lòng Thử Lại');</script>";
    echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
}
}
//For Proceeding Payment
if(isset($_POST['proceedpayment'])){
 $address=$_POST['selectedaddress'];  
 $gtotal=$_POST['grandtotal']; 
 $_SESSION['address']=$address;
 $_SESSION['gtotal']=$gtotal;
   echo "<script type='text/javascript'> document.location ='payment.php'; </script>";   
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shopping Portal | Checkout</title>
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
                    <h1 class="display-4 fw-bolder">CHECKOUT</h1>
                </div>

            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4  mt-5">
     


        <table class="table" style="color: #fff;">
            <thead>
                <tr>
                    <th colspan="4"><h4>Sản Phẩm</h4></th>
                </tr>
            </thead>
            <tr>
                <thead>
                    <th>Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Tạm Tính</th>
                    <th>Hành Động</th>
                </thead>
            </tr>
            <tbody>
<?php
$uid=$_SESSION['id'];
$ret=mysqli_query($con,"select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,cart.productId as pid,cart.id as cartid,products.productPriceBeforeDiscount,cart.productQty from cart join products on products.id=cart.productId where cart.userId='$uid'");
$num=mysqli_num_rows($ret);
    if($num>0)
    {
while ($row=mysqli_fetch_array($ret)) {

?>

                <tr>
                    <td class="col-md-2"><img src="admin/productimages/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" width="100" height="100"></td>
                    <td>
                       <a href="product-details.php?pid=<?php echo htmlentities($pd=$row['pid']);?>"><?php echo htmlentities($row['pname']);?></a>
        </td>
<td>
                            <span><?php echo htmlentities($row['pprice']);?>đ</span>
                    </td>
                    <td><?php echo htmlentities($row['productQty']);?></td>
                     <td><?php echo htmlentities($totalamount=$row['productQty']*$row['pprice']);?></td>
                    <td>
                        <a href="my-cart.php?del=<?php echo htmlentities($row['cartid']);?>" onClick="return confirm('Xác Nhận Xóa?')" class="btn-design-5" style="background: #fb2f38; border: 2px solid #fb2f38;color: #fff;">Xóa</a>
                    </td>
                </tr>
                <?php $grantotal+=$totalamount;
            } ?>
<tr>
    <th colspan="4">Tổng Số Tiền</th>
    <th colspan="2"><?php echo $grantotal;?></th>
</tr>
            <?php } else{  
    echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>"; } ?>   
            </tbody>
        </table>
<h5 style="color: #fff;">Địa Chỉ Đã Lưu</h5>
<?php 
$uid=$_SESSION['id'];
$query=mysqli_query($con,"select * from addresses where userId='$uid'");
$count=mysqli_num_rows($query);
if($count==0):
echo "<font color='red'>No addresses Found.</font>";
else:
 ?>
 <form method="post">
    <input type="hidden" name="grandtotal" value="<?php echo $grantotal; ?>">
<div class="row">
<div class="col-6">
      <table class="table" style="color: #fff;">
            <thead>
                <tr>
                    <th colspan="4"><h5>Địa Chỉ Thanh Toán</h5></th>
                </tr>
            </thead>
            <tr>
                <thead>
                    <th>#</th>
                    <th width="250">Địa Chỉ</th>
                    <th>Thành Phố</th>
                    <th>Tỉnh</th>
                    <th>Mã Vùng</th>
                    <th>Quốc Gia</th>
            
                </thead>
            </tr>
            </table>  

</div>
<div class="col-6">
          <table class="table" style="color: #fff;">
            <thead>
                <tr>
                    <th colspan="4"><h5>Địa Chỉ Giao Hàng</h5></th>
                </tr>
            </thead>
            <tr>
                <thead>
                    <th width="250">Địa Chỉ</th>
                    <th>Thành Phố</th>
                    <th>Tỉnh</th>
                    <th>Mã Vùng</th>
                    <th>Quốc Gia</th>
            
                </thead>
            </tr>
            </tbody>
            </table> 
</div>
</div>
<!-- Fecthing Values-->
<?php while ($result=mysqli_fetch_array($query)) { ?>
<div class="row">
<div class="col-6">
      <table class="table" style="color: #fff;">

            <tbody> 

                <tr>
                    <td><input type="radio" name="selectedaddress" value="<?php echo $result['id'];?>" required></td>
                    <td width="250"><?php echo $result['billingAddress'];?></td>
                    <td><?php echo $result['biilingCity'];?></td>
                    <td><?php echo $result['billingState'];?></td>
                    <td><?php echo $result['billingPincode'];?></td>
                    <td><?php echo $result['billingCountry'];?></td>
                </tr>
            </tbody>
            </table>  

</div>
<div class="col-6">
          <table class="table" style="color: #fff;">
            <tbody> 
                <tr>
                    <td width="250"><?php echo $result['shippingAddress'];?></td>
                    <td><?php echo $result['shippingCity'];?></td>
                    <td><?php echo $result['shippingState'];?></td>
                    <td><?php echo $result['shippingPincode'];?></td>
                    <td><?php echo $result['shippingCountry'];?></td>
                </tr>
            </tbody>
            </table> 
</div>
</div>


<?php } endif;?>
<div align="right">
 <button class="btn-design-5" style="background: #2c52b3; border: 2px solid #2c52b3;color: #fff;" type="submit" name="proceedpayment">Thanh Toán</button>
</div>
</form>

<hr />
<form method="post" name="address">

     <div class="row" style="color: #fff;">
        <!--Billing Addresss --->
        <div class="col-6">
               <div class="row">
         <div class="col-9" align="center"><h5>Thêm Địa Chỉ Thanh Toán</h5><br /></div>
         <hr />
     </div>
     <div class="row">
         <div class="col-3">Địa Chỉ</div>
         <div class="col-6"><input type="text" name="baddress" id="baddress" class="form-control" required ></div>
     </div>
       <div class="row mt-3">
         <div class="col-3">Thành Phố</div>
         <div class="col-6"><input type="text" name="bcity" id="bcity"  class="form-control" required>
         </div>
          

     </div>

       <div class="row mt-3">
         <div class="col-3">Tỉnh</div>
         <div class="col-6"><input type="text" name="bstate" id="bstate" class="form-control" required></div>
     </div>

          <div class="row mt-3">
         <div class="col-3">Mã Vùng</div>
         <div class="col-6"><input type="text" name="bpincode" id="bpincode" pattern="[0-9]+" title="only numbers" maxlength="6" class="form-control" required></div>
     </div>

           <div class="row mt-3">
         <div class="col-3">Quốc Gia</div>
         <div class="col-6"><input type="text" name="bcountry" id="bcountry" class="form-control" required></div>
     </div>
 </div>
        <!--Shipping Addresss --->
        <div class="col-6">
               <div class="row">
         <div class="col-9" align="center"><h5>Thêm Địa Chỉ Giao Hàng</h5> 
            <input type="checkbox" name="adcheck" value="1"/>
            <small>Địa Chỉ Thanh Toán Giống Địa Chỉ Giao Hàng</small></div>
         <hr />
     </div>
     <div class="row">
         <div class="col-3">Địa Chỉ</div>
         <div class="col-6"><input type="text" name="saddress"  id="saddress" class="form-control" required ></div>
     </div>
       <div class="row mt-3">
         <div class="col-3">Thành Phố</div>
         <div class="col-6"><input type="text" name="scity" id="scity" class="form-control" required>
         </div>
          
     </div>

       <div class="row mt-3">
         <div class="col-3">Tỉnh</div>
         <div class="col-6"><input type="text" name="sstate" id="sstate" class="form-control" required></div>
     </div>

          <div class="row mt-3">
         <div class="col-3">Mã Vùng</div>
         <div class="col-6"><input type="text" name="spincode" id="spincode" pattern="[0-9]+" title="only numbers" maxlength="6" class="form-control" required></div>
     </div>

           <div class="row mt-3">
         <div class="col-3">Quốc Gia</div>
         <div class="col-6"><input type="text" name="scountry" id="scountry" class="form-control" required></div>
     </div>

      
 </div>
         <div class="row mt-3">
                 <div class="col-5">&nbsp;</div>
         <div class="col-6"><input type="submit" name="submit" id="submit" class="btn-design-5" style="background: #2c52b3; border: 2px solid #2c52b3;color: #fff;" value="ADD" required></div>
     </div>

</div>
 </form>

              
            </div>

 
</div>
        </section>
        <!-- Footer-->
   <?php include_once('includes/footer.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script type="text/javascript">
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#saddress').val($('#baddress').val() );
                $('#scity').val($('#bcity').val());
                $('#sstate').val($('#bstate').val());
                $('#spincode').val( $('#bpincode').val());
                  $('#scountry').val($('#bcountry').val() );
            } 
            
        });
    });
</script>
    </body>
</html>
<?php } ?>
