<?php
include_once 'database.php';
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "SELECT COUNT(Name) FROM Detail WHERE Name = '$name' and Password = $password ";
    $result = mysqli_query($con, $sql);
    // echo "<script>console.log('result', '$result')</script>";
    if($result != 1){
        $showError="invalid password";   
    } 
    else
    {
        session_start();
        $_SESSION['loggedin']= true;
        $_SESSION['username'] = $name;
        header("location: alumni.php");
    }  
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
    <?php
    if ($login) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> You are logged in
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> ';
    }
    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> ' . $showError . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> ';
    }
    ?>

    <div class="container">
        <h1>UIET Kanpur</h1>
        <h1>Alumni tracking system</h1>
        <p>Login to : </p>
        <form method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="password" name="password" id="name" placeholder="Enter your Password">
            <button type="submit" name="" class="btn">Submit</button>
        </form>



        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


    </div>
        <?php
        include_once 'footer.php';
        ?>