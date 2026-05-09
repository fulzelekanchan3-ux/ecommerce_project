<?php
session_start();
include("../database/db.php");

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM orders
          WHERE user_id='$user_id'
          ORDER BY id DESC";

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h1 class="title">My Orders</h1>

<div class="orders-container">

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<div class="order-card">

    <h3>Order ID: <?php echo $row['id']; ?></h3>

    <p>Total: ₹<?php echo $row['total_amount']; ?></p>

    <p>Status:
        <strong>
            <?php echo $row['order_status']; ?>
        </strong>
    </p>

</div>

<?php } ?>

</div>

</body>
</html>