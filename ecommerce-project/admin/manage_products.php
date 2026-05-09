<?php
include("../database/db.php");

$query = "SELECT * FROM products";

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Products</title>
</head>
<body>

<h1>Manage Products</h1>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['product_name']; ?></td>

<td>₹<?php echo $row['price']; ?></td>

<td>
    <a href="delete_product.php?id=<?php echo $row['id']; ?>">
        Delete
    </a>
</td>

</tr>

<?php } ?>

</table>

</body>
</html>