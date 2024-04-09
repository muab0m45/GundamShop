<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

if(isset($_GET['del']))
{
mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='manage-products.php'</script>";
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
        <title>Gundam Shop | Quản Lý Sản Phẩm</title>
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
                        <h1 class="mt-4">Quản Lý Sản Phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Điều Khiển</a></li>
                            <li class="breadcrumb-item active">Quản Lý Sản Phẩm</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Danh Sách Sản Phẩm
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Danh Mục</th>
                                            <th>Danh Mục Con</th>
                                            <th>Ngày Tạo</th>
                                            <th>Cập Nhật Lần Cuối</th>
                                            <th>Tạo Bởi</th>
                                            <th>Xử Lý</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Danh Mục</th>                                           
                                            <th>Danh Mục Con</th>
                                            <th>Ngày Tạo</th>
                                            <th>Cập Nhật Lần Cuối</th>
                                            <th>Tạo Bởi</th>
                                            <th>Xử Lý</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"select products.id as pid,products.productImage1,products.productName,category.categoryName,subcategory.subcategoryName as subcatname,products.postingDate,products.updationDate,subcategory.id as subid,tbladmin.username from products join subcategory on products.subCategory=subCategory.id join category on products.category=category.id join tbladmin on tbladmin.id=products.addedBy order by pid desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>  

                                <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><img src="productimages/<?php echo htmlentities($row['productImage1']);?>" width="120">

                                                <?php echo htmlentities($row['productName']);?></td>
                                            <td><?php echo htmlentities($row['categoryName']);?></td>
                                            <td><?php echo htmlentities($row['subcatname']);?></td>
                                            <td> <?php echo htmlentities($row['postingDate']);?></td>
                                            <td><?php echo htmlentities($row['updationDate']);?></td>
                                            <td><?php echo htmlentities($row['username']);?></td>
                                            <td>
                                            <a href="edit-product.php?id=<?php echo $row['pid']?>"><i class="fas fa-edit"></i></a> | 
                                            <a href="manage-products.php?id=<?php echo $row['subid']?>&del=delete" onClick="return confirm('Xác Nhận Xóa?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                       
                                    </tbody>
                                </table>
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
