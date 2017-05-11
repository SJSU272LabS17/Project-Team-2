<?php		
   session_start();		
 ?>	
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Grocery Database</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <link href="signin.css" rel="stylesheet">
   <link href="jumbotron-narrow.css" rel="stylesheet">

  </head>

  <body>
  <?php
    	if($_SERVER['REQUEST_METHOD']== "POST"){
    		include("php/dbconnect.php");
        //$myusername = mysqli_real_escape_string($conn,$_POST['Username']);
        $myuseremail = mysqli_real_escape_string($conn,$_POST['Email']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['Password']);

        $sql = "SELECT seller_id FROM seller WHERE seller_email = '$myuseremail' and seller_password = '$mypassword'";
        $result = $conn->query($sql);

        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);
        if($count==1) {
          $query1 = "SELECT seller_name FROM seller WHERE seller_email='$myuseremail'";
          $result1 = $conn->query($query1);
          if($result1->num_rows>0){
            $row1 = $result1->fetch_assoc();
            $fullname = $row1['seller_name'];
            $username = explode(" ",$fullname);

            echo $username[0] . "<br />";
          }


        }

      // If result matched $myusername and $mypassword, table row must be 1 row
           if($count == 1) {
    				 $_SESSION['logged']=true;
             $_SESSION['sellername']=$username[0];
             $_SESSION['selleremail'] = $myuseremail;
             header("location: vendorinventory.php");
        			exit();
           }else {
               $_SESSION['logged']=false;
    					$errormsg = "Incorrect username or Password";
    					exit();
           }
    	}

    ?>
  <div class="container">

      <form class="form-signin"  method="post">
		  <h4 class="form-signin-heading">Vendor Sign In</h4>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="Email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="Password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-default" type="submit">Sign in</button>
      </form>

    </div> 
  </body>
</html>
