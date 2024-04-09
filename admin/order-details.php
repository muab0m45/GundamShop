<?php session_start();
error_reporting(0);
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

// Code for Take Action
if(isset($_POST['takeaction']))
{
    $oid=$_GET['orderid'];
    $status=$_POST['ostatus'];
    $remark=$_POST['remark'];
    $actionby=$_SESSION['aid'];
    $canceledBy='Admin';

    if($status=='Cancelled'):
   $query="insert into ordertrackhistory(orderId,status,remark,actionBy,canceledBy) values('$oid','$status','$remark','$actionby',' $canceledBy');";
   $query.="update orders set orderStatus='$status' where id='$oid'";
else:
  $query="insert into ordertrackhistory(orderId,status,remark,actionBy) values('$oid','$status','$remark','$actionby');";
   $query.="update orders set orderStatus='$status' where id='$oid'";
endif;    
$result = mysqli_multi_query($con, $query);
    if ($result) {
    
    echo '<script>alert("Action has been updated successfully")</script>';
    echo "<script>window.location.href ='all-orders.php'</script>";
  }
  else
    {
     echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gundam Shop | Thông Tin Đơn Hàng</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
 <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
       <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
<tbody>
<?php 
$oid=$_GET['orderid'];
$query=mysqli_query($con,"SELECT orders.id,orderNumber,totalAmount,orderStatus,orderDate,users.contactno,orders.txnType,orders.txnNumber
,users.name,users.email,users.contactno,billingAddress,biilingCity,billingState,billingPincode,billingCountry,shippingAddress,shippingCity,shippingState,shippingPincode,shippingCountry
    FROM `orders` join users on users.id=orders.userId 
join addresses on addresses.id=orders.addressId
    where (orders.id='$oid')");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>  

                        

                    <div class="container-fluid px-4" >
                        <h1 class="mt-4">Đơn Hàng #<?php echo htmlentities($row['orderNumber']);?></h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Thông Tin Đơn Hàng
                            </div>
                            <div class="card-body" id="print">


                                <div class="row">
                                    <div class="col-5">
                                <table class="table table-bordered" width="100%">
                            
                                        <tr>
                                            <th colspan="2" style="text-align:center;">Thông Tin Đơn Hàng</th>
                                        </tr>
                                        <tr>
                                            <th>Mã Đơn Hàng</th>
                                            <td><?php echo htmlentities($row['orderNumber']);?></td>
                                            </tr>
                                            <tr>
                                            <th>Tổng Số Tiền</th>
                                            <td> <?php echo htmlentities($row['totalAmount']);?></td>
                                            </tr>
                                            <tr>
                                            <th>Ngày Đặt</th>
                                            <td><?php echo htmlentities($row['orderDate']);?></td>
                                        </tr>
                                        <tr>
                                            <th>Tình Trạng</th>
                                               <td><?php $ostatus=$row['orderStatus'];
                                               if($ostatus==''):
                                                echo "Chờ Xác Nhận";
                                            else:
                                                echo $ostatus;
                                            endif;

                                           ?></td>
                                           </tr>
                                             <tr>
                                            <th>Hình Thức Thanh Toán</th>
                                               <td><?php echo htmlentities($row['txnType']);?></td>
                                           </tr>
   <tr>
                                            <th>Mã Giao Dịch</th>
                                               <td><?php echo htmlentities($row['txnNumber']);?></td>
                                           </tr>                   

                               
                                       
                                    </tbody>
                                </table></div>

<!--Cutomer /Users Details --->
 <div class="col-7" style="float:left;">
        <table class="table table-bordered" width="100%">
                                        <tr>
                                            <th colspan="2" style="text-align:center;">Thông Tin Khách Hàng</th>
                                        </tr>
                                        <tr>
                                            <th>Tên Khách Hàng</th>
                                            <td><?php echo htmlentities($row['name']);?></td>
                                            </tr>
                                            <tr>
                                            <th>Email</th>
                                            <td> <?php echo htmlentities($row['email']);?></td>
                                            </tr>
                                            <tr>
                                            <th>Điện Thoại</th>
                                            <td><?php echo htmlentities($row['contactno']);?></td>
                                        </tr>
                                        <tr>
                                            <th>Địa Chỉ Thanh Toán</th>
                                               <td><?php echo htmlentities($row['billingAddress']);?><br />
                                                <?php echo htmlentities($row['biilingCity']);?>, <?php echo htmlentities($row['billingState']);?><br />
                                                <?php echo htmlentities($row['billingCountry']);?>-<?php echo htmlentities($row['billingPincode']);?>

                                               </td>
                                           </tr>
                                             <tr>
                                            <th>Địa Chỉ Giao Hàng</th>
                                               <td><?php echo htmlentities($row['shippingAddress']);?><br />
                                            <?php echo htmlentities($row['shippingCity']);?>, <?php echo htmlentities($row['shippingState']);?><br />
                                                <?php echo htmlentities($row['shippingCountry']);?>-<?php echo htmlentities($row['shippingPincode']);?>
                                               </td>
                                           </tr>                  

                                    
                                        <?php $cnt=$cnt+1; } ?>
                                       
                                    </tbody>
                                </table></div>

<!-- Products / Item Details --->
 <div class="col-12">
        <table class="table table-bordered">
                                        <tr>
                                            <th colspan="6" style="text-align:center;">Danh Sách Sản Phẩm</th>
                                        </tr>
                                        <tr>
                                            <th>Sản Phẩm</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Giá Sản Phẩm</th>
                                            <th>Số Lượng</th>
                                            <th>Thành Tiền</th>
                                            <th>Phí Giao Hàng</th>
                                        </tr>
<?php 
$oid=$_GET['orderid'];
$query=mysqli_query($con,"SELECT products.id as pid,products.productName,products.productImage1,products.productPrice,products.shippingCharge, ordersdetails.quantity FROM `ordersdetails` 
JOIN orders on orders.orderNumber=ordersdetails.orderNumber
join products on products.id=ordersdetails.productId
    where (orders.id='$oid')");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>  

             <tr>
                    <td><img src="productimages/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>" width="100" height="100"></td>
                    <td>
                       <a href="edit-product.php?id=<?php echo htmlentities($pd=$row['pid']);?>" target="_blank"><?php echo htmlentities($row['productName']);?></a>
        </td>
<td><?php echo htmlentities($row['productPrice']);?></td>
                    <td><?php echo htmlentities($row['quantity']);?></td>
                     <td><?php echo htmlentities($totalamount=$row['quantity']*$row['productPrice']);?></td>
                        <td><?php echo htmlentities($tshipping=$row['shippingCharge']);?></td>
             
                </tr>
<?php 
$grandtotalamount+=$totalamount;
$grandtshipping+=$tshipping;
} ?>

<tr>
    <th colspan="4" style="text-align:right;">Tạm Tính</th>
    <th><?php echo htmlentities(round($grandtotalamount,2));?></th>
    <th><?php echo htmlentities(round($grandtshipping,2));?></th>
</tr>
<tr>
    <th colspan="4" style="text-align:right;">Tổng Số Tiền</th>
    <th colspan="2" style="text-align:center;"><?php echo htmlentities(round($grandtotalamount+$grandtshipping,2));?></th>
</tr>
                                </table></div>

<!-- Order Track/Action History --->
<?php 
$query=mysqli_query($con,"SELECT remark,status,postingDate,tbladmin.username FROM `ordertrackhistory`
join tbladmin on tbladmin.id=ordertrackhistory.actionBy
    where (ordertrackhistory.orderId='$oid')");
$count=mysqli_num_rows($query);
if($count>0){
     ?>
 <div class="col-12">
        <table class="table table-bordered" width="100%">
                                        <tr>
                                            <th colspan="6" style="text-align:center;">Quá Trình Xử Lý</th>
                                        </tr>
                                        <tr>
                                            <th>Mô Tả</th>
                                            <th>Tình Trạng</th>
                                            <th>Tạo Bởi</th>
                                            <th>Ngày Tạo</th>
                                        </tr>
<?php 
while($row=mysqli_fetch_array($query))
{
?>  

<tr>
<td><?php echo htmlentities($row['remark']);?></td>
<td><?php echo htmlentities($row['status']);?></td>
<td><?php echo htmlentities($row['username']);?></td>
<td><?php echo htmlentities($row['postingDate']);?></td>
             
</tr>
<?php } ?>

</table></div>
<?php } ?>



<?php if($ostatus==''|| $ostatus=='Đã Xác Nhận' || $ostatus=='Đã Thanh Toán' || $ostatus=='Đã Giao Vận Chuyển' || $ostatus=='Đang Giao'): ?>
<div style="text-align:center;"><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Cập Nhật Tình Trạng</button>
</div>
<?php endif;?>


<div style="float:right;">
  <button class="btn btn-primary" style="cursor: pointer;"  OnClick="CallPrint(this.value)">In Hóa Đơn</button></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>
                </footer>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
<form method="post" name="takeaction">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Tình Trạng Đơn Hàng</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<p><select name="ostatus" class="form-control" required>
    <option value="">Chọn</option>
    <?php if($ostatus==''): ?>
        <option value="Cancelled">Hủy Đơn</option>
    <option value="Đã Xác Nhận">Đã Xác Nhận</option>
    <option value="Đã Thanh Toán">Đã Thanh Toán</option>
    <option value="Đã Giao Vận Chuyển">Đã Giao Cho Vận Chuyển</option>
     <option value="Đang Giao">Đã Lấy Hàng / Đang Giao</option>
    <option value="Đã Giao">Đã Giao</option>
    <?php elseif($ostatus=='Đã Xác Nhận'):?>
        <option value="Đã Thanh Toán">Đã Thanh Toán</option>
    <option value="Đã Giao Vận Chuyển">Đã Giao Vận Chuyển</option>
     <option value="Đang Giao">Đang Giao</option>
    <option value="Đã Giao">Đã Giao Hàng</option>
   <?php elseif($ostatus=='Đã Thanh Toán'):?>
     <option value="Đã Giao Vận Chuyển">Đã Giao Cho Vận Chuyển</option>
     <option value="Đang Giao">Đã Lấy Hàng / Đang Giao</option>
    <option value="Đã Giao">Đã Giao</option>
    <?php elseif($ostatus=='Đã Giao Vận Chuyển'):?>
     <option value="Đang Giao">Đã Lấy Hàng / Đang Giao</option>
    <option value="Đã Giao">Đã Giao</option>
    <?php elseif($ostatus=='Đang Giao'):?>
        <option value="Đã Giao">Đã Giao</option>
        <?php endif;?>
</select></p>
<p>
<textarea class="form-control" required name="remark" placeholder="Mô Tả"></textarea></p>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button>
                <button class="btn btn-primary" type="submit" name="takeaction">Lưu Lại</button></div>
        </div>
    </form>
    </div>
</div>
</div>

        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
               <script>
function CallPrint(strid) {
var prtContent = document.getElementById("print");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
}

</script>
    </body>
</html>
<?php } ?>
