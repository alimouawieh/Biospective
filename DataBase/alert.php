

<script>

//creates javascript arrays that will store data after it have been got from the database
var titleArray = [];
var timeArray = [];
var displayArray= [];


</script>
<?php

include("connectDB.php");

//query to get everything from the database
$sql_selectAll=  mysqli_query($conn, "SELECT * FROM todocalender");


while ($row = mysqli_fetch_array($sql_selectAll))
{

//starts getting the data from database and store them in temporary php cariables
$date = $row['dueDate'];
$time = $row['dueTime'];
$title =  $row['title'];

//gets time and data in a way javascript will understand them once creating variables
$date = $date ." ". $time;
$newdate = strtotime($date);
$newD = date("Y",$newdate);
$newDa = date("d,H,i",$newdate);
$newDat = date("m",$newdate);
//subtract month by 1 since javascript month dates are from 0-11
$newDat = $newDat-1;
//creates a new date and time in javascript format
$final = $newD . "," . $newDat . "," . $newDa;


?>
<script type="text/javascript">
//javascript variables that reads php variables that are called from database
var newdate = new Date(<?php echo $final ?>);
var dateNow = new Date();
//gets current data and time and event data and time and calculates after how many MILLISECONDS that event will happen
var alertTime = (newdate.getTime() - dateNow.getTime());
var title = "<?php echo $title ?>";
var dueTime = "<?php echo $time ?>";
//display is reminder that display the title and time of an event before it occurs
var display = "Reminder: " + title + " at " + dueTime ;

alertTime = alertTime - 3600000; //make an alert before an hour from an event in milliseconds
if (alertTime > 0) //if an event didnt happen it gets push do the arrays
{
displayArray.push(display);
timeArray.push(alertTime);
}


</script>

<?php


}
  $conn->close();
?>

<script>



var closestTime =  Math.min.apply(null,timeArray); //checks the smalles varibale in an array to determine which is the closest event will happen soon
var j;
for (var i=0;i<timeArray.length;i++) // a loop to check the id of the event that will happen the soones
{
  if(timeArray[i] === closestTime)
  {
    j = i ;
  }
}

var displays = displayArray[j]; //gets the id of the event that will hapen soonest

if(timeArray.length > 0) //check if there is any event in the database or array
{

// a function that will display the alert after a specified time based on milliseconds that we calculated and got from the array
// Along with the what to display based on the event id
setTimeout(function() { window.alert(displays) }, closestTime);
}


</script>
