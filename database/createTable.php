<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Phonebook";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// sql to create table
$sql = "CREATE TABLE Contacts (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
dob DATE not null,
contact VARCHAR(255) not null,
contact2 VARCHAR(255),
email VARCHAR(100) not null,
email2 VARCHAR(100),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
  echo "Table Contacts created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>