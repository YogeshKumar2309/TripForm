
<?php
$insert = false;
if(isset($_POST['name'])){
  //set connection variable
  $server = "localhost";
  $username = "root";
  $password = "";
  // $dbname = "trip_mb";

  //create a database connection
  $con = mysqli_connect($server, $username, $password);

  //check for connection success
  if(!$con){
   die("connection tothis database failde due to". mysqli_connect_error());
 
 }
  // echo "Success connecting to the db";


 
  //collect post variables
 $name = $_POST['name'];
 $gender = $_POST['gender'];
 $age = $_POST['age'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $desc = $_POST['desc'];
 $sql = " INSERT INTO  `trip_mb`. `trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//  echo $sql;


//execute the query
if($con->query($sql) == true){
//  echo "Successfully insered";

//flag for successful insertion
$insert = true;
}
else{
 echo "ERROR: $sql <br> $con->error";
}

//close the database connection
$con->close();


}

?> 

<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Welcome To Travel Form</title>
   <link rel="stylesheet" href="style.css" />
 </head>
 <body>
   <div class="container">
     <h1>Welcome to GP Lohaghat Mumbai Trip form</h1>
     <p>
       Enter your details and submit this form to confirm your participation in
       the trip
     </p>
     <?php
     if($insert == true){
      echo "<p class='tqSubmitForm'>
       Thank you for filling the form. We are happy to see you joining us for
       the Mumbai trip
     </p>";
     }
   
     ?>

     <form action="index.php" method="post">
      <!-- <form action="process.php" method="POST"> -->
     
     <input type="text" name="name" id="name" placeholder="Enter your name" />
       <input type="number" name="age" id="age" placeholder="Enter your age" />

       <input
         type="text"
         name="gender"
         id="gender"
         placeholder="Enter yout gender"
       />

       <input
         type="email"
         name="email"
         id="email"
         placeholder="Enter your email"
       />
       <input
         type="number"
         name="phone"
         id="phone"
         placeholder="Enter your phone"
       /> 
     

       <textarea
         name="desc"
         id="desc"
         cols="30"
         rows="10"
         placeholder="Enter any other information here"
       ></textarea>
       <button name="submit" type="submit" class="btn">Submit</button>
       <!-- <button class="btn">Reset</button> -->
     </form>
   </div>
 </body>
</html>