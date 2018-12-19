<!DOCTYPE html>
<html>
<head>
<title> Biospective Calender </title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="styles.css" rel="stylesheet" type="text/css"  />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
  <?php
  include("createDB.php");
  ?>

<div style="position: relative; top:100px;">
<div class="container">
<div class="row justify-content-around">


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


while ($row = mysqli_fetch_array($sql_selectAll))
{


$check = $row['status'];
$dueTime = $row['dueTime'];
$d = strtotime($dueTime);
$date = date("h:i",$d);

echo '<div class="col-3">';


if($check == "yes")
{


echo'  <div class="card text-white bg-success mb-3" style="width: 23rem; height:28rem;">';

}
else
{

  echo '<div class="card text-white bg-danger mb-3" style="width: 23rem; height:28rem;">';

}
?>

 <div class="card-header"><?= $row['title'] ?> </div>
<div class="card-body">
    <h5 class="card-title"><?= $row['dueDate'] ?>       <?= $date ?></h5>
 <p class="card-text"><?= $row['description'] ?></p>

 <?php if($check=="yes")
 {
  ?>
 <div class="card-footer">
   <p>Completed at:</p>
  <p><?=$row['completedAt']?></p>
</div>
<?php } ?>
 </div>


 <?php
echo '</div>';
  ?>


<div style="position:relative; left:46px;">
<div class="row ">

<div class="col-2">
    <form action="updateStatus.php" method="get">
  <button title="Event Completed" type="submit" value="yes" name="Buttom"><span class="accept"></span></button>
<input type='hidden' name='id' value='<?= $row["id"] ?>'/>
</form>
</div>



<div class="col-2">
<form action="editEvent.php" method="get">
<button title="Edit Event" type="submit" value="" name="Buttom"><span class="edit"></span></button>
<input type='hidden' name='id' value='<?= $row["id"] ?>'/>
</form>
  </div>


<div class="col-2">
<form action="updateStatus.php" method="get">
<button title="Event Not Finished" type="submit" value="no" name="Buttom"><span class="reject"></span></button>
<input type='hidden' name='id' value='<?= $row["id"] ?>'/>
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

echo '</div>';

  $conn->close();


   ?>




  <div class="form-group">
<div class="d-flex justify-content-center">
    <form action="addEvent.php">
  <button type="submit"><span class="credits"></span></button>
</form>
</div>
</div>

<div class="container">
<div class="row justify-content-around">

<div class="col-4">


<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Secondary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>


<div style="position:relative; left:35px;">
<div class="row ">

<div class="col-2">
    <form action="updateStatus.php" method="get">
  <button type="submit" value="yes" name="Buttom"><span class="accept"></span></button>
</form>
</div>

<div class="col-2">
<form action="updateStatus.php" method="get">
<button type="submit" value="no" name="Buttom"><span class="reject"></span></button>
</form>
</div>

</div>
</div>

</div>







<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Secondary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Success card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Danger card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>




</div>

</div>
</div>
</div>
</div>






</body>
