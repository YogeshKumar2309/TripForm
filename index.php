
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

