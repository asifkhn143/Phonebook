<!DOCTYPE html>
<html>

<?php require 'head.php'; ?>

<body>      
     <?php require 'header.php'; ?>

  <div class="container-fluid">

    <div class="row justify-content-center">

      <div class="col-lg-3 col-md-4 col-sm-6">

    <div class="card">

        <form method="POST" action="files/signup-script.php">
          <div class="card-body">

            <div class="card-header text-center"><h3>User Signup</h3></div>
 
            <label>Name<b>**</b></label>
            <input type="text" name="name" placeholder="Name" class="form-control" required="">

            <label>Email<b>**</b></label>
            <input type="email" name="email" placeholder="Email" class="form-control" required="">

            <label>Password<b>**</b></label>
            <input type="password" name="password" placeholder="Password" class="form-control" required="">

            <label>Contact<b>**</b></label>
            <input type="text" name="contact" placeholder="contact" class="form-control" required=""><br>

          <div class="card-footer">
            <input type="submit" name="signup" value="signup" class="btn btn-success float-right">
            <a href="login.php"><button class="btn btn-danger">Cancel</button></a>
          </div>
          <br>Already have an account? <a href="login.php" class="text-danger">login</a>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</body>
</html>
