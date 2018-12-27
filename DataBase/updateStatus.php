


<?php

//the file updates the status of a certain event and marks it as complete or uncomplete

$completed = $_GET["Buttom"]; //gets the id of the event and which button the user pressed,either finished the event or unfinish it
$id = $_GET["id"];


date_default_timezone_set("America/New_York");
$d = date("Y-m-d h:i:s");     //gets the current time and data to store it


include("connectDB.php");

if($completed == "yes")             //Mark as complete when a user finishes an event
                                    //if the event is completed then an sql query runs that marks it as complete by changing the status to yes
                                    //also adds the current date and time to specified event based on id when did that event been completed
{
$sql= "UPDATE todocalender SET status='$completed' ,completedAt= '$d' WHERE id='$id'";
}
else {
  //marks the status in the database as no, the query changes the status of the event in the database to uncomplete
  $sql= "UPDATE todocalender SET status='$completed'  WHERE id='$id'";
}


if ($conn->query($sql) === TRUE) {
} else {
 //query is bad
}



$conn->close();

header("Location: ../index.php");




 ?>
