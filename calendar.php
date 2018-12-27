
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/lib/jquery.min.js'></script>
<script src='fullcalendar/fullcalendar.min.js'></script>
<script src='fullcalendar/demos/js/theme-chooser.js'></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">



<script>


var event = [];
<?php include("DataBase/connectDB.php");
date_default_timezone_set("America/New_York");
$todayDate = date("Y-m-d");
$sql_selectAll=  mysqli_query($conn, "SELECT * FROM todocalender");
while ($row = mysqli_fetch_array($sql_selectAll))
{

  $d= strtotime($row['dueDate']);
  $t = strtotime($row['dueTime']);
  $date = date("Y-m-d",$d);
  $time = date("H:i:s",$t);
  $dateString = (string)$date;
  $timeString = (string)$time;
  $eventTime = $dateString . "T" . $timeString;
  $id= $row['id'];

?>
event.push({
              title: '<?= $row['title']?>',
              start: '<?=$eventTime?>',
              url:'calendarView.php?id=<?=$id?>',
                  });

<?php
}
$conn->close();
 ?>

$(document).ready(function() {


    $('#calendar').fullCalendar({



        header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '<?=$todayDate?>',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow more" link when too many events


      events: event
    });

  });


</script>
<style>
body {
    margin: 0;
    padding: 0;
    font-size: 14px;
  }

  #top,
  #calendar.fc-unthemed {
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
  }

  #top {
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    font-size: 12px;
    color: #000;
  }

  #top .selector {
    display: inline-block;
    margin-right: 10px;
  }

  #top select {
    font: inherit; /* mock what Boostrap does, don't compete  */
  }

  .left { float: left }
  .right { float: right }
  .clear { clear: both }

  #calendar {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 10px;
  }
</style>
</head>




  <div style="width:600px;length:600px; color:yellow; position:relative; top:-30px; " id='calendar'></div>





</html>
