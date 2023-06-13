<?php
session_start();
include('includes/config.php');
error_reporting(0);
include('includes/header.php');
?>
<!-- end loader -->
<div class="full_bg">
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
                                <li><a href="shop.php">Meats</a></li>
                                <li><a href="faq.php">FAQS</a></li>
                                <li><a class="active" href="contact.php">Contact Us</a></li>
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
                                                $cart = mysqli_query($con,"SELECT * FROM cart WHERE order_no = '".$_SESSION['cart']."'");
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
    <!-- top -->
    <div class="slider_main">
        <!-- carousel code -->
        <div id="banner1" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
            <ol class="carousel-indicators">
                <li data-target="#banner1" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <picture>
                        <source srcset="images/about-banner.png" class="img-fluid">

                        <img srcset="images/about-banner.png" alt="responsive image" class="about-banner img-fluid d-block">
                    </picture>
                    <div class="carousel-caption" style="top: 25% !important;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slider_content">
                                        <h1 class="header-text">PENNY FOR YOUR THOUGHTS</h1>
                                        <h1 class="sub-text text-bold">
                                            Contact Us
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.carousel-item -->
                </div>
            </div>
        </div>
    </div>
    <!-- end banner -->
<!-- contact -->
<div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage text_align_center">
                        <span>Our Contact</span>
                        <h2 class="text-black" style="color: black;">We'd love to hear from you!</h2>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2">
                    <form id="request" class="main_form">
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="form_control" placeholder="Your Name" type="type" name=" Name">
                            </div>
                            <div class="col-md-12">
                                <input class="form_control" placeholder="Phone Number" type="type" name="Phone Number">
                            </div>
                            <div class="col-md-12">
                                <input class="form_control" placeholder="Your Email" type="type" name="Email">
                            </div>
                            <div class="col-md-12">
                                <input class="textarea" placeholder="Message" type="type" name="message">
                            </div>
                            <div class="col-md-12">
                                <div class="group_btn">
                                    <button class="send_btn">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-md-12 ">
                    <div class="titlepage text_align_center">
                        <h2 class="text-black" style="color: black;">Get in Touch</h2>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="text-center text-black">
                        <i class="fa fa-envelope fa-5x" style="background: black;padding: 20px 40px;border-radius: 50px;color: white;" aria-hidden="true"></i><br>
                        <h2 class="pt-2">pitarsons@gmail.com</h2>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-center">
                        <i class="fa fa-phone fa-5x" style="background: black;padding: 20px 40px;border-radius: 50px;color: white;" aria-hidden="true"></i><br>
                        <h2 class="pt-2">09123456789</h2>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-center">
                        <i class="fa fa-facebook fa-5x" style="background: black;padding: 20px 40px;border-radius: 50px;color: white;" aria-hidden="true"></i><br>
                        <h2 class="pt-2">Pit Arsons</h2>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-center">
                        <i class="fa fa-instagram fa-5x" style="background: black;padding: 20px 40px;border-radius: 50px;color: white;" aria-hidden="true"></i><br>
                        <h2 class="pt-2">@Pit_Arsons</h2>
                    </div>
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
    <!-- end about -->
    <!--  footer -->
    <?php 
    include ('includes/footer.php');
    ?>