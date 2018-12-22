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
  $date = date("h:i  A",$d);


 ?>


 <div style= "  position: relative; top: 100px;">
   <div class="container-fluid">
<div class="d-flex justify-content-center">




    <div class="card" style="height:30rem; width: 25rem;">
     <div class="card-body">
       <h3 class="card-title"><?= $row['title'] ?></h3>
        <p class="card-text"><?= $row['description'] ?></p>
     </div>
     <ul class="list-group list-group-flush">
       <li class="list-group-item"><?= $daySelect ?></li>
       <li class="list-group-item"><?= $date ?></li>
       <li class="list-group-item"><?= $row['dueDate'] ?></li>
     </ul>
     <div class="card-body">

     </div>
   </div>





</div>

<div class="d-flex justify-content-center" style="position:relative; top:30px;">

<div class="row">
<button title="Edit Title" class="btn btn-default" style="width:115px; position: relative; right:10px;"   onclick="titleFunction()" type="button" >Edit Title</button>
<button title="Edit Description" class="btn btn-default" style="width:115px; position: relative; left:10px;"   onclick="descriptionFunction()" type="button" >Edit Description</button>
</div>



</div>

<div class="d-flex justify-content-center" style="position:relative; top:40px;">
  <div class="row">
  <button title="Edit Date" class="btn btn-default" style="width:115px; position: relative; right:10px;"   onclick="dateFunction()" type="button" >Edit Date</button>
  <button title="Edit Time" class="btn btn-default" style="width:115px; position: relative; left:10px;"   onclick="timeFunction()" type="button" >Edit Time</button>
  </div>
</div>


<div class="d-flex justify-content-center">

<div id="titleDIV" style="color:white; position:relative; top:50px; ">
  <label for="title">Title:</label>
  <form action="DataBase/editEventDB.php" method="get">
  <input type="text" class="form-control" id="title" name="input" required>
  <input type='hidden' name='id' value='<?= $row["id"] ?>'/>
  <input type='hidden' name='type' value='title'/>
  <button title="Edit Date" class="btn btn-success" style="width:115px; position:relative; top:20px; left:33px;" type="submit" >Submit</button>

</form>
</div>

<div id="descriptionDIV" style="color:white; position:relative; top:50px; ">
  <label for="description">Description:</label>
  <form action="DataBase/editEventDB.php" method="get">
<textarea  class="form-control" style="width :400px;" rows="3" id="description" name="input" required></textarea>
<input type='hidden' name='id' value='<?= $row["id"] ?>'/>
<input type='hidden' name='type' value='description'/>
  <button title="Edit Date" class="btn btn-success" style="width:115px; position:relative; top:20px; left:140px;" type="submit" >Submit</button>
</form>
  </div>


<div id="dateDIV" style="color:white; position:relative; top:50px; ">
  <label for="title">Date:</label>
  <form action="DataBase/editEventDB.php" method="get">
  <input type="date" class="form-control" id="date" name="input" required>
  <input type='hidden' name='id' value='<?= $row["id"] ?>'/>
  <input type='hidden' name='type' value='date'/>
  <button title="Edit Date" class="btn btn-success" style="width:115px; position:relative; top:20px; left:25px;" type="submit" >Submit</button>
  </form>
  </div>


<div id="timeDIV" style="color:white; position:relative; top:50px; ">
  <label for="time">Date:</label>
  <form action="DataBase/editEventDB.php" method="get">
  <input type="time" class="form-control" id="date" name="input" required>
  <input type='hidden' name='id' value='<?= $row["id"] ?>'/>
  <input type='hidden' name='type' value='time'/>
  <button title="Edit Date" class="btn btn-success" style="width:115px; position:relative; top:20px;left:5px;" type="submit" >Submit</button>
  </form>
  </div>


</div>

 </div>
 </div>
</div>


<?php
}
$conn->close();
 ?>



<script>

var x = document.getElementById("titleDIV");
x.style.display = "none";

var y = document.getElementById("descriptionDIV");
y.style.display = "none";

var y = document.getElementById("dateDIV");
y.style.display = "none";

var h = document.getElementById("timeDIV");
h.style.display = "none";

function titleFunction() {
  var x = document.getElementById("titleDIV");
  var description = document.getElementById("descriptionDIV");
  description.style.display = "none";

  var date = document.getElementById("dateDIV");
  date.style.display = "none";

  var time = document.getElementById("timeDIV");
  time.style.display = "none";

  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function descriptionFunction() {
  var x = document.getElementById("descriptionDIV");
  var title = document.getElementById("titleDIV");
  title.style.display = "none";

  var date = document.getElementById("dateDIV");
  date.style.display = "none";

  var time = document.getElementById("timeDIV");
  time.style.display = "none";

  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function dateFunction() {
  var x = document.getElementById("dateDIV");
  var description = document.getElementById("descriptionDIV");
  description.style.display = "none";

  var title = document.getElementById("titleDIV");
  title.style.display = "none";

  var time = document.getElementById("timeDIV");
  time.style.display = "none";


  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function timeFunction() {
  var x = document.getElementById("timeDIV");
  var description = document.getElementById("descriptionDIV");
  description.style.display = "none";

  var title = document.getElementById("titleDIV");
  title.style.display = "none";

  var date = document.getElementById("dateDIV");
  date.style.display = "none";

  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


</script>






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
