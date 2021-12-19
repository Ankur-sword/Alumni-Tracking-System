
<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
// Username is root
$user = 'root';
$password = '';

// Database name is gfg
$database = 'myproject';

// Server is localhost with
// port number 3308
$servername='localhost';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql1 = "SELECT * FROM Detail ";
$sql2="SELECT * FROM Batch";
$sql3="SELECT * FROM Carrier";


$result2=$mysqli->query($sql2);
$result1= $mysqli->query($sql1);
$result3=$mysqli->query($sql3);

$mysqli->close();

?>

<?php
  include_once 'header.php';
?>
<title>Alumni

</title>
	<section>
	
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows1=$result1->fetch_assoc() and $rows2=$result2->fetch_assoc() and $rows3=$result3->fetch_assoc() )
				{
          $value='MSME';
          if($rows2['Branch']==$value)
          { 
			?>
               
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card-deck two-col">
        <div class="rounded-rectangle-svs card current-proj">
          <h5 class="text-default"><b><?php echo $rows1['Name'];?></b></h5>
          <div class="row" style="overflow-x:auto;">
            <div class="col-md-8">

            <div class="card-body">
      
      
      <p class="card-text"><?php echo $rows3['About Yourself'];?></p>
      

      <ul class="list-group list-group-flush">
    <li class="list-group-item"><p>Branch : <?php echo $rows2['Branch'];?></p></li>
    <li class="list-group-item"><p> Batch from: <?php echo $rows2['Batch From'];?></p></li>
    <li class="list-group-item"><p> Batch To: <?php echo $rows2['Batch To'];?></p></li>
    
    <li class="list-group-item"> <p> Employement Status: <?php echo $rows3['Employment Status'];?></p></li>
   
    <li class="list-group-item"> <p>Contact Details : </p><?php echo $rows1['Email'];?> || <?php echo $rows1['Contact'];?> || <?php echo $rows1['Home'];?> ||
    <?php echo $rows1['PIN'];?></li>
  </ul>

  <!-- <a href="update.php" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a> -->
    </div>
            </div>

            <!-- <div class="col-md-4 text-center">
              <h1 class="text-default"><b>86%</b></h1>
            </div> -->
          </div>
        </div>
        </div>
    </div>
  </div>
</div>
           
			<?php
          }	
      }
			?>
		</table>
	</section>



    <?php
  include_once 'footer.php';
?>




 





 
