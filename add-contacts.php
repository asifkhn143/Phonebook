<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('location:login.php');
}else{ ?>

<!DOCTYPE html>
<html>

<?php require 'head.php';?>

<body>      
     <?php require 'header.php'; ?>

  <div class="container-fluid">

    <div class="row justify-content-center">

      <div class="col-lg-3 col-md-4 col-sm-6">

    <div class="card">

        <form method="POST" action="files/add-contacts-script.php">
          <div class="card-body">

            <div class="card-header text-center"><h3>Add Contact</h3></div>
               <b>*required</b><br>
            <label>Name<b>**</b></label>
                <input type="text" class="form-control" name="name" placeholder="Name" required="">

            <label>Date Of Birth<b>**</b></label>
                <input type="date" class="form-control" name="dob" placeholder="dd/mm/yyyy">
 
            <label>Contact<b>**</b></label>
               <input type="text" class="form-control" name="contact" placeholder="Contact number" required="">
            <label>Contact</label>
               <input type="text" class="form-control" name="contact2" placeholder="Contact number">

            <label>Email<b>**</b></label>
              <input type="email" class="form-control" name="email" placeholder="Email" required="">
            <label>Email</label>
              <input type="email" class="form-control" name="email2" placeholder="Email"><br>
        

            <div class="card-footer">
              <a href="index.php">
              <button type="button" value="button" class="btn btn-danger">Cancel</button></a>
              <button type="submit" name="save" class="btn btn-success pull-right"> Save </button>
            </div>

          </div>

        </form>

        </div>
      </div>
    </div>
</div>

</body>
</html>
<?php } ?>