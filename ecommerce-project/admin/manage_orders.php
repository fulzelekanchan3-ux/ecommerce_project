<?php
include("../database/db.php");

$query = "SELECT orders.*, users.name

          FROM orders

          JOIN users
          ON orders.user_id = users.id";

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Orders</title>
</head>
<body>

<h1>Manage Orders</h1>

<table border="1" cellpadding="10">

<tr>
    <th>Order ID</th>
    <th>User</th>
    <th>Total</th>
    <th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td>₹<?php echo $row['total_amount']; ?></td>

<td><?php echo $row['order_status']; ?></td>

</tr>

<?php } ?>

</table>

</body>
</html>