<?php
    include 'connection.php';
    session_start();

    $admin_id = $_SESSION['admin_id'];
    if(!isset($admin_id))
    {
        header('location:login.php');
    }
    if(isset($_POST['logout']))
    {
        session_destroy();
        header('location:login.php');
    }
    /*********deleting order details from database***********/
    if (isset($_GET['delete']))
        {
            $delete_id = $_GET['delete'];
           
            mysqli_query($conn,"DELETE FROM `message` WHERE id = '$delete_id'") or die("query failed");
            
            header('location:admin_message.php');
        }
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>admin panel</title>
</head>
<body>
    <?php include 'admin_header.php'; ?>
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

<section class="message-container">
    <h1 class="title">Total registered users </h1>
    <div class="box-container">
    <?php
        $select_message = mysqli_query($conn,"SELECT * FROM `message`") or die("query failed");
        if(mysqli_num_rows($select_message)>0)
        {
            while($fetch_message = mysqli_fetch_assoc($select_message))
            {
        ?>   
        <div class="box">
            <p>User id: <span> <?php echo $fetch_message['user_id']; ?></span></p> 
            <p>User name: <span> <?php echo $fetch_message['name']; ?></span></p> 
            <p>Email: <span> <?php echo $fetch_message['email']; ?></span></p> 
            <p><?php echo $fetch_message['message']; ?> </p> 
            <a href="admin_message.php?delete=<?php echo $fetch_message['id']; ?>" class="delete" onclick="return confirm('Delete This')">Delete</a>
    
        </div>
        <?php
            }
        }
        else{
            echo '<p class="empty">no message yet </p>';
        }
        ?>
    </div>
    
    </section>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>