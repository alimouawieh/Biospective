<?php
date_default_timezone_set("America/New_York");
$date = date("M d, Y");
 ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

</button> <!-- bootsrap Navbar that is included in all pages and displays link to different pages -->

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">    <!-- display calendar which links to home page or index -->
        <a class="nav-link" style="color:yellow; position:relative; left:430px; font-size:20px" href="index.php">Calendar <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">  <!-- display title page which view all events sorted by title -->
        <a class="nav-link" style="color:yellow; position:relative; left:530px;" href="sortTitle.php">Title View <span class="sr-only"></span></a>
      </li>
      <li class="nav-item"> <!-- display title page which view all events sorted by Date -->
        <a class="nav-link" style="color:yellow;position:relative; left:600px;" href="sortDate.php">Date View</a>
      </li>
      <li class="nav-item"> <!-- display title page which view all events stored in a calendar which shows all days of a month -->
        <a class="nav-link" style="color:yellow; position:relative; left:670px;" href="calendarView.php">Calendar View</a>
      </li>
      <li class="nav-item">   <!-- display today date -->
        <p class="nav-link" style="color:orange; position:relative; left:1100px; top:13px;" ><?=$date?></p>
      </li>
      <li class="nav-item"> <!-- links to page where user can pick a specific date and find all events for that date -->
        <a class="nav-link" style="color:yellow; position:relative; left:650px;" href="pickDate.php">Pick Date</a>
      </li>
      <li class="nav-item"> <!-- display the current time including seconds -->
        <p class="nav-link" style="color:orange; " ><div id="time" style="color:orange; position:relative; left:1100px; top:-3px; "></div></p>
      </li>
    </ul>

  </div>
</nav>

<script>


 //recursive function check time that constatly changes and display the current time along with the getSeconds
 //Note:  the function is used from stackoverfloow
function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  // add a zero in front of numbers<10
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
  t = setTimeout(function() {
    startTime()
  }, 500);
}
startTime();


</script>
