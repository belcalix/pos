<?php 
session_start();
include('includes/config.php');
error_reporting(0);
include('includes/header.php');
?>
<!-- end loader -->
        <!-- header -->
        <header class="header-area">
            <div class="container-fluid">
                <div class="row d_flex">
                    <div class=" col-md-2 col-sm-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="images/logo.png" alt="#" width="150" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-9">
                        <div class="navbar-area">
                            <nav class="site-navbar">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="shop.php">Online Store</a></li>
                                    <li><a class="active" href="login.php">Login/Register</a></li>
                                </ul>
                                <button class="nav-toggler">
                           <span></span>
                           </button>
                            </nav>
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
                        <h2 class="text-black" style="color: black;">CUSTOMER LOGIN</h2>
                    </div>
                </div>
                <div class="col-md-8 mx-auto" style="border: solid 0.7em rgba(0,0,0,0.3);padding: 50px;">
                <div class="btns text-center my-5">
                    <a href="register.php" class="btn btn-secondary btn-lg" style="border-radius: 0px;font-size: 20px;font-weight: bold;">Sign up</a>
                    <a href="index.php" style="border-radius: 0px;font-size: 20px;font-weight: bold;" class="btn btn-danger btn-lg">Log In</a>
                </div>
                <div class="text-center">
                    <h1>Registered Customer</h1>
                    <p>If you have an account, sign in with your email address.</p>
                </div>
                    <form id="request" class="main_form" method="POST">
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="form_control" placeholder="Username" type="text" name="employee">
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
        $password = $_POST['password'];
        $query = "SELECT * FROM clients WHERE username = '$employee' AND password = '$password'";
        $result = mysqli_query($con,$query);
        $num = mysqli_num_rows($result);
        if($num == 1){
            $_SESSION['email'] = $employee;
            echo "<script>window.location.href='index.php'</script>";
            
        }
        else{
            echo "<script>alert('Invalid Customer ID or Password')</script>";
        }
    }
    ?>
    <!-- end about -->
    <!--  footer -->
    <?php 
    include ('includes/footer.php');
    ?>