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
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage text_align_left">
                        <span>Orders</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title font-weight-bold">New Orders</h2>
                            <p class="card-text text-center" style="font-size: 30px;">
                                <?php
                                $pending = mysqli_query($con,"SELECT * FROM orders WHERE order_status = 'Pending'");
                                $count = mysqli_num_rows($pending);
                                echo $count;
                                ?>
                            </p>
                        </div>
                    </div>

                </div>
                    <div class="col-md-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table2">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Order Date</th>
                                                <th scope="col">Order Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $pending = mysqli_query($con,"SELECT * FROM orders WHERE order_status = 'Pending'");
                                            while($row = mysqli_fetch_array($pending)){
                                                $user = mysqli_query($con,"SELECT * FROM users WHERE email = '".$row['order_email']."'");
                                                $user = mysqli_fetch_array($user);
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['order_no']; ?></td>
                                                    <td><?php echo $user['firstname']." ".$user['lastname']; ?></td>
                                                    <td><?php echo $row['order_added']; ?></td>
                                                    <td><?php echo $row['order_status']; ?></td>
                                                    <td><a href="order-details.php?id=<?php echo $row['order_id']; ?>" class="btn btn-primary">View</a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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