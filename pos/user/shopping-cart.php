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

    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="font-weight-bold text-warning">Shopping Cart</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(isset($_SESSION['cart'])){
                            $cart = mysqli_query($con, "SELECT * FROM cart WHERE order_id = '".$_SESSION['cart']."'");
                            if(mysqli_num_rows($cart) > 0){
                                while($row = mysqli_fetch_array($cart)){
                                    $product = mysqli_query($con, "SELECT * FROM products WHERE id = '".$row['product_id']."'");
                                    $product = mysqli_fetch_array($product);
                                    ?>
                                    <tr>
                                        <td class="d-flex">
                                            <img src="https://sjrenewableenergy.online/public/images/products/<? echo $product['photo']; ?>" alt="#" width="100" />
                                            <p class="pt-4 pl-3 font-weight-bold"><?php echo $product['name']; ?></p>
                                        </td>
                                        <td>
                                            <p>Php <?php echo number_format($product['price'],2); ?></p>
                                        </td>
                                        <td>
                                            <p><?php echo $row['quantity']; ?></p>
                                        </td>
                                        <td>
                                            <p>Php <?php echo number_format($row['quantity'] * $product['price'],2); ?></p>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            
                            ?>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right">
                                        <h3>Total</h3>
                                    </td>
                                    <td>
                                        <h3>Php <?php 
                                        $grandtotal = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(quantity * price) AS total FROM cart WHERE order_id = '".$_SESSION['cart']."'"));
                                        echo number_format($grandtotal['total'],2); ?></h3>
                                    </td>
                                </tr>
                            </tfoot>
                            <?php 
                            } else {
                                echo "<tr><td colspan='4'><h3>No items in cart</h3></td></tr>";
                            } } else {
                                echo "<tr><td colspan='4'><h3>No items in cart</h3></td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <a href="shop.php" class="btn btn-warning">Continue Shopping</a>
                        <?php 
                        if(mysqli_num_rows($cart) > 0){
                            ?>
                            <a href="checkout.php" class="btn btn-success">Checkout</a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!--  footer -->
        <?php
        include('includes/footer.php');
        ?>