<!DOCTYPE html>
<html>
<head>
<title> Biospective Calender </title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="styles.css" rel="stylesheet" type="text/css"  />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<?php
include("DataBase/alert.php"); //includes alert for an hour before due time of an event
?>
<body>

  <?php
  date_default_timezone_set("America/New_York");
$date = date("M d, Y");
include("navbar.php");
 ?>

<div class="form-horizontal">
<div style="position:relative; top:50px;" class="d-flex justify-content-center">
</div>
<?php
include("calendar.php");    //includes a calendar view that display a big calendar with events that are saved
?>
</div>
<div style="position:relative; left:50px;">
<div class="d-flex justify-content-center" >

<?php
if(isset($_GET['id']))    //checks if a user choose any event in the calendar view to display it, else it only views the calendar
{
  $id =$_GET['id'];
  include("DataBase/connectDB.php");

    //Database Query to check on which event user pressed on the calendar and display it in the page
  $sql_selectAll=  mysqli_query($conn, "SELECT * FROM todocalender where id='$id'");


  while ($row = mysqli_fetch_array($sql_selectAll))
  {
  $check = $row['status'];
  $dueTime = $row['dueTime'];
  $d = strtotime($dueTime);
  $date = date("h:i  A",$d);
  $day = strtotime($row['dueDate']);
  $daySelect =  date("D",$day);

  echo '<div class="col-3">';


  if($check == "yes")
  {
  echo'  <div class="card text-white bg-secondary mb-3" style="width: 26rem; height:35rem;">';
  }
  else
  {
    echo '<div class="card text-white bg-secondary mb-3" style="width: 26rem; height:35rem;">';
  }
  ?>

   <div class="card-header"><h5> <?= $row['title'] ?></h5> </div>
  <div class="card-body">
      <h5 class="card-title"><?= $daySelect ?>       <?= $date ?></h5>
      <p class="card-text"><?= $row['dueDate'] ?></p>
   <p class="card-text"><?= $row['description'] ?></p>


  <div class="card-footer">


    <p>Created: <?=$row['createdAt']?></p>

    <?php   if( $row['updatedAt'] != "0000-00-00 00:00:00")   { ?>
    <p>Updated: <?=$row['updatedAt']?></p> <?php } ?>
   <?php if($check=="yes")
   {
    ?>
    <p style="color: #72F509;">Completed: <?=$row['completedAt']?></p>
  <?php } ?>
  </div>
   </div>


   <?php
  echo '</div>';
    ?>


  <div style="position:relative; left:40px;">
  <div class="row ">

  <div class="col-2">
      <form action="DataBase/updateStatus.php" method="get">
    <button title="Event Completed" type="submit" value="yes" name="Buttom"><span class="accept"></span></button>
  <input type='hidden' name='id' value='<?= $row["id"] ?>'/>
  </form>
  </div>



  <div class="col-2">
  <form action="editEvent.php" method="get">
  <button title="Edit Event" type="submit" value="" name="Buttom"><span class="edit"></span></button>
  <input type='hidden' name='id' value='<?= $row["id"] ?>'/>
  </form>
    </div>


  <div class="col-2">
  <form action="DataBase/updateStatus.php" method="get">
  <button title="Event Not Finished" type="submit" value="no" name="Buttom"><span class="reject"></span></button>
  <input type='hidden' name='id' value='<?= $row["id"] ?>'/>
  </form>
    </div>

    </div>
    </div>

    <br>
   <br>
    <br>

    </div>
    <?php
  }
  echo '</div>';
  $conn->close();


}
 ?>
</div>
</div>

</body>
