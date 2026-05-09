<?php
include("../database/db.php");

$id = $_GET['id'];

$query = "DELETE FROM products WHERE id='$id'";

mysqli_query($conn,$query);

header("Location: manage_products.php");
?>