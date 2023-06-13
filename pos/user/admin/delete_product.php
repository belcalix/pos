<?php 
include('../includes/config.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM products WHERE id = '$id'";
    $result = mysqli_query($con,$query);
    if($result){
        echo "<script>alert('Product Deleted Successfully')</script>";
        echo "<script>window.location.href='products.php'</script>";
    }
    else{
        echo "<script>alert('Product Not Deleted')</script>";
        echo "<script>window.location.href='products.php'</script>";
    }
}
?>