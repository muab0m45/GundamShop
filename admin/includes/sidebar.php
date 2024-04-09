            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Trang Chủ</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Điều Khiển
                            </a>
                            <div class="sb-sidenav-menu-heading">Sản Phẩm</div>

                            <!--Categories --->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Danh Mục
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-category.php">Thêm</a>
                                    <a class="nav-link" href="manage-categories.php">Quản Lý</a>
                                </nav>
                            </div>

<!--- Sub-Categories --->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#subcat" aria-expanded="false" aria-controls="subcat">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Danh Mục Con
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="subcat" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-subcategories.php">Thêm</a>
                                    <a class="nav-link" href="manage-subcategories.php">Quản Lý</a>
                                </nav>
                            </div>

<!--- Products --->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="product">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Sản Phẩm
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="product" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-product.php">Thêm</a>
                                    <a class="nav-link" href="manage-products.php">Quản Lý</a>
                                </nav>
                            </div>



                            <div class="sb-sidenav-menu-heading">Đơn Hàng</div>
                   <!--- Products --->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#orders" aria-expanded="false" aria-controls="orders">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                              Danh Sách
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="orders" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
<?php $ret=mysqli_query($con,"select count(id) as totalorders,
count(if((orderStatus='' || orderStatus is null),0,null)) as neworders,
count(if(orderStatus='Packed', 0,null)) as packedorders,
count(if(orderStatus='Dispatched',  0,null)) as dispatchedorders,
count(if(orderStatus='In Transit',  0,null)) as intransitorders,
count(if(orderStatus='Out For Delivery', 0,null)) as outfdorders,
count(if(orderStatus='Delivered', 0,null)) as deliveredorders,
count(if(orderStatus='Cancelled', 0,null)) as cancelledorders
from orders;");
$results=mysqli_fetch_array($ret);
$torders=$results['totalorders'];
$norders=$results['neworders'];
$porders=$results['packedorders'];
$dtorders=$results['dispatchedorders'];
$intorders=$results['intransitorders'];
$otforders=$results['outfdorders'];
$deliveredorders=$results['deliveredorders'];
$cancelledorders=$results['cancelledorders'];
?>           <a class="nav-link" href="all-orders.php">Tất Cả &nbsp <span style="color:#fff"> [<?php echo $torders;?>]</span></a>
            <a class="nav-link" href="new-order.php">Mới &nbsp<span style="color:#fff"> [<?php echo $norders;?>]</span></a>
            <a class="nav-link" href="packed-orders.php">Đã Xác Nhận &nbsp<span style="color:#fff"> [<?php echo $porders;?>]</span></a>
            <a class="nav-link" href="dispatched-orders.php">Đã Thanh Toán &nbsp<span style="color:#fff"> [<?php echo $dtorders;?>]</span></a>
            <a class="nav-link" href="intransit-orders.php">Giao Vận Chuyển &nbsp<span style="color:#fff"> [<?php echo $intorders;?>]</span></a>
            <a class="nav-link" href="outfordelivery-orders.php">Đang Giao &nbsp<span style="color:#fff"> [<?php echo $otforders;?>]</span></a>
            <a class="nav-link" href="delivered-orders.php">Đã Giao &nbsp<span style="color:#fff"> [<?php echo $deliveredorders;?>]</span></a>
            <a class="nav-link" href="cancelled-orders.php">Đã Hủy &nbsp<span style="color:#fff"> [<?php echo $cancelledorders;?>]</span></a>
                                </nav>
                            </div>



  <div class="sb-sidenav-menu-heading">Thống Kê</div>
       <a class="nav-link" href="registered-users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Khách Hàng
                            </a>
                            <a class="nav-link" href="contact-list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Liên Hệ
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Đăng Nhập Quyền:</div>
                        <?php echo $_SESSION['alogin'];?>
                    </div>
                </nav>
            </div>