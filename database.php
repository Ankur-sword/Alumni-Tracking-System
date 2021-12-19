
<?php 

$server="localhost";
$username="root";
$password="";
$database="myproject";
$con=mysqli_connect($server,$username,$password,$database);

if(!$con)
{
    die("Could not connect to".mysqli_connect_error());
}


?>
