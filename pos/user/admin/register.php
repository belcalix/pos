<?php
session_start();
include('../includes/config.php');
error_reporting(0);
include('includes/header.php');
?>
<!-- end loader -->
    <!-- header -->
    <header class="header-area">
        <div class="container-fluid" style="height: 150px;">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="logo">
                        <a href="index.php">
                            <img src="../images/logo.png" alt="#" width="150" />
                        </a>
                    </div>
                </div>
                <div class="col-md-1 padd_0 d_none">
                    <ul class="email text_align_right">
                            <li>
                            <a href="shopping-cart.php">
                                    <i class="fa fa-shopping-cart" aria-hidden="true">
                                        <div class="badge">
                                            <?php 
                                            if(isset($_SESSION['cart'])){
                                                $cart = mysqli_query($con,"SELECT * FROM cart WHERE order_id = '".$_SESSION['cart']."'");
                                                $count = mysqli_num_rows($cart);
                                                echo $count;
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                    </i>
                           </a>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end banner -->
<!-- contact -->
<div class="contact" style="margin-top: 10em;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage text_align_left">
                        <span>Sign In</span>
                        <h2 class="text-black" style="color: black;">EMPLOYEE LOGIN</h2>
                    </div>
                </div>
                <div class="col-md-8 mx-auto" style="border: solid 0.7em rgba(0,0,0,0.3);padding: 50px;">
                <div class="btns text-center my-5">
                    <a href="register.php" class="btn btn-danger btn-lg" style="border-radius: 0px;font-size: 20px;font-weight: bold;">Sign up</a>
                    <a href="index.php" style="border-radius: 0px;font-size: 20px;font-weight: bold;" class="btn btn-secondary btn-lg">Log In</a>
                </div>
                <div class="text-center py-2">
                    <h1>Create an Account</h1>
                </div>
                    <form id="request" class="main_form" method="POST">
                        <div class="row">
                            <div class="col-md-6 ">
                                <input class="form_control" placeholder="First name" type="text" name="fname">
                            </div>
                            <div class="col-md-6 ">
                                <input class="form_control" placeholder="Last name" type="text" name="lname">
                            </div>
                            <div class="col-md-12 ">
                                <input class="form_control" placeholder="Email" type="email" name="email">
                            </div>
                            <div class="col-md-12">
                                <input class="form_control" placeholder="Password" type="password" name="password">
                            </div>
                            <div class="col-md-12">
                                <input class="form_control" placeholder="Confirm Password" type="password" name="cpassword">
                            </div>
                            <div class="col-md-12">
                                <div class="group_btn">
                                    <input type="submit" name="submit" class="send_btn" style="border-radius: 0px; background-color: #bf1313;line-height: 10px">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

    
    <!-- about -->
    <div class="about mt-5 p-5">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
    <?php 
    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if($password == $cpassword){
            $query = "INSERT INTO `users`(`email`,`password`,`type`,`firstname`,`lastname`,`created_on`) VALUES ('$email','".md5($password)."','0','$fname','$lname',NOW())";
            $query_run = mysqli_query($con,$query);
            if($query_run){
                echo '<script>alert("Employee Registered")</script>';
                echo '<script>window.location.href="index.php"</script>';
            }
            else{
                echo '<script>alert("Employee Not Registered")</script>';
            }
        }
        else{
            echo '<script>alert("Password Not Match")</script>';
        }
    }
    ?>
    <!-- end about -->
    <!--  footer -->
    <?php 
    include ('includes/footer.php');
    ?>