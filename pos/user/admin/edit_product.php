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
$details = mysqli_query($con,"SELECT *,category.id as catid, category.name as catname, products.name as prodname FROM products INNER JOIN category ON products.category_id = category.id WHERE products.id  = '$id'");
$row = mysqli_fetch_array($details);
?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage text_align_left">
                        <span>Add Product</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                                    <a href="products.php" class="btn btn-link">
                                        < Go Back</a>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Name</label>
                                            <input type="text" class="form-control" name="product_name" value="<?php echo $row['prodname']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Price</label>
                                            <input type="text" class="form-control" name="product_price" value="<?php echo $row['price']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Description</label>
                                            <textarea class="form-control" name="product_description" required><?php echo $row['description']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Category</label>
                                            <select class="form-control" name="product_category" required>
                                                <option value="<?php echo $row['catid']; ?>"><?php echo $row['catname']; ?></option>
                                                <?php 
                                                $category = mysqli_query($con,"SELECT * FROM category");
                                                while($row = mysqli_fetch_array($category)){
                                                ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php } ?>  
                                            </select>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </form>
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
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_description = $_POST['product_description'];
        $product_category = $_POST['product_category'];
        $product_image = $_FILES['product_image']['name'];
        $temp_name = $_FILES['product_image']['tmp_name'];
        move_uploaded_file($temp_name,"../images/$product_image");
        $update = mysqli_query($con,"UPDATE products SET name = '$product_name', price = '$product_price', description = '$product_description', category_id = '$product_category' WHERE id = '$id'");
        if($update){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.location='products.php'</script>";
        }
    }
    ?>
    <!-- end about -->
    <!--  footer -->
    <?php 
    include ('includes/footer.php');
    ?>