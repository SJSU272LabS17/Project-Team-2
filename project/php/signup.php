<?php
   session_start();
 ?>
<?php
include "dbconnect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn,$_POST['Username']);
  //  $firstname = mysqli_real_escape_string($conn,$_POST['Firstname']);
  //  $lastname = mysqli_real_escape_string($conn,$_POST['Lastname']);
    $password = mysqli_real_escape_string($conn,$_POST['Password']);
    $cpassword = mysqli_real_escape_string($conn,$_POST['Cpassword']);
	//  $mobile = mysqli_real_escape_string($conn,$_POST['Mobile']);
	  $email = mysqli_real_escape_string($conn,$_POST['Email']);

	if($password != $cpassword){
		echo 'Your passwords do not match., <a href="../login.php">Refill here</a>';
		exit();
	}
	$sql = mysqli_query($conn,"SELECT customer_id FROM customer WHERE customer_email='$email' LIMIT 1");
	$userMatch = mysqli_num_rows($sql);
    if ($userMatch > 0) {
		echo 'Sorry an account is already associated with this email,to Login, <a href="../login.php">click here</a>';
		exit();
	}
	$sql = "INSERT INTO customer (customer_name,  customer_email , customer_password)
        VALUES('$username','$email','$password')" ;
  if(mysqli_query($conn, $sql)){
    echo "Records added successfully dsadaasda.";
    $_SESSION['logged']=true;
    $firstname = explode(" ",$username);
    $_SESSION['username']=$firstname;
    $_SESSION['email'] = $email;
  }
  else{
     $_SESSION['logged']=false;
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }

  // close connection
  mysqli_close($conn);
  header("Location: ../index.php");
  exit();
}
?>
