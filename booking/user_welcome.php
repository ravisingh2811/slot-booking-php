<?php
session_start();

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <l<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Welcome</title>
</head>
<body>
    <nav class="navbar background h-nav-resp">
        <ul class="nav-list v-class-resp">
            <div class="logo"> <img src="img/logo[578].jpeg" alt="logo">
              <p class="name">user_welcome</p>
            </div>
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact Us</a></li>
        
        </ul>
    </nav>
    <div class="welcome" style ="  
                                    height: 230px;
                                   ">
        <H2>Thank you for choosing us Dear  <?php
          echo $_SESSION["name"];

        ?><br>
        A confirmation email is send to<br>
        <?php
          echo $_SESSION["email"];

        ?>
    
        </H2>
        <a  href = "logout.php">Click to logout</a>
    </div>

</body>
</html> 