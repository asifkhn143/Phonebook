<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('location:login.php');
}else{
require 'files/connection.php';
$user_id=$_SESSION['id'];

$results_per_page = 4;


$sql="SELECT * FROM Contacts WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);


$number_of_pages = ceil($number_of_results/$results_per_page);


if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
  $Previous = $page - 1;
  $Next = $page + 1;
}

if ($page == 1) {
  $Previous = $page - 0;
  $Next = $page + 1;
}

$limit = ($page-1)*$results_per_page;


$sql="SELECT * FROM Contacts WHERE user_id='$user_id' LIMIT " . $limit . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql); 
} ?>


<!DOCTYPE html>
<html>
<?php require 'head.php'; ?>
<body>
   <?php require 'header.php'; ?>

  <div class="container-fluid">

    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 col-sm-8">

  <?php if(isset($_GET['msg'])) { ?>
  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong><?php echo $_GET['msg'];?> </strong>
  </div>
  <?php }?>
        
        <div class="card">
          <div class="card-header">
          <form action="search-contacts.php" method="get" class="search">
            <input type="text" name="search" placeholder="search..." value="<?php echo @$_GET['search']; ?>">
            <input type="submit" name="submit" value="search">
          </form>
        </div>

   <?php while($row = mysqli_fetch_array($result)) { ?>

        <div class="card-body">
          <div class="card-header header bg-primary" data-toggle="tooltip" data-placement="right" title="Click me to show & hide">
            <h4 class="name"><?php echo $row['name']; ?>
              <span onclick="myFunction(this)" class="fa fa-sort-down pull-right" ></span>
            </h4>
          </div>

          <div class="collapse">
            <table class="table table-borderless table-responsive" > 
              <th class="dob"><?php echo $row['dob']; ?></th>
              <td><a href="update-contact.php?edit=<?php echo $row['id']; ?>" class="btn btn-info"> Edit </a></td>
              <td><a href="files/delete-contact.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> Remove</a></td>
            </table>

            <table class="table table-borderless table-responsive card-body body"> 
                <tr>
                  <td><span class="fa fa-mobile"> </span> 
                    <a href="tel:<?php echo $row['contact'];?>"><?php echo $row['contact'];?></a></td>
                  <td><span class="fa fa-envelope"></span>
                    <a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email']; ?></a></td>
                </tr>
                <tr>
                  <td><span class="fa fa-mobile"></span>
                    <a href="tel:<?php echo $row['contact2'];?>"> <?php echo $row['contact2'];?> </a></td>
                  <td><span class="fa fa-envelope"></span>
                    <a href="mailto:<?php echo $row['email2'];?>"> <?php echo $row['email2'];?> </a></td>
                </tr>
              </table>

            </div>
          </div>
<?php }  ?>

      
      <div class="card-footer">
        <a href="add-contacts.php" class="pull-right"><span class="fa fa-plus-circle" style="font-size: 3em;"></span></a>

          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="index.php?page=<?= $Previous; ?>"><span aria-hidden="true">&laquo; Prev</span></a>
            </li>

            <?php for ($page=1;$page<=$number_of_pages;$page++) : ?>
            <li class="page-item"><a class="page-link" href="index.php?page=<?= $page; ?>"><?= $page; ?></a>
            </li>

            <?php endfor; ?>
            <li class="page-item"><a class="page-link" href="index.php?page=<?= $Next; ?>" ><span aria-hidden="true">Next &raquo;</span></a>
            </li>
          </ul>

      </div>
    </div>
    </div>
   </div>
  </div>

    <script src="js/collapse.js"></script>
    <script src="js/limit.js"></script>
    <script src="js/tooltip.js"></script>

</body>
</html>
