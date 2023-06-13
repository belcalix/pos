<?php
session_start();
include('../includes/config.php');
error_reporting(0);
include('includes/header.php');
if(isset($_SESSION['admin']))
  {
      echo "<script>window.location='home.php'</script>";
  }
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
                    <a href="register.php" class="btn btn-secondary btn-lg" style="border-radius: 0px;font-size: 20px;font-weight: bold;">Sign up</a>
                    <a href="index.php" style="border-radius: 0px;font-size: 20px;font-weight: bold;" class="btn btn-danger btn-lg">Log In</a>
                </div>
                <div class="text-center">
                    <h1>Registered Employees</h1>
                    <p>If you have an account, sign in with your email address.</p>
                </div>
                    <form id="request" class="main_form" method="POST">
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="form_control" placeholder="Email Address" type="email" name="employee">
                            </div>
                            <div class="col-md-12">
                                <input class="form_control" placeholder="Password" type="password" name="password">
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
        $employee = $_POST['employee'];
        $password = md5($_POST['password']);
        $query = "SELECT * FROM users WHERE email = '$employee' AND password = '$password'";
        $result = mysqli_query($con,$query);
        $num = mysqli_num_rows($result);
        if($num == 1){
            $_SESSION['admin'] = $employee;
            echo "<script>window.location.href='home.php'</script>";
            
        }
        else{
            echo "<script>alert('Invalid Employee ID or Password')</script>";
        }
    }
    ?>
    <!-- end about -->
    <!--  footer -->
    <?php 
    include ('includes/footer.php');
    ?>