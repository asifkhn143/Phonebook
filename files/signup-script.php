<?php
if(isset($_POST['signup'])){
require 'connection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$contact=$_POST['contact'];
$sql = "INSERT INTO users (name, email, password, contact)
VALUES ('$name','$email', '$password', '$contact')";
if ($conn->query($sql) === TRUE) {
$mssg = "Your account is created succesfully" .'<br>'. "Login to continue.!!!";
header( "location:../login.php?mssg=".$mssg );
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>