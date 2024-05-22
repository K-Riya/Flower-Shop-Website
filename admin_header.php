<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="flex">
            <a href="admin.php" class="logo">Admin<span> Panel</span></a>
            <nav class="navbar">
                <a href="admin.php">Home</a>
                <a href="admin_product.php">Products</a>
                <a href="admin_orders.php">Orders</a>
                <a href="admin_user.php">Users</a>
                <a href="admin_message.php">Message</a>
</nav>
<div class="icons">
    <i class="bi-list" id="menu-btn"></i>
    <i class="bi-person" id="user-btn"></i>
</div>
<div class="user-box">
    <p>username : <span><?php echo $_SESSION['admin_name'];?></span></p>
    <p>email : <span><?php echo $_SESSION['admin_email'];?></span></p>
    <form method="post" class="logout">
        <button name="logout" class="logout-btn">LOG OUT</button>
</form>
</div>
</div>
</header>

</body>
</html>