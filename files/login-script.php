<?php
session_start();
    require 'connection.php';
    if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $user_query="select * from users where email='$email' and password='$password'";
    $user_result=mysqli_query($conn,$user_query) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($user_result);
    if($rows_fetched==0){
        ?>
        <script>
            window.alert("Wrong email or password!");
        </script>
        <meta http-equiv="refresh" content="1;url=../login.php"/>
        <?php
    }else{
        $row=mysqli_fetch_array($user_result);
        $_SESSION['email']=$email;
        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];
        $msg= "You are successfully logged in.!!!";
        header( "location:../index.php?msg=".$msg );
    } 
  }
?>