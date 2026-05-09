<?php
session_start();
include("../database/db.php");

$user_id = $_SESSION['user_id'];

$query = "SELECT cart.*, products.price

          FROM cart

          JOIN products
          ON cart.product_id = products.id

          WHERE cart.user_id='$user_id'";

$result = mysqli_query($conn,$query);

$total = 0;

while($row = mysqli_fetch_assoc($result)){

    $total += $row['price'] * $row['quantity'];
}

if(isset($_POST['place_order'])){

    $insert_order = "INSERT INTO orders(user_id,total_amount,order_status)

                     VALUES('$user_id','$total','Pending')";

    mysqli_query($conn,$insert_order);

    $order_id = mysqli_insert_id($conn);

    $cart_query = "SELECT * FROM cart WHERE user_id='$user_id'";

    $cart_result = mysqli_query($conn,$cart_query);

    while($item = mysqli_fetch_assoc($cart_result)){

        $product_id = $item['product_id'];

        $quantity = $item['quantity'];

        $product_query = "SELECT * FROM products
                          WHERE id='$product_id'";

        $product_result = mysqli_query($conn,$product_query);

        $product = mysqli_fetch_assoc($product_result);

        $price = $product['price'];

        $insert_item = "INSERT INTO order_items
        (order_id,product_id,quantity,price)

        VALUES('$order_id','$product_id',
        '$quantity','$price')";

        mysqli_query($conn,$insert_item);
    }

    $clear_cart = "DELETE FROM cart WHERE user_id='$user_id'";

    mysqli_query($conn,$clear_cart);

    header("Location: orders.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="checkout-box">

    <h1>Checkout</h1>

    <h2>Total Amount: ₹<?php echo $total; ?></h2>

    <form method="POST">

        <button name="place_order">
            Place Order
        </button>

    </form>

</div>

</body>
</html>