<?php
    include 'connection.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    if(!isset($user_id))
    {
        header('location:login.php');
    }

    if(isset($_POST['logout']))
    {
        session_destroy();
        header('location:login.php');
    }

     /*-----------------adding products to cart------------------*/
    if(isset($_POST['add_to_cart']))
    {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;

        $cart_number = mysqli_query($conn,"SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'") or die("query failed");
        if(mysqli_num_rows($cart_number)>0)
        {
            $message[]='Product already exist in wishlist';
        }
        else{
            mysqli_query($conn,"INSERT INTO `cart`(`user_id`,`pid`,`name`,`price`,`quantity`,`image`) VALUES ('$user_id','$product_id','$product_name','$product_price',''$product_quantity,'$product_image')");

            $message[]="Product successfully added in cart";
        }
    } 

    /*-----------------deleting products from wishlist------------------*/
    if (isset($_GET['delete']))
        {
            $delete_id = $_GET['delete'];
           
            mysqli_query($conn,"DELETE FROM `wishlist` WHERE id = '$delete_id'") or die("query failed");
            
            header('location:wishlist.php');
        }
    /*-----------------deleting  all products from wishlist------------------*/
        if (isset($_GET['delete_all']))
        {
           
            mysqli_query($conn,"DELETE FROM `wishlist` WHERE user_id = '$user_id'") or die("query failed");
            
            header('location:wishlist.php');
        }
    ?>
<style type="text/css">
    <?php include 'main.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>flower shop</title>
</head>
<body>
    <?php include 'header.php' ;?>
    <div class="banner">
        <h1>My Wishlist</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    </div> 
    <div class="wishlist">
        <h1 class="title">Products added in wishlist</h1>
        <?php
        if (isset($message)){
            foreach ($message as $message){
                echo '<div class="message">
                            <span>'.$message.'</span>
                            <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
                      </div>'
                      ;
            }
        }
?>
    <div class="box-container">
        <?php
            $grand_total = 0;
            $select_wishlist = mysqli_query($conn,"SELECT * FROM `wishlist` WHERE user_id='$user_id'") or die("query failed");
            if(mysqli_num_rows($select_wishlist)>0)
            {
                while($fetch_wishlist=mysqli_fetch_assoc($select_wishlist))
                {
                    ?>
                <form action="" method="post" class="box">
                    <div class="icon">
                        <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id']; ?>"class="bi bi-x"></a>
                        <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="bi bi-eye-fill"></a>
                    </div>
                        <img src="images/<?php echo $fetch_wishlist['image']; ?>">
                    <div class="price">₹<?php echo $fetch_wishlist['price']; ?>/-</div>
                    <div class="name"><?php echo $fetch_wishlist['name']; ?></div>
                    <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image']; ?>">
                    <button type="submit" name="add_to_cart" class="btn2">Add to cart<i class="bi bi-cart"></i></button>
                </form>
        <?php
            $grand_total+=$fetch_wishlist['price'];    
            }
            }
            else
            {  echo '<div class="empty">
                 <img class="empty1" src = "images/empty1.jpg">
                 <p>No products in your wishlist</p>
                 </div>
                 ';
            }
            ?>
    </div>
        <div class="wishlist_total">
            <p>Total amount payable: <span>₹<?php echo $grand_total ?>/-</span></p>
            <a href="shop.php">Continue Shopping</a>
            <a href="wishlist.php?delete_all" class="btn2 <?php echo ($grand_total > 1)?'':'disabled'?>" onclick="return confirm('Do you want to delete all from wishlist')">Delete All</a>
        </div>
        </div>
        </div>
    <?php include 'footer.php' ;?>
    <script type="text/javascript" src="script.js"></script>
    </body>
</html>