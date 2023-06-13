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
    <div class="container-fluid bg-white" style="height: 200px;">
        <div class="row">
            &nbsp
        </div>
    </div>
    <!-- end banner -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="shop.php" class="btn btn-link">
                    < Go Back</a>
                        <?php
                        $product = $_GET['product'];
                        $sql = "SELECT * FROM products WHERE id = '$product'";
                        $query = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($query);

                        ?>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-details-img">
                    <div class="product-details-tab">
                        <div class="product-details-large tab-content">
                            <div class="tab-pane active text-right" id="pro-details1">
                            <?php 
                            if($row['image'] == ""){
                                ?>
                                    <img src="https://sjrenewableenergy.online/public/images/products/no-image.png" width="300" class="img-fluid" alt="#" />
                                    <?php 

                            } else {
                            ?>
                                <img src="https://sjrenewableenergy.online/public/images/products/<?php echo $row['image'] ?>" width="300" alt="#" />
                                <?php 
                            } ?>
                        </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-details-content text-center">
                    <h1 class="font-weight-bold display-4"><?php echo $row['name']; ?></h1>
                    <div class="product-price text-center">
                        <h1 style="font-size: 3em;">Php <?php echo number_format($row['price'], 2); ?></h1>
                    </div>
                    <form method="POST">
                    <div class="product-variants text-center mt-5">
                        <div class="input-group" style="padding-left: 15em;">
                            <input type="button" value="-" class="button-minus" data-field="quantity" style="background: #ff9470;color: white;">
                            <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field">
                            <input type="button" value="+" class="button-plus" data-field="quantity" style="background: #ff9470;color: white;">
                            
                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        </div>

                        <div class="add-to-cart text-center mt-5">
                        <?php 
                            if(isset($_SESSION['email'])){
                            ?>
                            <input type="submit" name="addtocart" value="Add to Cart" class="btn btn-warning btn-lg" />
                            <?php } else {
                            ?>
                            <a href="login.php" class="btn btn-danger btn-lg">Login to add cart</a>
                            <?php } ?>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
            <br><br>
            <div class="col-12">
                <h1 class="font-weight-bold text-warning">Description</h1>
                <p><?php echo $row['description']; ?></p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="text-center col-lg-12">
                <h1>You may also like</h1>
            </div>
            <?php
            $feature = mysqli_query($con, "SELECT * FROM products ORDER BY RAND() LIMIT 3");
            while ($row = mysqli_fetch_array($feature)) {
            ?>

                <div class="col-md-4">
                    <div class="services_box_main">
                        <div class="services_box text_align_center">
                            <figure>
                                <a href="details.php?product=<?php echo $row['id']; ?>">
                                
                            <?php 
                            if($row['image'] == ""){
                                ?>
                                    <img src="https://sjrenewableenergy.online/public/images/products/no-image.png" class="img-fluid" alt="#" />
                                    <?php 

                            } else {
                            ?>
                                <img src="https://sjrenewableenergy.online/public/images/products/<?php echo $row['image'] ?>" alt="#" />
                                <?php 
                            } ?>
                                </a>
                            </figure>
                            <div class="veget">
                                <h3><?php echo $row['name']; ?>
                                </h3>
                                <p class="text-center"><br><b>P <?php echo $row['price']; ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        </div>
        <?php 
        if(isset($_POST['addtocart'])){
            $prod_id = $_POST['id'];
            $user_email = $_SESSION['email'];
            $price = $_POST['price'];
            if(isset($_SESSION['cart'])){
            $order_id = $_SESSION['cart'];
            } else {
                $_SESSION['cart'] = substr(md5(mt_rand()), 0, 6);
                $order_id = $_SESSION['cart'];
            }
            $quantity = '1';
            $check_cart = mysqli_query($con,"SELECT * FROM cart WHERE product_id = '$prod_id' AND order_id = '$order_id'");
            if(mysqli_num_rows($check_cart) >= 1){
                $quan = mysqli_fetch_array($check_cart);
                $add = $quan['quantity'] + 1;
                $cart_id = $quan['cart_id'];
                $update = mysqli_query($con,"UPDATE cart SET quantity = '$add' WHERE cart_id = '$cart_id'");
                ?>
                <script>
                    alert('Cart updated! Quantity added.');
                    window.location.href = "shop.php"
                </script>
                <?php
            } else {
        
            $insert_cart = mysqli_query($con,"INSERT into cart(order_id,user_email,product_id,quantity,price,checkout) VALUES ('$order_id','$user_email','$prod_id','1','$price','0')");
            if($insert_cart){
                ?>
                <script>
                    alert('Product added to cart!');
                    window.location.href = "shop.php"
                    </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Product not added to cart!');
                    window.location.href = "shop.php"
                    </script>
                <?php
        
            }
        }
        }
        ?>
        <!--  footer -->
        <?php
        include('includes/footer.php');
        ?>