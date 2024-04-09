<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$contactno=$_POST['contactnumber'];
$mess=$_POST['inputmess'];
$sql=mysqli_query($con,"select id from contact where email='$email'");
$count=mysqli_num_rows($sql);
if($count==0){
$query=mysqli_query($con,"insert into contact(name,email,contactno,mess) values('$name','$email','$contactno','$mess')");
}}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shopping Portal | Contact us</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
       <!--  <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
    </head>
    <script>
        function emailAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_availability.php",
        data:'email='+$("#emailid").val(),
        type: "POST",
        success:function(data){
        $("#contact-email-status").html(data);
        $("#loaderIcon").hide();
        },
        error:function (){}
        });
        }
    </script>
    <body>
<?php include_once('includes/header.php');?>
        <!-- Header-->
        <header class="bg-dark py-5 login-background">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">CONTACT US</h1>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div style="width:100%">
                        <table class="table" style="color: #fff;">
                        <tr>
                            <th width="200">Địa Chỉ</th>
                            <td width="500">69 Đường Trần Duy Hưng,<br />
                            Trung Hòa, Cầu Giấy<br />
                            Hà Nội
                            </td>
                        </tr>
                    <tr>
                            <th>Điện Thoại</th>
                            <td>699669969696</td>
                        </tr>
                    <tr>
                            <th>Email</th>
                            <td>gundam69@gmail.com</td>
                        </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5" style="padding-bottom: 0 !important">
            <div class="container px-4  mt-5 login--custom" style="margin-bottom: 48px;max-width: 1280px;">
<form method="post" name="signup" class="login-form--custom">
     <div class="row mt-3 row--edit">
         <div class="col-login"><input type="text" name="fullname" class="form-control" placeholder="Full Name" required ></div>
     </div>
       <div class="row mt-3 row--edit">
         <div class="col-login"><input type="email" name="emailid" id="emailid" class="form-control" placeholder="Email" onBlur="emailAvailability()" required>
 <span id="contact-email-status" style="font-size:12px;"></span>
         </div>
          
     </div>

       <div class="row mt-3 row--edit">
         <div class="col-login"><input type="text" name="contactnumber" pattern="[0-9]{10}" title="10 numeric characters only" class="form-control" placeholder="Contact Numeber" required></div>
     </div>

          <div class="row mt-3 row--edit">
         <div class="col-login"><input type="text" name="inputmess" class="form-control" placeholder="Message" required></div>
     </div>

               <div class="">
         <div class="submit-login" style="padding: 20px;"><input type="submit" name="submit" id="submit" class="btn-design-5" required></div>
     </div>
 </form>
              
            </div>

 
</div>
   
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <?php include_once('includes/footer.php'); ?>
</html>
