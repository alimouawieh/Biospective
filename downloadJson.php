
<?php

//This page download a json file or can be used to send data using json

include("DataBase/connectDB.php");  //includes a call to the database

$response = array(); //creates arrays of response and posts
$posts = array();
//query to get all data from database
$result=  mysqli_query($conn, "SELECT *FROM todocalender ");

while ($row = mysqli_fetch_assoc($result))

{
  //gets specific data and stores them in temporary php variables
  $title=$row['title'];
  $description=$row['description'];
  $status=$row['status'];
  $dueDate=$row['dueDate'];
  $dueTime=$row['dueTime'];
  $createdAt=$row['createdAt'];
  $updatedAt=$row['updatedAt'];
  $completedAt=$row['completedAt'];

  echo $title;
  echo " ";
  echo $status;
  echo " ";
  echo $description;
  echo " ";
  echo $dueDate;
  echo " ";
  echo $dueTime;
  echo " ";
  echo $createdAt;
  echo " ";
  echo $completedAt;
  echo " ";
  echo $updatedAt;

//adds all the values to the array with their names
  $posts[] = array('title'=> $title, 'description'=> $description, 'status'=> $status, 'dueDate'=> $dueDate, 'dueTime'=> $dueTime,
'createdAt'=> $createdAt, 'completedAt'=> $completedAt, 'updatedAt'=> $updatedAt,);


}



//array is copied
$response['posts'] = $posts;

$fp = fopen('results.json', 'w'); //opens a json file
fwrite($fp, json_encode($response)); //posts the array that we stored from database inside the json file
fclose($fp);

$conn->close();
 //force download of the json file
header('Content-disposition: attachment; filename=file.json');
header('Content-type: application/json');
echo $fp;








?>
