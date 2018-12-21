<!DOCTYPE html>
<html>
<head>
<title> Biospective Calender </title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link href="styles.css" rel="stylesheet" type="text/css"  />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>

  <?php
  date_default_timezone_set("America/New_York");
$date = date("M d, Y");
   ?>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" style="color:yellow; position:relative; left:500px;" href="index.php">Calendar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" style="color:yellow; position:relative; left:600px;" href="sortTitle.php">Title View <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:yellow;position:relative; left:700px;" href="sortDate.php">Date View</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:yellow; position:relative; left:800px;" href="calendarView.php">Calendar View</a>
        </li>
        <li class="nav-item">
          <p class="nav-link" style="color:orange; position:relative; left:1000px; top:13px;" ><?=$date?></p>
        </li>
      </ul>

    </div>
  </nav>

  <div class="d-flex justify-content-center" >
    <h1 style="color:yellow;"> Calendar </h1>
  </div>


<div style= "  position: relative; top: 100px;">
  <div class="container">

  <form class="form-horizontal" method="get" action="addEventDB.php">

    <div class="form-group">
    <div class="form-group col-md-2">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title" required>
    </div>
    </div>


    <div class="form-group">
      <label for="description">Description:</label>
      <textarea  class="form-control" rows="3" id="description" name="description" required></textarea>
  </div>

<!--
  <div class="form-group">
    <div class="form-group col-md-2">

      <label for="status">Status</label>
      <select class="form-control form-control-lg " id="status" name="status">
        <option>yes</option>
        <option>no</option>
      </select>
    </div>
    </div>
  -->

    <div class="form-group">
    <div class="form-group col-md-3">
      <label for="dueDate">Due Date:</label>
      <input type="date" class="form-control" id="dueDate" name="dueDate" required>
    </div>
    </div>

    <div class="form-group">
    <div class="form-group col-md-3">
      <label for="dueTime">Due Time:</label>
      <input type="time" class="form-control" id="dueTime" name="dueTime" required>
    </div>
    </div>




    <div class="form-group">
    <button type="submit" class="btn btn-default">Submit</button>
  </div>

  </form>
</div>
</div>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
