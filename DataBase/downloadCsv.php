<?php


include("connectDB.php");

header('Content-type: text/csv');
header('Content-Disposition: attachment; filename="demo.csv"');
header('Pragma: no-cache');
header('Expires: 0');
$file = fopen('php://output', 'w');
fputcsv($file, array('ID' ,'Title', 'Description', 'Completed','Due Date', 'Due Time', 'Created At' , 'Completed At' , 'Updated At'));

$sql=  mysqli_query($conn, "SELECT *FROM todocalender ");

while ($row = mysqli_fetch_assoc($sql))

{
  $array = array();
  fputcsv($file, $row);
}




exit();
$conn->close();
header("Location: ../index.php");
?>
