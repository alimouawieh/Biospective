<?php

$title = $_GET["title"];
$description = $_GET["description"];
$status = $_GET["status"];
$dueDate = $_GET["dueDate"];
$dueTime= $_GET["dueTime"];
$timeNow = date('Y-m-d G:i:s');








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


$sql_addEvent = "INSERT INTO todoCalender (title, description, status, dueDate,dueTime, createdAt)
VALUES ('$title', '$description' , '$status', '$dueDate', '$dueTime', now())";





if ($conn->query($sql_addEvent) === TRUE) {
    echo "Added values to table successfully";
} else {
   echo "Error adding to table: " . $conn->error;
}

$conn->close();

header("Location: index.php");
?>
