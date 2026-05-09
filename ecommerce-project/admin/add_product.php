<?php
include("../database/db.php");

if(isset($_POST['add_product'])){

    $name = $_POST['name'];

    $price = $_POST['price'];

    $description = $_POST['description'];

    $image = $_FILES['image']['name'];

    $temp = $_FILES['image']['tmp_name'];

    move_uploaded_file(
        $temp,
        "../assets/images/".$image
    );

    $query = "INSERT INTO products
    (product_name,price,description,image)

    VALUES('$name','$price',
    '$description','$image')";

    mysqli_query($conn,$query);

    echo "Product Added";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="form-container">

<form method="POST" enctype="multipart/form-data">

    <h2>Add Product</h2>

    <input type="text" name="name"
    placeholder="Product Name">

    <input type="number" name="price"
    placeholder="Price">

    <textarea name="description"
    placeholder="Description"></textarea>

    <input type="file" name="image">

    <button name="add_product">
        Add Product
    </button>

</form>

</div>

</body>
</html>