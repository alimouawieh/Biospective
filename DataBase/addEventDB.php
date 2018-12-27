<?php


//this file adds an event do the database, the file gets all the details from the user such as title and duedate etc...
$title = $_GET["title"];
$description = $_GET["description"];
$status = "no";
$dueDate = $_GET["dueDate"];
$dueTime= $_GET["dueTime"];
$timeNow = date('Y-m-d G:i:s');
include("connectDB.php");

//sql query to add all the date to base and create a new slot, for the time created, function now() is used that adds time based on the current time
$sql_addEvent = "INSERT INTO todoCalender (title, description, status, dueDate,dueTime, createdAt)
VALUES ('$title', '$description' , '$status', '$dueDate', '$dueTime', now())";




//checks if value have been added to database
if ($conn->query($sql_addEvent) === TRUE) {

} else {
   echo "Error adding to table: " . $conn->error;
}

$conn->close();
//goes back to index page after an event is added
header("Location: ../index.php");
?>
