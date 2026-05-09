<?php
session_start();
include("../database/db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
}

$user_id = $_SESSION['user_id'];

$product_id = $_POST['product_id'];

$quantity = $_POST['quantity'];

$check = "SELECT * FROM cart
          WHERE user_id='$user_id'
          AND product_id='$product_id'";

$result = mysqli_query($conn,$check);

if(mysqli_num_rows($result) > 0){

    $update = "UPDATE cart
               SET quantity = quantity + '$quantity'
               WHERE user_id='$user_id'
               AND product_id='$product_id'";

    mysqli_query($conn,$update);

}else{

    $insert = "INSERT INTO cart(user_id,product_id,quantity)
               VALUES('$user_id','$product_id','$quantity')";

    mysqli_query($conn,$insert);
}

header("Location: cart.php");
?>