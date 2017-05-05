<?php
   include("dbconnect.php");
   session_start();

      $myusername = mysqli_real_escape_string($conn,$_POST['Username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['Password']);

      $sql = "SELECT customer_id FROM customer WHERE customer_login = '$myusername' and customer_password = '$mypassword'";
      $result = $conn->query($sql);

      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: ../login.php? user= $myusername");
      }else {
         $_SESSION['error_msg'] = "Your Login Name or Password is invalid";
         die(header("location:login.php?loginFailed=true&reason=password"));
      }
    
?>
