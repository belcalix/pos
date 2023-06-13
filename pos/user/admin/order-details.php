<?php
session_start();
include('../includes/config.php');
error_reporting(0);
include('includes/header.php');
if(!isset($_SESSION['admin']))
  {
      echo "<script>window.location='index.php'</script>";
  }
  $email = $_SESSION['admin'];
  $user = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
  $row = mysqli_fetch_array($user);
?>
<!-- end loader -->
    <!-- header -->
    <header class="header-area">
        <div class="container-fluid bg-secondary" style="height: 150px;">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo">
                        <a href="index.php">
                            <img src="../images/logo.png" alt="#" width="150" />
                        </a>
                    </div>
                </div>
                <div class="col-md-6 text-right position-relative">
                    <p class="text-white">Welcome, <?php echo $row['firstname']; ?> | <a href="logout.php" class="text-white">Logout</a></p>
                </div>
            </div>
        </div>
    </header>
    <div id="mySidebar" class="sidebar bg-secondary text-white" style="padding-top: 15em;">
  <a href="home.php" class="bg-dark text-white"><i class="fa fa-users"></i></a>
  <a href="orders.php" class="text-white"><i class="fa fa-shopping-cart"></i></a>
  <a href="feedbacks.php" class="text-white"><i class="fa fa-envelope"></i></a>
  <a href="products.php" class="text-white"><i class="fa fa-cutlery"></i></a>
  <a href="report.php" class="text-white"><i class="fa fa-bar-chart"></i></a>
</div>
    <!-- end header inner -->
    <!-- end banner -->
<!-- contact -->
<div class="contact" style="margin-top: 10em;">
<?php 
$id = $_GET['id'];
$details = mysqli_query($con,"SELECT * FROM orders INNER JOIN cart ON orders.order_no = cart.order_id INNER JOIN users ON orders.order_email = users.email WHERE orders.order_id  = '$id'");
$row = mysqli_fetch_array($details);
?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage text_align_left">
                        <span>Order ID: <?php echo $row['order_no']; ?></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                                    <a href="home.php" class="btn btn-link">
                                        < Go Back</a>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title">Order Details</h5>
                                    <p class="card-text">
                                        <b>Name:</b> <?php echo $row['firstname']." ".$row['lastname']; ?><br>
                                        <b>Order Date:</b> <?php echo $row['order_added']; ?><br>
                                        <b>Order Status:</b> <span class="btn btn-success"><?php echo $row['order_status']; ?></span><br>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title">Details</h5>
                                    <p class="card-text">
                                        <b>Email:</b> <?php echo $row['email']; ?><br>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $order_id = $row['order_no'];
                                        $cart = mysqli_query($con,"SELECT * FROM cart WHERE order_id = '$order_id'");
                                        while($rows = mysqli_fetch_array($cart)){
                                            $product_id = $rows['product_id'];
                                            $product = mysqli_query($con,"SELECT * FROM products WHERE id = '$product_id'");
                                            $pro = mysqli_fetch_array($product);
                                        ?>
                                        <tr>
                                            <td><?php echo $pro['name']; ?></td>
                                            <td><?php echo $rows['quantity']; ?></td>
                                            <td>Php <?php echo number_format($rows['price']); ?></td>
                                            <td>Php <?php echo number_format($rows['price']*$rows['quantity'],2); ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" class="text-right">Total</td>
                                                <td>Php <?php 
                                                $order_total = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM orders WHERE order_no = '$order_id'"));
                                                echo $order_total['order_total']; ?></td>
                                            </tr>
                                        </tfoot>
                                    </tbody>
                                </table>
                            </div>
                            
                            <p class="card-text">
                                        <b>Delivery Method:</b> <?php echo $row['order_type']; ?><br>
                                        <b>Payment Method:</b> <?php echo $row['order_payment']; ?><br>
                                    </p>

                                    <div class="mt-5">
                                        <?php 
                                        if($row['order_status'] == "Pending"){
                                        ?>
                                        <a href="confirm.php?s=Confirmed&id=<?php echo $id; ?>" class="btn btn-succcess bg-success text-white btn-lg">Confirm Order</a>
                                        <a href="confirm.php?s=Declined&id=<?php echo $id; ?>" class="btn btn-succcess bg-danger text-white btn-lg">Decline Order</a>
                                        <?php } elseif($row['order_status'] == "Completed" || $row['order_status'] == "Declined"){ 
                                            echo "<h3>Order is already ".$row['order_status']."</h3>";
                                        
                                        } else {
                                        ?>
                                        <form method="POST">
                                            <select name="status" class="form-control">
                                                <option value="Preparing">Preparing</option>
                                                <option value="Cooking">Cooking</option>
                                                <option value="Shipped">Shipped</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                            <input type="submit" name="update" class="btn btn-success btn-lg mt-3" value="Update Status">
                                        </form>
                                        <?php
                                        } ?>
                                    </div>
                        </div>
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
    <?php 
    if(isset($_POST['update'])){
        $status = $_POST['status'];
        $update = mysqli_query($con,"UPDATE orders SET order_status = '$status' WHERE order_no = '$order_id'");
        if($update){
            echo "<script>alert('Status Updated');window.location.href='order-details.php?id=$id'</script>";
        }
    }
    ?>
    <!-- end about -->
    <!--  footer -->
    <?php 
    include ('includes/footer.php');
    ?>