<?php
session_start();

if($_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard">

    <h1>Admin Dashboard</h1>

    <a href="add_product.php">Add Product</a>

    <a href="manage_products.php">Manage Products</a>

    <a href="manage_orders.php">Manage Orders</a>

</div>

</body>
</html>