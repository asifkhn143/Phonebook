<?php
session_start();

$user_id=$_SESSION['id'];
if(isset($_GET['search'])){
  $searchKey = $_GET['search'];
    // search in all table columns
    // using concat mysql function
  $query = "SELECT * FROM `Contacts` WHERE CONCAT(`name`, `contact`, `email`) LIKE '%$searchKey%' && user_id='$user_id' LIMIT 5";
  $search_result = filterTable($query);
}
else {

    $query = "SELECT * FROM `Contacts` where user_id='$user_id' LIMIT 5";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "Phonebook");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
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
        <div class="card">
          <div class="card-header header">
          <form action="" method="get" class="search">
            <a href="index.php"><span class="fa fa-arrow-left pull-left"></span></a>
            <input type="text" name="search" placeholder="search..." value="<?php echo @$_GET['search']; ?>">
            <input type="submit" name="submit" value="search">
          </form>
        </div>

          <?php while($row = mysqli_fetch_array($search_result)):?>
            
            <div class="card-body rounded">
              <div class="card-header header">
                <h4 class="name"><?php echo $row["name"]; ?>
                 <span onclick="myFunction(this)" class="fa fa-sort-down pull-right"></span>
                </h4>
              </div>

              <div class="collapse">
                <table class="table table-borderless table-responsive" >
                  <td class="dob"><?php echo $row['dob'];?></td>
                  <td class=""><a href="update-contact.php?edit=<?php echo $row["id"]; ?>" class="btn btn-info"> Edit </a></td>
                  <td><a href="files/delete-contact.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger"> Remove</a></td>
                </table>

                <table class="table table-borderless table-responsive card-body body"> 
                  <tr>
                    <td><span class="fa fa-mobile"> </span><a href="tel:<?php echo '  '.$row["contact"]; ?>"><?php echo '  '.$row["contact"]; ?></a></td>

                    <td><span class="fa fa-envelope"></span><a href="mailto:<?php echo '  '.$row["email"]; ?>"><?php echo '  '.$row["email"]; ?></a></td>
                  </tr>

                  <tr>
                    <td><span class="fa fa-mobile"></span> <a href="tel:<?php echo '  '.$row["contact2"]; ?>"><?php echo '  '.$row["contact2"]; ?></a></td>

                    <td><span class="fa fa-envelope"></span><a href="mailto:<?php echo '  '.$row["email2"]; ?>"><?php echo '  '.$row["email2"]; ?></a></td>
                  </tr>
                </table>
              </div>

            </div>

          <?php endwhile;?>

        </div>
      </div>
    </div>
  </div>
        <script src="js/collapse.js"></script>
</body>
</html>