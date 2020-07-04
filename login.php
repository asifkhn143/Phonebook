
<!DOCTYPE html>
<html>

<?php require 'head.php'; ?>

<body>      
     <?php require 'header.php'; ?>

  <div class="container-fluid">

    <div class="row justify-content-center">

      <div class="col-lg-3 col-md-4 col-sm-6">

  <?php if(isset($_GET['mssg'])) { ?>
  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong><?php echo $_GET['mssg'];?> </strong>
  </div>
  <?php }?>

    <div class="card">
        <form method="POST" action="files/login-script.php">
          <div class="card-body">

            <div class="card-header text-center"><h3>User Login</h3></div>

            <label>Email</label>
            <input type="email" name="email" placeholder="Email" class="form-control" required="">

            <label>Password</label>
            <input type="password" name="password" placeholder="Password" class="form-control" required=""><br>

            <div class="card-footer text-right">
            <input type="submit" name="login" value="login" class="btn btn-success">
          </div>
          <br>Don't have account? <a href="signup.php" class="text-danger">signup</a>
          
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</body>
</html>