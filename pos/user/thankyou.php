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
                                <li><a href="contact.php">Contact Us</a></li>
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
                                        if (isset($_SESSION['cart'])) {
                                            $cart = mysqli_query($con, "SELECT * FROM cart WHERE order_id = '" . $_SESSION['cart'] . "'");
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
    <div class="container-fluid bg-white" style="height: 200px;">
        <div class="row">
            &nbsp
        </div>
    </div>
    <!-- end banner -->

    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <i class="fa fa-check" aria-hidden="true" style="font-size: 100px;color:green"></i>
                <h1 style="color:#000;font-size: 30px" class="font-weight-bold">Thank you! You have successfully placed your order.
                </h1>
                <p>You will receive an email confirmation shortly.</p>
                <a href="index.php" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">

            </div>
        </div>
    </div>

    <!--  footer -->
    <?php
    include('includes/footer.php');
    ?>