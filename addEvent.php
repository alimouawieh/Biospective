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


<div style= "  position: relative; top: 100px;">
  <div class="container">

  <form class="form-horizontal" method="get" action="addEventDB.php">

    <div class="form-group">
    <div class="form-group col-md-2">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    </div>


    <div class="form-group">
      <label for="description">Description:</label>
      <textarea  class="form-control" rows="3" id="description" name="description"></textarea>
  </div>

  <div class="form-group">
    <div class="form-group col-md-2">

      <label for="status">Status</label>
      <select class="form-control form-control-lg " id="status" name="status">
        <option>Completed</option>
        <option>Not Done</option>
      </select>
    </div>
    </div>

    <div class="form-group">
    <div class="form-group col-md-3">
      <label for="dueDate">Due Date:</label>
      <input type="datetime-local" class="form-control" id="dueDate" name="dueDate">
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
