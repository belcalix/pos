<?php 
include('../includes/config.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $_GET['s'];
    $update = mysqli_query($con,"UPDATE orders SET order_status = '$status' WHERE order_id = '$id'");
    if($update){
        echo "<script>alert('Status Updated');window.location.href='order-details.php?id=$id'</script>";
    } else {
        echo "<script>alert('Status Not Updated');window.location.href='order-details.php?id=$id'</script>";
    }

}
?>