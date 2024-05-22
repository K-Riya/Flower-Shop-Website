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
   /*-----------------------order placed------------------*/ 
   if(isset($_POST['order_btn']))
   {
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $number = mysqli_real_escape_string($conn,$_POST['number']);
    $method = mysqli_real_escape_string($conn,$_POST['method']);
    $address = mysqli_real_escape_string($conn,'flat no.'.$_POST['flat'].','.$_POST['street'].','.$_POST['city'].','.$_POST['state'].','.$_POST['country'].','.$_POST['pin']);
    $placed_on=date('d-M-Y');

    $cart_total=0;
    $cart_products[]='';
    $cart_query = mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die("query failed");
    
    if(mysqli_num_rows($cart_query)>0){
        while($cart_item = mysqli_fetch_assoc($cart_query))
        {
            $cart_products[]= $cart_item['name'].'('.$cart_item['quantity'].')';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total+=$sub_total;
        }
    } 
    $total_products = implode(',',$cart_products);
    mysqli_query($conn, "INSERT INTO `orders`(`user_id`,`name`,`number`,`email`,`method`,`address`,`total_products`,`total_price`,`placed_on`,`payment_status`) VALUES ('$user_id','$name','$number','$email','$method','$address','$total_products','$cart_total','$placed_on')");
    mysqli_query($conn,"DELETE FROM `cart` WHERE user_id='$user_id'");
    $message[] = 'order placed successfully';
    header('location:checkout.php');
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
        <h1>Checkout Page</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    </div> 
    <div class="checkout-form">
        <h1 class="title">Payment Process</h1>
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
        <div class="display-order">
            <?php
            $select_cart = mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die("query failed");
            $total=0;
            $grand_total=0;
            if(mysqli_num_rows($select_cart)>0)
            {
                while($fetch_cart=mysqli_fetch_assoc($select_cart))
                {
                    $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                    $grand_total = $total += $total_price;
                ?>
                <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                <?php
                }
            };
            ?>
            <span class="grand-total">Total Amount Payable : ₹<?= $grand_total; ?>/-</span>
        </div>
        <form method="post">
                <div class="input-field">
                    <label>Your name</label>
                    <input type="text" name="name" placeholder="Enter your name">
                </div>
                <div class="input-field">
                    <label>Your number</label>
                    <input type="text" name="number" placeholder="Enter your number">
                </div>
                <div class="input-field">
                    <label>Your email</label>
                    <input type="text" name="email" placeholder="Enter your email">
                </div>
                <div class="input-field">
                    <label>Select Payment Method</label>
                    <select name="method">
                        <option selected disabled>Select Payment Method</option>
                        <option value="cash on delivery">Cash on delivery</option>
                        <option value="credit card">Credit Card</option>
                        <option value=paypal>Paypal</option>
                        <option value="paytm">Paytm</option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Address line 1:</label>
                    <input type="text" name="flat" placeholder="E.g Flat no.">
                </div>
                <div class="input-field">
                    <label>Address line 2:</label>
                    <input type="text" name="street" placeholder="E.g Street name">
                </div>
                <div class="input-field">
                    <label>City</label>
                    <input type="text" name="city" placeholder="E.g Pune">
                </div>
                <div class="input-field">
                    <label>State</label>
                    <input type="text" name="state" placeholder="E.g Maharashtra">
                </div>
                <div class="input-field">
                    <label>Country</label>
                    <input type="text" name=country" placeholder="E.g India">
                </div>
                <div class="input-field">
                    <label>Pincode</label>
                    <input type="number" name="pin" placeholder="E.g 110012">
                </div>
               <input type="submit" name="order_btn" class="btn" value="order now">

        </form>
    </div>
    
    
    <?php include 'footer.php' ;?>
    <script type="text/javascript" src="script.js"></script>
    </body>
</html>