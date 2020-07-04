<?php 
session_start();
if (!isset($_SESSION['id'])) {
  header('location:login.php');
}else{
include 'files/connection.php';

if(isset($_GET['edit'])){
$sql = "SELECT * FROM Contacts WHERE id =" .$_GET['edit'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
}

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $contact2 = $_POST['contact2'];
    $email = $_POST['email'];
    $email2 = $_POST['email2'];

    $update = "UPDATE Contacts SET name='$name', dob='$dob', contact='$contact', contact='$contact', email='$email', email2='$email2' WHERE id=". $_GET['edit'];

  $up = mysqli_query($conn, $update);

if(isset($sql)){
  $msg= "contact updated succesfully.";
  header( "location:index.php?msg=".$msg );
}else{ die ("Error $sql" .mysqli_connect_error()); }
}

?>

<!DOCTYPE html>
<html>

<?php require 'head.php'; ?>

<body>      
     <?php require 'header.php'; ?>

  <div class="container-fluid">

    <div class="row justify-content-center">

      <div class="col-lg-3 col-md-4 col-sm-6">

    <div class="card">

    <form method="post">
    <div class="card-body">
      <div class="card-header text-center"> <h3>Update Contact</h3> </div>

       <label>Name </label>
       <input type="text" name="name" placeholder="Name" value="<?php echo $row['name']; ?>" class="form-control">

       <label>Dob </label>
       <input type="date" name="dob" placeholder="Date of birth" value="<?php echo $row['dob']; ?>" class="form-control">

       <label>Email </label>
       <input type="text" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" class="form-control">
      
       <label>Email </label>
       <input type="email" name="email2" placeholder="Email" value="<?php echo $row['email2']; ?>" class="form-control">

       <label>Contact </label>
       <input type="text" name="contact" placeholder="Contact" value="<?php echo $row['contact']; ?>" class="form-control">

       <label>Contact </label>
       <input type="text" name="contact2"  value="<?php echo $row['contact2']; ?>" placeholder="Contact" class="form-control"><br>
    

       <div class="card-footer">
        <a href="index.php">
        <button type="button" value="button" class="btn btn-danger">Cancel</button></a>
        <button type="submit" name="update" id="btn-update" class="btn btn-primary pull-right"><strong>Update</strong></button>
      </div>

    </form>
  </div>
   </div>
  </div>    
 </div>
</div>
  
</body>
</html>
<?php } ?>