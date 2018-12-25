<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE DATABASE CalenderDB";
if ($conn->query($sql) === TRUE) {

} else {
//    echo "Error creating database: " . $conn->error;
}


$conn->close();

//Create New TABLE
include("connectDB.php");



$sql_createTable = "CREATE TABLE todoCalender (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
description VARCHAR(3000) NOT NULL,
status VARCHAR(50),
dueDate DATE,
dueTime TIME,
createdAt TIMESTAMP,
updatedAt TIMESTAMP,
completedAt TIMESTAMP
)";

if ($conn->query($sql_createTable) === TRUE) {
//    echo "Table todoCalender created successfully";
} else {
//    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
