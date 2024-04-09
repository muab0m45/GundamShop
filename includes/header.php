        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <!-- <a class="navbar-brand" href="index.php">Shopping Portal</a> -->
                <a href="" class="header-logo">
                    <svg viewBox="0 0 69 45">
					    <path d="M27.143,13.920 L23.072,11.320 C22.861,11.186 22.829,10.893 23.007,10.717 L32.431,1.416 C33.357,0.502 34.858,0.502 35.784,1.416 L37.740,3.346 C37.894,3.498 37.894,3.745 37.740,3.898 L27.637,13.868 C27.505,13.998 27.300,14.020 27.143,13.920 ZM40.203,27.738 L37.923,15.779 C37.875,15.525 37.956,15.265 38.141,15.083 L39.695,13.549 C39.850,13.396 40.100,13.396 40.254,13.549 L40.578,13.869 C40.710,13.999 40.916,14.020 41.072,13.920 L45.144,11.321 C45.355,11.186 45.386,10.893 45.208,10.718 L40.254,5.828 C40.100,5.676 39.850,5.676 39.695,5.828 L30.796,14.611 C30.571,14.834 30.419,15.117 30.360,15.426 L28.013,27.738 C27.965,27.991 28.046,28.251 28.231,28.434 L33.549,33.682 C33.858,33.987 34.358,33.987 34.667,33.682 L39.985,28.434 C40.169,28.251 40.251,27.991 40.203,27.738 ZM25.706,25.079 L27.107,17.726 C27.167,17.414 27.029,17.099 26.760,16.927 L0.306,0.036 C0.144,-0.067 -0.056,0.095 0.015,0.272 L0.166,0.645 C0.206,0.743 0.265,0.833 0.341,0.907 L25.038,25.282 C25.263,25.504 25.647,25.387 25.706,25.079 ZM67.910,0.036 L41.456,16.927 C41.186,17.099 41.049,17.414 41.108,17.726 L42.510,25.079 C42.569,25.387 42.953,25.504 43.178,25.282 L47.381,21.134 C47.535,20.982 47.785,20.982 47.940,21.134 L49.057,22.237 C49.365,22.541 49.365,23.035 49.057,23.340 L34.666,37.543 C34.358,37.847 33.857,37.847 33.549,37.543 L14.967,19.203 C14.813,19.051 14.563,19.051 14.409,19.203 L12.453,21.134 C11.527,22.047 11.527,23.529 12.453,24.443 L32.431,44.161 C33.357,45.074 34.858,45.074 35.784,44.161 L55.762,24.443 C56.688,23.529 56.688,22.047 55.762,21.134 L51.851,17.274 C51.697,17.121 51.697,16.874 51.851,16.722 L67.874,0.907 C67.950,0.833 68.010,0.743 68.050,0.645 L68.201,0.272 C68.272,0.095 68.071,-0.067 67.910,0.036 Z"></path>
				    </svg>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Trang Chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="about-us.php">Về Chúng Tôi</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">CỬA HÀNG</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="allproduct.php">Toàn Bộ Sản Phẩm</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="shop-categories.php">Danh Mục</a></li>
                            </ul>
                        </li>
<?php if($_SESSION['id']==0){?>
          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">NGƯỜI DÙNG</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.php">Đăng Nhập</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="signup.php">Đăng Ký</a></li>
                            </ul>
                        </li>
                                     <li class="nav-item"><a class="nav-link" href="admin/">Quản Trị</a></li>
                    <?php } else {?>
                        <li class="nav-item"><a class="nav-link" href="my-wishlist.php">Yêu Thích</a></li>
                                  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tài Khoản</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="my-orders.php">Đơn Hàng</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="my-profile.php">Thông Tin</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="change-password.php">Đổi Mật Khẩu</a></li>
                                  <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="manage-addresses.php">Địa Chỉ</a></li>
                                  <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="logout.php">Đăng Xuất</a></li>
                            </ul>
                        </li>
                     <?php } ?>  
                      <li class="nav-item"><a class="nav-link" href="contact-us.php">Liên Hệ</a></li> 
        
                    </ul>  
<?php if($_SESSION['id']!=0):?>
<!-- <strong style="color: #fff;">Hello </strong><span></span>&nbsp;<span style="color: #fff";><?php echo $_SESSION['username'];?></span> &nbsp; -->
<?php endif;?>
                    <form class="d-flex">


                        <?php 
$uid=$_SESSION['id'];
                        $ret=mysqli_query($con,"select sum(productQty) as qtyy from cart where userId='$uid'");
$result=mysqli_fetch_array($ret);
$cartcount=$result['qtyy'];
                        ?>
                        <?php if($_SESSION['id']==0){?>
                        <a class="btn-design-2-3" style="margin-right: 9px;" href="login.php">
                            <i class="btn-design-2-3-helper"></i>
                            ĐĂNG NHẬP
                        </a>
                        <?php } else {?>
                            <a class="btn-design-2-3" style="margin-right: 9px;" href="my-profile.php">
                            <i class="btn-design-2-3-helper"></i>
                            TÀI KHOẢN
                        </a>
                        <?php } ?>   
                        <a class="btn-design-2" href="my-cart.php">
                            <i class="btn-design-2-helper"></i>
                            GIỎ HÀNG
                            <?php if($cartcount==0):?>
                            <span class="badge bg-dark text-white ms-1 rounded-pill" style="color: #f8ed1a !important;">0</span>
                        <?php else: ?>
                            <span class="badge bg-dark text-white ms-1 rounded-pill" style="color: #f8ed1a !important;"><?php echo $cartcount; ?></span>
                            <?php endif;?>
                        </a>
                    </form>
                </div>
            </div>
        </nav>