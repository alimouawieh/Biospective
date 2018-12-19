

<?php ob_start(); ?>
<div>HTML goes here...</div>
<div>More HTML...</div>
<?php $my_var = ob_get_clean(); ?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CalenderDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql_selectAll=  mysqli_query($conn, "SELECT * FROM todocalender");

ob_start();

while ($row = mysqli_fetch_array($sql_selectAll))
{


$check = $row['status'];

?>


<div class="col-3">

<?php
if($check == "yes")
{
  ?>
<div class="card text-white bg-success mb-3" style="width: 18rem; height:20rem;">
<?php
}
else
{
  ?>
<div class="card text-white bg-danger mb-3" style="width: 18rem; height:20rem;">
<?php
}
?>
<div class="card-header"><?php $row['title'] ?></div>
 <div class="card-body">'
    <h5 class="card-title"><?php $row['dueDate'] ?></h5>
   <p class="card-text"><?php $row['description'] ?></p>
    <p class="card-text"> <?php $row['status'] ?></p>

  </div>
  </div>

<div style="position:relative; left:45px;">
<div class="row ">

<div class="col-2">
 <form action="updateStatus.php" method="get">
 <button type="submit" value="yes" name="Buttom"><span class="accept"></span></button>
<input type='hidden' name='id' value='<?php $row["id"]?> '/>
</form>
</div>



<div class="col-2">
<form action="updateStatus.php" method="get">
<button type="submit" value="no" name="Buttom"><span class="reject"></span></button>
<input type='hidden' name='id' value='".$row["id"]."'/>
</form>
 </div>

 </div>
 </div>

  <br>
  <br>
  <br>

  </div>



<?php
}

$conn->close();
$ali = ob_get_clean();

 ?>
