<?php


//page that edits a specific event in the DataBase
//gets what to be edited and id of the event and the new data that to be stored
$id = $_GET['id'];
$type = $_GET['type'];
$input = $_GET['input'];


date_default_timezone_set("America/New_York");
$d = date("Y-m-d h:i:s"); //gets the current time and a date and specific way to be able to add it to the database


include("connectDB.php");

//nested if and else that checks what to change, then a query to change what is specified along with the new input. id file is included to determine which event to change
//the file also gets the current time and date and change the value of updatedTime in the databse to the current time
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
