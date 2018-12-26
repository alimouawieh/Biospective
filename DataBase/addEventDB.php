<?php

$title = $_GET["title"];
$description = $_GET["description"];
$status = "no";
$dueDate = $_GET["dueDate"];
$dueTime= $_GET["dueTime"];
$timeNow = date('Y-m-d G:i:s');








include("connectDB.php");


$sql_addEvent = "INSERT INTO todoCalender (title, description, status, dueDate,dueTime, createdAt)
VALUES ('$title', '$description' , '$status', '$dueDate', '$dueTime', now())";





if ($conn->query($sql_addEvent) === TRUE) {
    echo "Added values to table successfully";
} else {
   echo "Error adding to table: " . $conn->error;
}

$conn->close();

header("Location: ../index.php");
?>
