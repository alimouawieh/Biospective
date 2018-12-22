


<?php

$completed = $_GET["Buttom"];
$id = $_GET["id"];


date_default_timezone_set("America/New_York");
$d = date("Y-m-d h:i:s");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CalenderDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($completed == "yes")             //Mark as complete when a user finishes an event
{
$sql= "UPDATE todocalender SET status='$completed' ,completedAt= '$d' WHERE id='$id'";
}
else {
  $sql= "UPDATE todocalender SET status='$completed'  WHERE id='$id'";
}


if ($conn->query($sql) === TRUE) {
} else {
   echo "Error adding to table: " . $conn->error;
}



$conn->close();

header("Location: ../index.php");




 ?>
