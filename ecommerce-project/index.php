<?php
session_start();
include("database/db.php");

if(isset($_GET['search'])){
    $search = $_GET['search'];
    $query = "SELECT * FROM products 
              WHERE product_name LIKE '%$search%'";
}else{
    $query = "SELECT * FROM products";
}

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modern Store</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- NAVBAR -->

<nav class="navbar">
    <h2 class="logo">ModernShop</h2>

    <ul>
        <li><a href="index.php">Home</a></li>

        <?php if(isset($_SESSION['user_id'])){ ?>
            <li><a href="user/cart.php">Cart</a></li>
            <li><a href="user/orders.php">Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php } else { ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php } ?>
    </ul>
</nav>

<!-- HERO -->

<section class="hero">
    <div>
        <h1>Discover Amazing Products</h1>
        <p>Shop smart with modern experience</p>
        <a href="#products">Shop Now</a>
    </div>
</section>

<!-- SEARCH (ONLY ONE) -->

<section class="search-section">
    <form method="GET">
        <input type="text" name="search" placeholder="Search products">
        <button type="submit">Search</button>
    </form>
</section>

<!-- PRODUCTS -->

<h1 class="title" id="products">Featured Products</h1>

<div class="products">

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="card">

    <img src="assets/images/<?php echo $row['image']; ?>">

    <h3><?php echo $row['product_name']; ?></h3>

    <p>₹<?php echo $row['price']; ?></p>

    <a href="product.php?id=<?php echo $row['id']; ?>">
        View Product
    </a>

</div>

<?php } ?>

</div>

<footer class="footer">
    <h3>ModernShop</h3>
    <p>Premium Shopping Experience</p>
</footer>

</body>
</html>