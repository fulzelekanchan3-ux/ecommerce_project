<?php
session_start();
include("database/db.php");

$id = $_GET['id'];

$query = "SELECT * FROM products WHERE id='$id'";
$result = mysqli_query($conn,$query);

$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="product-details">

    <img src="assets/images/<?php echo $product['image']; ?>">

    <div class="details">

        <h1><?php echo $product['product_name']; ?></h1>

        <h2>₹<?php echo $product['price']; ?></h2>

        <p><?php echo $product['description']; ?></p>

        <form action="user/add_to_cart.php" method="POST">

            <input type="hidden" name="product_id"
            value="<?php echo $product['id']; ?>">

            <input type="number" name="quantity"
            value="1" min="1">

            <button type="submit" name="add_cart">
                Add To Cart
            </button>

        </form>

    </div>

</div>

</body>
</html>