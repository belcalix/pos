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
                                <li><a class="active" href="shop.php">Online Store</a></li>
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
    <!-- top -->
    <!-- end banner -->
    <!-- about -->
    <div class="about mt-5">
        <div class="container-fluid" style="margin-top: 200px;">
            <div class="row h-100">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h1 class="display-4 font-weight-bold" style="color: #ff9470">Categories</h1>
                    <Br><br>
                    <a href="shop.php"><button class="btn btn-outline-dark btn-lg btn-block text-left border-right-0 border-left-0" style="border-radius: 0px;border: solid 2px #ff9470">All</button></a>
                    <?php 
                    $category = mysqli_query($con,"SELECT * FROM categories ORDER by name ASC");
                    while($row = mysqli_fetch_array($category)){
                        $id = $row['id'];
                        $name = $row['name'];
                        echo '<a href="shop.php?category='.$id.'"><button class="btn btn-outline-dark btn-lg btn-block text-left border-right-0 border-left-0" style="border-radius: 0px;border: solid 2px #bf1313">'.$name.'</button></a>';
                    }
                    ?>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <?php 
                    if(!isset($_GET['category'])){
                        echo "<h1 class='display-4 font-weight-bold' style='color: #ff9470'>All Products</h1>";
                    } else {
                        $category = $_GET['category'];
                        $category_name = mysqli_query($con,"SELECT * FROM categories WHERE id = '$category'");
                        $row = mysqli_fetch_array($category_name);
                        $name = $row['name'];
                        echo "<h1 class='display-4 font-weight-bold' style='color: #ff9470'>".$name."</h1>";
                    }
                    ?>
                    <?php 
                    if(!isset($_GET['category'])){
                        $products = mysqli_query($con,"SELECT * FROM products ORDER by id DESC");
                    } else {
                        $category = $_GET['category'];
                        $products = mysqli_query($con,"SELECT * FROM products WHERE category_id = '$category' ORDER by id DESC");
                    }
                    while($row = mysqli_fetch_array($products)){
                        $id = $row['id'];
                        $name = $row['name'];
                        $price = $row['price'];
                        if($row['image'] == ""){
                            $image = "no-image.png";

                        } else {
                        $image = $row['image'];
                    }
                        $category = $row['category_id'];
                        $description = $row['description'];
                        $category_name = mysqli_query($con,"SELECT * FROM categories WHERE id = '$category'");
                        $category_name = mysqli_fetch_array($category_name);
                        $category_name = $category_name['name'];
                        echo '<div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="https://sjrenewableenergy.online/public/images/products/'.$image.'" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">'.$name.'</h2>
                                    <p class="card-text">'.$category_name.'</p>
                                    <p class="card-text">
                                        <p class="text-muted">P '.$price.'</p>
                                    </p>
                                    <a href="details.php?product='.$id.'" class="btn btn-lg text-left btn-warning">View Item</a>
                                </div>
                            </div>
                        </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->

    
    <!--  footer -->
    <?php 
    include ('includes/footer.php');
    ?>