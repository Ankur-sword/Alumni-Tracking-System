<?php

$insert = false;
if(isset($_POST['name'])){

include_once 'database.php';

$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
$Contact=$_POST['number'];
$cpassword=$_POST['cpassword'];
$Home=$_POST['Home'];
$City=$_POST['City'];
$State=$_POST['State'];
$Pin=$_POST['PinCode'];

$sql1="INSERT INTO `Detail` ( `Name`, `Email`, `Contact`, `Password`, `Home`, `City`, `State`, `PIN`) VALUES ( '$name', '$email', '$Contact', '$password', '$Home', '$City', '$State', '$Pin');";

$Employment=$_POST['employment'];
$About=$_POST['About'];

$sql2="INSERT INTO `Carrier` (`Employment_Status`, `About_Yourself`) VALUES ( '$Employment', '$About');";

$BatchF=$_POST['From'];
$BatchT=$_POST['To'];
$Branch=$_POST['branch'];

$sql3="INSERT INTO `Batch` ( `Batch_From`, `Batch_To`, `Branch`) VALUES ( '$BatchF', '$BatchT', '$Branch');";


 if($cpassword==$password)
{
    if($con->query($sql1) == true and $con->query($sql2) == true and $con->query($sql3) == true){

    $insert=true;
   
   }
   else{
    echo "ERROR: $sql1 <br> $con->error";
    }
}
else 
{
    echo"Please Confirm your password";
}
    
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">    
  
<title>Welcome Page</title>
</head>

<body>
   
    <div class="container">
        <h1>UIET Kanpur</h1><h1>Alumni tracking system</h1>
        <p>Enter your details and submit this form </p>

        
        <?php
           
        if($insert == true){
        
         echo '<div class="alert alert-primary" role="alert">Thanks for submitting your form. We are happy to see you joining us . </div>';
     
        // "<p class='submitMsg'></p>";
        }
        $insert=false;
    ?>
    
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
                 
            <input type="email" name="email" id="email" placeholder="Enter your email">

            <input type="number" name="number" id="name" placeholder=" Enter Your Mobile/Phone Number">

            <input type="password" name="password" id="age" placeholder="Enter your Password">

            <input type="password" name="cpassword" id="age" placeholder="Confirm your Password">

            <label for="address"> <h3>Address :</h3> </label>
            <input type="text" name="Home" id="address" placeholder="Home">
            <input type="text" name="City" id="address" placeholder="City">
            <input type="text" name="State" id="address" placeholder="State">
            <input type="number" name="PinCode" id="address" placeholder="Pin Code">

            <h3>Batch Detail:</h3>

            <label for="Batch">From:</label>
                 <input type="date" id="Batch" name="From" Placeholder="FROM">
                 <label for="Batch">To:</label>
                 <input type="date" id="Batch" name="To" Placeholder="TO">
                 <br>
            <label for="cars"><H3>Branch:</H3></label>

              <select id="cars" name="branch" style="width: 500px;height: 35px;">
                <option value="CSE/IT">CSE/IT</option>
                <option value="ECE" >ECE</option>
                 <option value="MEE">MEE</option>
                 <option value="CHE">CHE</option>
                
              </select>
                      <br>

              <label for="cars"><H3>Employment Status :</H3></label>

              <select id="cars" name="employment" style="width: 500px;height: 35px;">
                <option value="Government Job" >Government Job </option>
                <option value="Private Job">Private Job </option>
                 <option value="Self-Employed">Self-Employed  </option>
                 <option value="Pursuing Higher Education">Pursuing Higher Education</option>
                 <option value="Unemployed">Unemployed </option>
                 
              </select>
              <br>
              <label for="w3review"><h3>About Yourself:</h3></label>

               <textarea id="w3review" name="About" rows="4" cols="50">

             </textarea>
           
           
           
            
           
            <button class="btn">Submit</button> 
        </form>
    </div>
   <center> <a href="login.php"class="btn btn-warning btn-lg">login</a></center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    

   
    <?php
  include_once 'footer.php';
?>