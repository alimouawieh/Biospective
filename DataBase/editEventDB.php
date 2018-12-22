<?php

$id = $_GET['id'];
$type = $_GET['type'];
$input = $_GET['input'];

echo $id;
echo $type;
echo $input;



date_default_timezone_set("America/New_York");
$d = date("Y-m-d h:i:s");


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


if($type == "title")
{
  $sql= "UPDATE todocalender SET title='$input' ,updatedAt= '$d' WHERE id='$id'";
}

else if($type == "description")
{
  $sql= "UPDATE todocalender SET description='$input' ,updatedAt= '$d' WHERE id='$id'";
}

else if($type == "date")
{
  $sql= "UPDATE todocalender SET dueDate='$input' ,updatedAt= '$d' WHERE id='$id'";
}

else
{
  $sql= "UPDATE todocalender SET dueTime='$input' ,updatedAt= '$d' WHERE id='$id'";
}


if ($conn->query($sql) === TRUE) {
    echo "Updated values to table successfully";
} else {
//   echo "Error adding to table: " . $conn->error;
}

$conn->close();

header("Location: ../editEvent.php?id=$id");


 ?>
