<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gundam Shop | Tìm Kiếm Đơn Hàng</title>
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
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tìm Kiếm Đơn Hàng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Điều Khiển</a></li>
                            <li class="breadcrumb-item active">Tìm Kiếm Đơn Hàng</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Danh Sách Đơn Hàng
                            </div>
                            <div class="card-body">

<?php
if(isset($_POST['search'])){
$searchinput=$_POST['searchinputdata'];
?>
<h4 align="center" style="color:blue !important;">Kết Quả Tìm Kiếm: <?php echo $searchinput;?></h4>
<hr />
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Khách Hàng</th>
                                            <th>Tổng Số Tiền</th>
                                            <th>Ngày Đặt</th>
                                            <th>Tình Trạng</th>
                                            <th>Xử Lý</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Khách Hàng</th>
                                            <th>Tổng Số Tiền</th>
                                            <th>Ngày Đặt</th>
                                            <th>Tình Trạng</th>
                                            <th>Xử Lý</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"SELECT orders.id,orderNumber,totalAmount,orderStatus,orderDate,users.name,users.contactno 
    FROM `orders` join users on users.id=orders.userId where (users.name like '%$searchinput%' || orders.orderNumber like '%$searchinput%')");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>  

                                <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['orderNumber']);?></td>
                                            <td><?php echo htmlentities($row['name']);?></td>
                                            <td> <?php echo htmlentities($row['totalAmount']);?></td>
                                            <td><?php echo htmlentities($row['orderDate']);?></td>
                                            <td><?php echo htmlentities($row['orderStatus']);?></td>
                                            <td>
                                            <a href="order-details.php?orderid=<?php echo $row['id']?>" target="_blank">
                                                <i class="fas fa-file fa-2x" title="Xem Chi Tiết Đơn Hàng"></i></a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                       
                                    </tbody>
                                </table>
<?php } ?>

                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
