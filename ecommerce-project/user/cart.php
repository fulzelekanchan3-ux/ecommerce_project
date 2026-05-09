<?php
session_start();
include("../database/db.php");

$user_id = $_SESSION['user_id'];

$query = "SELECT cart.*, products.product_name,
          products.price, products.image

          FROM cart

          JOIN products
          ON cart.product_id = products.id

          WHERE cart.user_id='$user_id'";

$result = mysqli_query($conn,$query);

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h1 class="title">Shopping Cart</h1>

<div class="cart-container">

<?php while($row = mysqli_fetch_assoc($result)){

$subtotal = $row['price'] * $row['quantity'];

$total += $subtotal;

?>

<div class="cart-item">

    <img src="../assets/images/<?php echo $row['image']; ?>">

    <div>
        <h3><?php echo $row['product_name']; ?></h3>

        <p>₹<?php echo $row['price']; ?></p>

        <p>Quantity: <?php echo $row['quantity']; ?></p>

        <p>Subtotal: ₹<?php echo $subtotal; ?></p>

        <a href="remove_cart.php?id=<?php echo $row['id']; ?>">
            Remove
        </a>
    </div>

</div>

<?php } ?>

<h2>Total: ₹<?php echo $total; ?></h2>

<a class="checkout-btn" href="checkout.php">
    Proceed To Checkout
</a>

</div>

</body>
</html>