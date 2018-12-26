

<script>


var titleArray = [];
var timeArray = [];
var displayArray= [];


</script>
<?php

include("connectDB.php");


$sql_selectAll=  mysqli_query($conn, "SELECT * FROM todocalender");


while ($row = mysqli_fetch_array($sql_selectAll))
{
$date = $row['dueDate'];
$time = $row['dueTime'];
$title =  $row['title'];

$date = $date ." ". $time;
$newdate = strtotime($date);
$newD = date("Y",$newdate);
$newDa = date("d,H,i",$newdate);
$newDat = date("m",$newdate);
$newDat = $newDat-1;

$final = $newD . "," . $newDat . "," . $newDa;


?>
<script type="text/javascript">
var newdate = new Date(<?php echo $final ?>);
var dateNow = new Date();
var alertTime = (newdate.getTime() - dateNow.getTime());
var title = "<?php echo $title ?>";
var dueTime = "<?php echo $time ?>";
var display = "Reminder: " + title + " at " + dueTime ;

alertTime = alertTime - 3600000;
if (alertTime > 0)
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



var closestTime =  Math.min.apply(null,timeArray);
var j;
for (var i=0;i<timeArray.length;i++)
{
  if(timeArray[i] === closestTime)
  {
    j = i ;
  }
}

var displays = displayArray[j];

if(timeArray.length > 0)
{


setTimeout(function() { window.alert(displays) }, closestTime);
}


</script>
