<?php
session_start();
if(isset($_POST['save'])){
require 'connection.php';
$user_id=$_SESSION['id'];
$name=$_POST['name'];
$dob=$_POST['dob'];
$mn=$_POST['contact'];
$mn2=$_POST['contact2'];
$email=$_POST['email'];
$email2=$_POST['email2'];

$sql = "INSERT INTO Contacts (user_id, name, dob, contact, contact2, email, email2)
VALUES ('$user_id', '$name', '$dob', '$mn', '$mn2', '$email', '$email2')";
if ($conn->query($sql) === TRUE) {
   $msg= "contact added succesfully.!!!";
   header( "location:../index.php?msg=".$msg );
} else {
  $error= "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>