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

$id = $_GET['id'];


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



$sql=  mysqli_query($conn, "SELECT * FROM todocalender WHERE id = '$id' ");


while ($row = mysqli_fetch_array($sql))

{

  $day = strtotime($row['dueDate']);
  $daySelect =  date("D",$day);


  $dueTime = $row['dueTime'];
  $d = strtotime($dueTime);
  $date = date("h:i",$d);


 ?>


 <div style= "  position: relative; top: 100px;">
   <div class="container">
<div class="d-flex justify-content-center">


    <div class="card" style="height:40rem; width: 25rem;">
     <div class="card-body">
       <h5 class="card-title"><?= $row['title'] ?></h5>
       <p class="card-text"><?= $row['description'] ?></p>
     </div>
     <ul class="list-group list-group-flush">
       <li class="list-group-item"><?= $row['dueDate'] ?></li>
       <li class="list-group-item"><?= $date ?></li>
       <li class="list-group-item"><?= $daySelect ?></li>
     </ul>
     <div class="card-body">
       <a href="#" class="card-link">Card link</a>
       <a href="#" class="card-link">Another link</a>
     </div>
   </div>


 </div>
 </div>
</div>




<?php
}
$conn->close();
 ?>


</body>
