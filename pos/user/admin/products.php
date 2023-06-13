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
  <a href="home.php" class="text-white"><i class="fa fa-users"></i></a>
  <a href="orders.php" class="text-white"><i class="fa fa-shopping-cart"></i></a>
  <a href="feedbacks.php" class="text-white"><i class="fa fa-envelope"></i></a>
  <a href="products.php" class="bg-dark text-white"><i class="fa fa-cutlery"></i></a>
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
                        <span>Products</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title font-weight-bold">Total Products</h2>
                            <p class="card-text text-center" style="font-size: 30px;">
                                <?php
                                $pending = mysqli_query($con,"SELECT * FROM products");
                                $count = mysqli_num_rows($pending);
                                echo $count;
                                ?>
                            </p>
                        </div>
                    </div>

                </div>
                    <div class="col-md-12 mt-5">
                        <div class="card">
                        <div class="card-header text-right">
                            <a class="card-title font-weight-bold btn btn-primary" href="add_product.php">Add Product</a>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table4">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Product Name</th>
                                                <th>Product Image</th>
                                                <th>Product Price</th>
                                                <th>Product Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $pending = mysqli_query($con,"SELECT * FROM products ORDER by id DESC");
                                            $i=1;
                                            while($row = mysqli_fetch_array($pending))
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><img src="../images/<?php echo $row['photo']; ?>" alt="" width="100"></td>
                                                <td>Php <?php echo number_format($row['price'],2); ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td>
                                                    <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                                    <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
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