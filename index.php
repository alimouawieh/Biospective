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
include("DataBase/alert.php"); //includes the an alert if an event will occur and includes the navbar
include("navbar.php");
   ?>

  <?php
  include("DataBase/createDB.php");
  ?>
<div style="position: relative; top:100px;">
<div class="container">
<div class="row justify-content-around">
  <?php
include("DataBase/connectDB.php");   //connects to DataBase

$sql_selectAll=  mysqli_query($conn, "SELECT * FROM todocalender"); //query that gets everything from database
while ($row = mysqli_fetch_array($sql_selectAll)) //fetches everything in the database
{


$check = $row['status']; //gets the date and time from database, format them to human language using strotime and extract day,month,year,hour and minute
$dueTime = $row['dueTime'];
$d = strtotime($dueTime);
$date = date("h:i  A",$d);

$day = strtotime($row['dueDate']);
$daySelect =  date("D",$day);
$title = $row['title'];
echo '<div class="col-3">';
echo '<div class="card text-white bg-secondary mb-3" style="width: 26rem; height:35rem;">'; //properties of a card to output from bootstrap
?>
<div  class="card-header"><h5><?=$row["title"]?></h5> </div>
<div class="card-body">
    <h5 class="card-title"><?= $daySelect ?>       <?= $date ?></h5>
    <p class="card-text"><?= $row['dueDate'] ?></p>
 <p class="card-text"><?= $row['description'] ?></p>
<div class="card-footer">


  <p>Created: <?=$row['createdAt']?></p>

  <?php   if( $row['updatedAt'] != "0000-00-00 00:00:00")   { ?> <!-- checks if the event have been updates,if true it will ouput the updated date -->
  <p>Updated: <?=$row['updatedAt']?></p> <?php } ?>
 <?php if($check=="yes")
 {
  ?>
<p style="color: #72F509;">Completed: <?=$row['completedAt']?></p>  <!-- checks if the event have been completed,if true it outputs the time of completion -->
<?php } ?>
</div>
 </div>
 <?php
echo '</div>';

  ?>

<div style="position:relative; left:58px;">
<div class="row ">

<div class="col-2">       <!-- Button to submit that the event have been completed -->
    <form action="DataBase/updateStatus.php" method="get">
  <button title="Event Completed" type="submit" value="yes" name="Buttom"><span class="accept"></span></button>
<input type='hidden' name='id' value='<?= $row["id"] ?>'/>
</form>
</div>



<div class="col-2">   <!-- Button to to edit a specific  -->
<form action="editEvent.php" method="get">
<button title="Edit Event" type="submit" value="" name="Buttom"><span class="edit"></span></button>
<input type='hidden' name='id' value='<?= $row["id"] ?>'/>
</form>
  </div>


<div class="col-2">   <!-- Button to submit that the event have not been completed -->
<form action="DataBase/updateStatus.php" method="get">
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


<div class="form-group">
<div class="d-flex justify-content-center">
  <div class="row">
  <form action="DataBase/downloadCsv.php">        <!-- 2 buttons that connects to database and download json or CSV files with allthe data  -->
<button type="submit" class="btn btn-default" style="position:relative; right:3px;"><span class="glyphicon glyphicon-download"></span>Download CVS</button>
</form>

<form action="DataBase/downloadJson.php">
<button type="submit" class="btn btn-default" style="position:relative; left:3px;"><span class="glyphicon glyphicon-download"></span>Download Json</button>
</form>

</div>
</div>
</div>

</div>
</div>
</div>
</body>
