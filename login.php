<?php session_start();
error_reporting(0);
include_once('includes/config.php');
// Code for User login
if(isset($_POST['login']))
{
   $email=$_POST['emailid'];
   $password=md5($_POST['inputuserpwd']);
$query=mysqli_query($con,"SELECT id,name FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
//If Login Suceesfull
if($num>0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
echo "<script type='text/javascript'> document.location ='index.php'; </script>";
}
//If Login Failed
else{
    echo "<script>alert('Invalid login details');</script>";
    echo "<script type='text/javascript'> document.location ='login.php'; </script>";
exit();
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Đăng Nhập | Gundam Shop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/jquery.min.js"></script>
       <!--  <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
    </head>
<style type="text/css">
    input { border:solid 1px #000;

    }

</style>
    <body>
<?php include_once('includes/header.php');?>
        <!-- Header-->
        <header class="bg-dark py-5 login-background login-overlay">
            <div class="container px-4 px-lg-5 my-5">


                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">LOGIN</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Yêu Cầu Đăng Nhập Để Đặt Hàng</p>
                </div>

            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4  mt-5 login--custom">
     

<form method="post" name="login" class="login-form--custom">

       <div class="row mt-3 row--edit">
         <div class="col-login"><input type="email" name="emailid" id="emailid" class="form-control" placeholder="Email" onBlur="emailAvailability()" required>
 <span id="user-email-status" style="font-size:12px;"></span>
         </div>
          
     </div>


          <div class="row mt-3 row--edit">
         <div class="col-login"><input type="password" name="inputuserpwd" class="form-control" placeholder="Mật Khẩu" required>
         <small><a href="password-recovery.php">Quên Mật Khẩu?</a></small></div>

     </div>

               <div class="">
         <div class="submit-login" style="padding: 20px;"><input type="submit" name="login" id="login" class="btn-design-5" value="Đăng Nhập" required></div>
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
    </body>
</html>
