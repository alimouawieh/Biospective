<!DOCTYPE html>
<html>
<head>
<title> Biospective Calender </title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
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

echo '<div class="col-3">';

if($check == "Completed")
{
  echo '<div class="card text-white bg-success mb-3" style="width: 18rem; height:20rem;">';

}
else
{
  echo '<div class="card text-white bg-danger mb-3" style="width: 18rem; height:20rem;">';

}
echo ' <div class="card-header">'.$row['title'].'</div>';
echo '  <div class="card-body">';
echo '    <h5 class="card-title">'.$row['dueDate'].'</h5>';
echo '    <p class="card-text">'.$row['description'].'</p>';
echo '    <p class="card-text">'.$row['status'].'</p>';

echo '  </div>';
echo '  </div>';

echo '<div style="position:relative; left:45px;">';
echo '<div class="row ">';

echo '<div class="col-2">';
echo '    <form action="addEvent.php">';
echo '  <button type="submit"><span class="accept"></span></button>';
echo '</form>';
echo '</div>';

echo '<div class="col-2">';
echo '<form action="addEvent.php">';
echo '<button type="submit"><span class="reject"></span></button>';
echo '</form>';
echo '  </div>';

echo '  </div>';
echo '  </div>';

echo '  <br>';
echo '  <br>';
echo '  <br>';

echo '  </div>';


}

  $conn->close();


   ?>
 </div>



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
    <form action="addEvent.php">
  <button type="submit"><span class="accept"></span></button>
</form>
</div>

<div class="col-2">
<form action="addEvent.php">
<button type="submit"><span class="reject"></span></button>
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







</body>
