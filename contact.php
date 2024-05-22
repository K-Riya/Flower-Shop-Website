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
        <h1>My Contact</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    </div> 

    <div class="help">
        <h1 class="title">Need help</h1>
        <div class="box-container">
            <div class="box1">
                <div>
                    <img src="images/icon1.png">
                    <h2>Address</h2>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="box1">
                <div>
                    <img src="images/icon2.png">
                    <h2>Opening</h2>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="box1">
                <div>
                    <img src="images/icon1.png">
                    <h2>Our contact</h2>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="box1">
                <div>
                    <img src="images/icon3.png">
                    <h2>Special Offer</h2>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
    <div class="form-container">
        <div class="form-section">
            <form method="post">
                <?php
                /*-----------------send message----------------------------*/
                if (isset($_POST['submit-btn'])){
                    $name = mysqli_real_escape_string($conn,$_POST['name']);
                    $email = mysqli_real_escape_string($conn,$_POST['email']);
                    $number = mysqli_real_escape_string($conn,$_POST['number']);
                    $message = mysqli_real_escape_string($conn,$_POST['message']);
            
                    $select_message = mysqli_query($conn,"SELECT * FROM `message` WHERE name='$name' AND email='$email' AND number='$number' AND message='$message'") or die("query failed");
                    if (mysqli_num_rows($select_message)>0)
                    {
                       echo "Message already exist";
                    }
                    else{
                        mysqli_query($conn,"INSERT INTO `message`(`user_id`,`name`,`email`,`number`,`message`) VALUES ('$user_id','$name','$email','$number','$message')") or die("query failed");
            
                        echo "Message successfully added";
                    }
                } 
                ?>
                <h1>Send us your questions!</h1>
                <p>We will get back to you within two days.</p>
                <div class="input-field">
                    <label>Your name</label>
                    <input type="text" name="name">
                </div>
                <div class="input-field">
                    <label>Your email</label>
                    <input type="text" name="email">
                </div>
                <div class="input-field">
                    <label>Your number</label>
                    <input type="number" name="number">
                </div>
                <div class="input-field">
                    <label>Message</label>
                    <textarea name="message"></textarea>
                </div>
                <input type="submit" name="submit-btn" class="btn" value="send message">
            </form>
        </div>
    </div>

    
    <?php include 'footer.php' ;?>
    <script type="text/javascript" src="script.js"></script>
    </body>
</html>