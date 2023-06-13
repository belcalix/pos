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
                                    <li><a class="active" href="index.php">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="shop.php">Online Store</a></li>
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
                            <source srcset="images/hero-section.jpg" class="img-fluid">

                            <img srcset="images/hero-section.jpg" alt="responsive image" class="home-banner img-fluid d-block">
                        </picture>
                        <div class="carousel-caption" style="top: 25% !important;">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="slider_content">
                                            <h1 class="header-text text-white" style="color: #3c73a8 !important">SJ Renewable Energy</h1>
                                            <h1 class="sub-text text-bold">
                                             Let nature power your HOME
                                            </h1>
                                            <a href="shop.php" class="btn btn-success bg-success btn-shop-now">SHOP NOW</a>
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
    <!-- about -->
    <div class="about">
        <div class="container">
            <div class="row d_flex">
                <div class="col-lg-12 col-md-12">
                    <div class="titlepage text-center">
                        <img src="images/img.png" class="img-fluid">
                    </div>
                </div>
            </div>
    </div>
    </div>
    <!-- end about -->
    <!-- services -->
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage text-center">
                        <h2>Latest Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                $prod = "SELECT * FROM products ORDER BY id DESC LIMIT 0,3";
                $prod_res = mysqli_query($con, $prod);
                while($prod_row = mysqli_fetch_array($prod_res)){
                ?>
                <div class="col-md-4">
                    <div class="services_box_main">
                        <div class="services_box text_align_center">
                            <figure>
                            <a href="details.php?product=<?php echo $prod_row['id']; ?>">
                            <?php 
                            if($prod_row['image'] == ""){
                                ?>
                                    <img src="https://sjrenewableenergy.online/public/images/products/no-image.png" class="img-fluid" alt="#" />
                                    <?php 

                            } else {
                            ?>
                                <img src="https://sjrenewableenergy.online/public/images/products/<?php echo $prod_row['image']; ?>" class="img-fluid" alt="#" />
                                <?php 
                            } ?>
                                </a>
                            </figure>
                            <div class="veget">
                                <h3><?php echo $prod_row['name'] ?>
                                </h3>
                                <p class="text-center"><b>P <?php echo number_format($prod_row['price'],2); ?></b></p>
                            </div>
                            <?php 
                            if(isset($_SESSION['email'])){
                            ?>
                            <a class="read_more w-100" href="add-to-cart.php?id=<?php echo $prod_row['id']; ?>&price=<?php echo $prod_row['price'] ?>">Add to cart</a>
                            <?php } else {
                            ?>
                            <a class="read_more w-100" href="login.php">Login to add cart</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- end services -->
    <!-- choose -->
    <div class="choose mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage text_align_center">
                        <h2><i>How to order from us?</i></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="point text_align_center">
                        <img src="images/Add to Cart Icon.png" class="img-fluid" width="200">
                        <span>Add To Cart</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="point text_align_center">
                        <img src="images/Checkout Icon.png" class="img-fluid" width="200">
                        <span>Checkout</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="point text_align_center">
                        <img src="images/Payment Icon.png" class="img-fluid" width="200">
                        <span>Payment</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="point text_align_center">
                        <img src="images/Shipping Icon.png" class="img-fluid" width="200">
                        <span>Shipping</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- choose -->
    <?php 
    include ('includes/footer.php');
    ?>