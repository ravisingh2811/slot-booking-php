
<?php
session_start();
include "db_con.php";
if(isset($_POST['SUBMIT'])){
   $name= mysqli_real_escape_string($con, $_POST['name']);
   $email=mysqli_real_escape_string($con,$_POST['email']);
   $number=mysqli_real_escape_string($con,$_POST['number']);
   $promblem=mysqli_real_escape_string($con,$_POST['promblem']);
   $address=mysqli_real_escape_string($con,$_POST['address']);
   $date=mysqli_real_escape_string($con,$_POST['date']);
   $time=mysqli_real_escape_string($con,$_POST['time']);

 
             $sql = "INSERT INTO patient ( `name` , `email`, `number` , `promblem`, `address`, `date`, `time`, `dd`) 
             VALUES ('$name' , '$email' , '$number' , '$promblem' , '$address' , '$date', '$time', CURRENT_TIMESTAMP())";
             $iquery = mysqli_query($con , $sql);


             if($iquery){
                
               $_SESSION['email'] = "$email";
               $_SESSION['name'] = "$name";
              
                      $subject = "Booking Confirmation";
                      $body = "Dear $name.
                      
                      This is a confirmation that you have booked Treatment.
        
        
                      We are waiting you at Patna, India on $date at $time.
                      
                      Thank you for choosing our company.
                      
                      Psychologist Clinic
                      786758798";
                      $headers = "From: kinetic2811@gmail.com";
                      if(mail($email , $subject , $body , $headers)){
                        header("location:user_welcome.php");
                      }else {
                          echo "email sending failed";
                      }
    
                        
                       die;

                   }
                else{
                    echo "ERROR: $sql <br> $con->error";
                  }
                  $con->close();
                
}

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <title>Welcome</title>
</head>
<body>
    <nav class="navbar background h-nav-resp">
        <ul class="nav-list v-class-resp">
            <div class="logo"> <img src="img/logo[578].jpeg" alt="logo">
              <p class="name">Psychologist Clinic</p>
            </div>
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact Us</a></li>
           
        </ul>
    </nav>
    <div class="welcome"   >
           <h1>
             Slot Booking
           </h1>
    <form method="POST" action=""  >          
           <div class="textbox">
            
                 <input type="text"  name="name" value="<?php echo $_SESSION['name'];?>" required >
            </div>
         <div class="textbox">
              <input type="email"  name="email" value="<?php echo $_SESSION['email'];?>"  required >
         </div>
         <div class="textbox">
              <input type="number"  name="number" value="<?php echo $_SESSION['number'];?>"  required >
         </div>
         <div class="textbox">
              <input type="text" placeholder="What type of promblem you facing?" name="promblem" value="" required >
         </div>
         <div class="textbox">
              <input type="text" placeholder="Please enter address.." name="address" value="" required >
        </div>
         <div class="textbox">
              <input type="date" placeholder = "when you want to come"  name="date" value="" required >
         </div>
         <div class="textbox">
              <input type="time" name="time" min="10:00" max="16:00" value="" required >
         </div>
        
          <button class="btn1" style = "  width: 218px;
                                             background: blue;
                                             border: 3px solid white;
                                             border-radius: 10px;
                                             color: white;
                                             padding: 10px;
                                             font-size: 20px;
                                             cursor: pointer;
                                             max-width: 12px 0 "
                                              name = "SUBMIT" type="submit">Confirm</button>
           
  </form>
  
    </div>
<footer>
    <p class="text-footer">
        Copyright &copy; 2021- All rights reserved|
        Design and development Ravi singh.
    </p>
</footer>

</body>
</html> 
