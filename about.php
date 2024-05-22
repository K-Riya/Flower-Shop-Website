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
    <title>About Us</title>
</head>
<body>
    <?php include 'header.php' ;?>
    <div class="banner">
        <h1>About Us</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
    </div> 
    <div class="about">
        <div class="row">
            <div class="detail">
                <h1>Visit our beautiful showroom</h1>
                <p>Our showroom is an expression of what we love doing;being creative with floral and plant arrangements.Whether you are looking for a florist for your perfect wedding,or just want to uplift any room with some one of a kind living decor,Blossom with love can help.</p>
                <a href="shop.php" class="btn2">Shop Now</a>
            </div>
            <div class="img-box">
                <img src="images/about1.jpg">
            </div>
        </div>
    </div>
    <div class="banner-2">
        <h1>Let Us Make Your Wedding Flawless</h1>
        <a href="shop.php" class="btn2">Shop Now</a>
    </div>
    <div class="services">
        <h1 class="title">Our services</h1>
        <div class="box-container">
            <div class="box">
                <i class="bi bi-percent"></i>
                <h3>30% OFF + FREE SHIPPING</h3>
                <p>Starting at ₹500/month Plus,get ₹800 credit/year on regular orders</p>
            </div>
            <div class="box">
                <i class="bi bi-asterisk"></i>
                <h3>FRESHEST BLOOMS</h3>
                <p>Exclusive farm-fresh flowers with our Happiness Guarantee</p>
            </div>
            <div class="box">
                <i class="bi bi-alarm"></i>
                <h3>SUPER FLEXIBLE</h3>
                <p>Customize recipient,data, or flowers.Skip or cancel anytime.</p>
            </div>
        </div>
    </div>
    <div class="stylist">
        <h1 class="title">Floral Stylist</h1>
        <p>Meet The Team That Makes Miracles Happen</p>
        <div class="box-container">
            <div class="box">
                <div class="img-box">
                    <img src="images/emp1.jpg">
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>
                        <i class="bi bi-whatsapp"></i>
                        <i class="bi bi-linkedin"></i>
                    </div>
                </div>
                <h3>Sara Smith</h3>
                <p>Developer</p>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="images/emp2.jpg">
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>
                        <i class="bi bi-whatsapp"></i>
                        <i class="bi bi-linkedin"></i>
                    </div>
                </div>
                <h3>Sara Smith</h3>
                <p>Developer</p>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="images/emp3.jpg">
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>
                        <i class="bi bi-whatsapp"></i>
                        <i class="bi bi-linkedin"></i>
                    </div>
                </div>
                <h3>Sara Smith</h3>
                <p>Developer</p>
            </div>
        </div>
    </div>
    <div class="testimonial-container">  
        <h1 class="title">What people say</h1>
        <div class="container">             
            <div class="testimonial-item active">  
                <img src="images/test1.jpeg">
                <h3>Sara Smith</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis, laborum dolor ratione, nihil fugiat quae officia possimus vitae nesciunt cupiditate maiores. Quaerat possimus corrupti animi!</p>
            </div>
            <div class="testimonial-item">
                <img src="images/test2.jpeg">
                <h3>Riya K</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis, laborum dolor ratione, nihil fugiat quae officia possimus vitae nesciunt cupiditate maiores. Quaerat possimus corrupti animi!</p>
            </div>
            <div class="testimonial-item">
                <img src="images/test3.webp">
                <h3>Sara Smith</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis, laborum dolor ratione, nihil fugiat quae officia possimus vitae nesciunt cupiditate maiores. Quaerat possimus corrupti animi!</p>
            </div>
            <div class="right-arrow" onclick="nextSlide();"><i class="bi bi-arrow-right"></i></div>
            <div class="left-arrow" onclick="prevSlide();"><i class="bi bi-arrow-left"></i></div>
        </div>
    </div>
    <?php include 'footer.php' ;?>
    <script type="text/javascript" src="script.js"></script>
    </body>
</html>
