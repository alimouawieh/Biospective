<?php
date_default_timezone_set("America/New_York");
$date = date("M d, Y");
 ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" style="color:yellow; position:relative; left:430px; font-size:20px" href="index.php">Calendar <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" style="color:yellow; position:relative; left:530px;" href="sortTitle.php">Title View <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:yellow;position:relative; left:600px;" href="sortDate.php">Date View</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:yellow; position:relative; left:670px;" href="calendarView.php">Calendar View</a>
      </li>
      <li class="nav-item">
        <p class="nav-link" style="color:orange; position:relative; left:1100px; top:13px;" ><?=$date?></p>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:yellow; position:relative; left:650px;" href="pickDate.php">Pick Date</a>
      </li>
      <li class="nav-item">
        <p class="nav-link" style="color:orange; " ><div id="time" style="color:orange; position:relative; left:1100px; top:-3px; "></div></p>
      </li>
    </ul>

  </div>
</nav>

<script>



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
