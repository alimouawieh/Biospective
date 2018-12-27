<?php


include("connectDB.php"); //connects to database

//forces download of a csv file
header('Content-type: text/csv');
header('Content-Disposition: attachment; filename="demo.csv"');
header('Pragma: no-cache');
header('Expires: 0');
$file = fopen('php://output', 'w'); //opens the file and store the header of data that to be displayed
fputcsv($file, array('ID' ,'Title', 'Description', 'Completed','Due Date', 'Due Time', 'Created At' , 'Completed At' , 'Updated At'));

//query to get everything from database
$sql=  mysqli_query($conn, "SELECT *FROM todocalender ");

while ($row = mysqli_fetch_assoc($sql))

{
  $array = array();
  fputcsv($file, $row); //puts every row that it gets from the database to the csv files
}




exit();
$conn->close();
header("Location: ../index.php"); //heads back to the index file after the csv file is being downloaded 
?>
