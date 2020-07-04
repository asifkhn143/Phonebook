<nav class="navbar navbar-expand-md bg-light sticky-top">
    <a href="index.php" class="navbar-brand">Phonebook</a>
    
    <?php if (isset($_SESSION['id'])) { ?>
    
    <a class="navbar-brand">Welcome, <?php echo $_SESSION['name']; ?></a>
    <a href="logout.php" class="btn btn-danger ml-auto" class="logout">Logout</a>

   <?php } ?>

</nav>