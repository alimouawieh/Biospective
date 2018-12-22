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
  date_default_timezone_set("America/New_York");
$date = date("M d, Y");
include("DataBase/alert.php");
   ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" style="color:yellow; position:relative; left:500px;" href="index.php">Calendar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" style="color:yellow; position:relative; left:600px;" href="sortTitle.php">Title View <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:yellow;position:relative; left:700px;" href="sortDate.php">Date View</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:yellow; position:relative; left:800px;" href="calendarView.php">Calendar View</a>
        </li>
        <li class="nav-item">
          <p class="nav-link" style="color:orange; position:relative; left:1000px; top:13px;" ><?=$date?></p>
        </li>
        <li class="nav-item">
          <p class="nav-link" style="color:orange; " ><div id="time" style="color:orange; position:relative; left:1100px; top:-3px; "></div></p>
        </li>
      </ul>

    </div>
  </nav>


  <div class="d-flex justify-content-center" >
    <h1 style="color:yellow;"> Calendar </h1>
  </div>



<div style="position: relative; top:100px;">
<div class="container">
<div class="row justify-content-around">


  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "CalenderDB";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }


$sql_selectAll=  mysqli_query($conn, "SELECT * FROM todocalender ORDER BY dueDate");


while ($row = mysqli_fetch_array($sql_selectAll))
{


$check = $row['status'];
$dueTime = $row['dueTime'];
$d = strtotime($dueTime);
$date = date("h:i  A",$d);

$day = strtotime($row['dueDate']);
$daySelect =  date("D",$day);

echo '<div class="col-3">';


if($check == "yes")
{


echo'  <div class="card text-white bg-secondary mb-3" style="width: 26rem; height:35rem;">';

}
else
{

  echo '<div class="card text-white bg-secondary mb-3" style="width: 26rem; height:35rem;">';

}
?>

 <div class="card-header"><h5> <?= $row['title'] ?></h5> </div>
<div class="card-body">
    <h5 class="card-title"><?= $daySelect ?>       <?= $date ?></h5>
    <p class="card-text"><?= $row['dueDate'] ?></p>
 <p class="card-text"><?= $row['description'] ?></p>


<div class="card-footer">


  <p>Created: <?=$row['createdAt']?></p>

  <?php   if( $row['updatedAt'] != "0000-00-00 00:00:00")   { ?>
  <p>Updated: <?=$row['updatedAt']?></p> <?php } ?>
 <?php if($check=="yes")
 {
  ?>


   <p>Completed: <?=$row['completedAt']?></p>


<?php } ?>
</div>
 </div>


 <?php
echo '</div>';
  ?>


<div style="position:relative; left:58px;">
<div class="row ">

<div class="col-2">
    <form action="DataBase/updateStatus.php" method="get">
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


</div>
</div>
</div>






</body>

<script>



function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  // add a zero in front of numbers<10
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
  t = setTimeout(function() {
    startTime()
  }, 500);
}
startTime();
</script>
