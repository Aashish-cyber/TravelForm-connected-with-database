<?php
$insert = false;
if(isset($_POST['name'])){
    // set connection variables   
     $server = "Localhost";
     $username = "root";
     $password = "";

    //  create a database connection
     $con = mysqli_connect($server,$username,$password);
// check for connection success
     if(!$con){
         die("connection to this database failed due to" . mysqli_connect_error());
     }
    //  echo "Success connecting to the db";
    // collect post var
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

// excute the query
     if($con->query($sql) == true){
        //  echo "Successfully inserted";

        // flag for successful insertion
        $insert = true;

     }
     else{
         echo "ERROR: $sql <br> $con->error";
     }
// close the databse connection
     $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&family=Vujahday+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img  class="ab" src="ab.jpg" alt="Chandigarh Group Of Colleges, Landran">
    <div class = "container">
        <h1>Welcome to Chandigarh Group Of Colleges, Landran US Trip Form </h1>
        <p>Enter your details and submit this form to confirm
             your participation in the Trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to sse you joining us for the US trip</p>";
        }
    ?>     
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btn">submit</button>   
                   
        </form>     
    </div>
    <script src="index.js"></script>
     
    
</body>
</html> 