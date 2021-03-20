<?php
   session_start();
   include "db_con.php" ;

   if($_SERVER["REQUEST_METHOD"] == "POST"){
    
       $email = $_POST['email'];
       $password= $_POST['password'];

       $sql = "SELECT * FROM signup WHERE email = '$email' AND password = '$password'";

       $query = mysqli_query($con , $sql);

       $email_count = mysqli_num_rows($query);

       if ($email_count > 0){
           $email_pass = mysqli_fetch_array($query);
        
           $_SESSION["name"] = $email_pass['name'];
           $_SESSION["email"] = $email_pass['email'];
           $_SESSION["number"] = $email_pass['number'];
        
           header ("location: welcome.php");
       }
       else{
           echo "Invalid Credentials " ;
       }
      
    }
         
    


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
              <p class="name">Clinic</p>
            </div>
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="signup.php">Create an account</a></li>
        
        </ul>
    </nav>
    <form  method="POST" action ="">
        <div class="Login-box" style="height: 60vh;" >
           <h1>
               Login
           </h1>
           <div class="textbox">
            
                 <input type="email" placeholder="Email" name="email" value=""required>
            </div>
         <div class="textbox">
              <input type="password" placeholder="Password" name="password" value=""required>
         </div>

          <button class="btn" name = "SUBMIT" type="submit">LogIn</button>
            <div class="link" style = "font-style: italic;
                                  font-size: 20px;
                                   padding-left: 217px;
                                   padding-top: 15px;
                                   height: 4vh;
                                   "
                                   >
            
               <a  href = "signup.php">Click to signup</a><br><br>

            </div>   
               
        </div>
    </form>
</body>
</html>