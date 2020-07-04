<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('location:login.php');
}else{

require 'files/connection.php';
  $limit = isset($_POST["limit-contacts"]) ? $_POST["limit-contacts"] : 4;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $start = ($page - 1) * $limit;
  $user_id = $_SESSION['id'];
  $result = $conn->query("SELECT * FROM contacts where user_id='$user_id' LIMIT $start, $limit");
  $contacts = $result->fetch_all(MYSQLI_ASSOC);
  $result1 = $conn->query("SELECT count(id) AS id FROM contacts where user_id='$user_id'");
  $count = $result1->fetch_all(MYSQLI_ASSOC);
  $total = $count[0]['id'];
  $pages = ceil( $total / $limit);

  if ($page==1) {
  $Previous = $page - 0;
  }else
  $Previous = $page - 1;
  $Next = $page + 1;
}
 ?>

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

          <form method="get" action="search-contacts.php" class="search">
            <input type="text" name="search" placeholder="search..." value="<?php echo @$_GET['search']; ?>">
            <input type="submit" name="submit" value="search">
          </form>

        </div>

         <?php foreach($contacts as $contact) :  ?>

        <div class="card-body">
          <div class="card-header header" data-toggle="tooltip" data-placement="right" title="Click me to show & hide">
            <h4 class="name"><?= $contact['name']; ?>
              <span onclick="myFunction(this)" class="fa fa-sort-down pull-right" ></span>
            </h4>
          </div>

          <div class="collapse">
            <table class="table table-borderless table-responsive" > 
              <th class="dob"><?= $contact['dob']; ?></th>
              <td><a href="update-contact.php?edit=<?= $contact['id']; ?>" class="btn btn-info"> Edit </a></td>
              <td><a href="files/delete-contact.php?id=<?= $contact['id']; ?>" class="btn btn-danger"> Remove</a></td>
            </table>

            <table class="table table-borderless table-responsive card-body body"> 
                <tr>
                  <td><span class="fa fa-mobile"> </span> 
                    <a href="tel:<?= $contact['contact'];?>"><?= $contact['contact'];?></a></td>
                  <td><span class="fa fa-envelope"></span>
                    <a href="mailto:<?= $contact['email'];?>"><?= $contact['email']; ?></a></td>
                </tr>
                <tr>
                  <td><span class="fa fa-mobile"></span>
                    <a href="tel:<?= $contact['contact2'];?>"> <?= $contact['contact2'];?> </a></td>
                  <td><span class="fa fa-envelope"></span>
                    <a href="mailto:<?= $contact['email2'];?>"> <?= $contact['email2'];?> </a></td>
                </tr>
              </table>

            </div>
          </div>
       <?php endforeach; ?>
      
      <div class="card-footer">
        <a href="add-contacts.php" class="pull-right"><span class="fa fa-plus-circle" style="font-size: 3em;"></span></a>

          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="index.php?page=<?= $Previous; ?>"><span aria-hidden="true">&laquo; Prev</span></a>
            </li>

            <?php for($i = 1; $i<= $pages; $i++) : ?>
            <li class="page-item"><a class="page-link" href="index.php?page=<?= $i; ?>"><?= $i; ?></a>
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
