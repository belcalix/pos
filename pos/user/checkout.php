<?php
session_start();
include('includes/config.php');
error_reporting(0);
include('includes/header.php');
$id = $_SESSION['email'];
$user = mysqli_query($con,"SELECT * FROM customers WHERE email = '$id'");
$row = mysqli_fetch_array($user);
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
                                <li><a class="active" href="shop.php">Meats</a></li>
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
                <h1 style="color:#bf1313" class="font-weight-bold">Checkout</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <p>Personal Details</p>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['firstname'].' '.$row['lastname']; ?>" placeholder="Enter Name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter Email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['contact_info']; ?>" placeholder="Enter Phone" readonly>
                            </div>
                            
                            <p>Payment Options</p>
                            <div class="form-group">
                                <label>Payments may be made by depositing to the following bank accounts:</label>
                                <select class="form-control" name="payment_method">
                                    <option value="" readonly>Select Payment Method</option>
                                    <option value="Cash On Delivery">Cash On Delivery</option>
                                    <option value="GCash">GCash</option>
                                    <option value="BPI">BPI</option>
                                    <option value="BDO">BDO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Payment Details:</label>
                                <p><b>Gcash </b><br>
                                    Account Name: JOHN PAUL A.<br>
                                    Account Number: 09175134495<br>
                            </p>
                                <p><b>BPI (Savings Account) </b><br>
                                    Account Name: PAUL JOHN AGDON<br>
                                    Account Number: 1889219579<br>
                            </p>
                                <p><b>BDO (Savings Account) </b><br>
                                    Account Name: PAUL JOHN AGDON<br>
                                    Account Number: 006860044321<br>
                            </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <p>Delivery Details</p>
                            <div class="form-group">
                                <label for="delivery">Delivery Method</label>
                                <select class="form-control" id="delivery" name="delivery">
                                    <option value="Deliver">Deliver</option>
                                    <option value="Collect">Collect</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="courier">Courier Option</label>
                                <select class="form-control" id="courier" name="courier">
                                    <option value="Grab Express">Grab Express</option>
                                    <option value="Lalamove">Lalamove</option>
                                    <option value="Toktok">Toktok</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" required>
                            </div>
                            <div class="form-group">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip" required>
                                        </div>
                            <div class="form-group">
                                <label for="notes">Special Instructions</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Enter Notes"></textarea>
                                        </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                        </div>
                        </div>
                        </div>

                </form>
            </div>
        </div>
        </div>
        
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 style="color:#bf1313" class="font-weight-bold">Review your order below</h1>
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
                            $cart = mysqli_query($con, "SELECT * FROM cart WHERE order_id = '".$_SESSION['cart']."'");
                            if(mysqli_num_rows($cart) > 0){
                                while($row = mysqli_fetch_array($cart)){
                                    $product = mysqli_query($con, "SELECT * FROM products WHERE id = '".$row['product_id']."'");
                                    $product = mysqli_fetch_array($product);
                                    ?>
                                    <tr>
                                        <td class="d-flex">
                                            <img src="images/<?php echo $product['photo']; ?>" alt="#" width="100" />
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
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

        <!--  footer -->
        <?php
        include('includes/footer.php');
        ?>
        <?php 
        if(isset($_POST['submit'])){
            $order_id = $_SESSION['cart'];
            $delivery = $_POST['delivery'];
            $courier = $_POST['courier'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $country = $_POST['country'];
            $zip = $_POST['zip'];
            $notes = $_POST['notes'];
            $date = date('Y-m-d');
            $time = date('H:i:s');
            $status = "Pending";
            $total = $grandtotal['total'];
            $user_id = $_SESSION['user_id'];

            

        ?>