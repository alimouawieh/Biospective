
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CalenderDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array();
$posts = array();
$result=  mysqli_query($conn, "SELECT *FROM todocalender ");

while ($row = mysqli_fetch_assoc($result))

{
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

  $posts[] = array('title'=> $title, 'description'=> $description, 'status'=> $status, 'dueDate'=> $dueDate, 'dueTime'=> $dueTime,
'createdAt'=> $createdAt, 'completedAt'=> $completedAt, 'updatedAt'=> $updatedAt,);


}




$response['posts'] = $posts;

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

$conn->close();

header('Content-disposition: attachment; filename=file.json');
header('Content-type: application/json');
echo $fp;








?>
