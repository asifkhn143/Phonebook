<?php
session_start();
include_once 'connection.php';
$sql = "DELETE FROM Contacts WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
	$msg="contact deleted successfully..!!!";
	header( "location:../index.php?msg=".$msg );
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>