
<?php
include "dbconnect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn,$_POST['Username']);
    $firstname = mysqli_real_escape_string($conn,$_POST['Firstname']);
    $lastname = mysqli_real_escape_string($conn,$_POST['Lastname']);
    $password = mysqli_real_escape_string($conn,$_POST['Password']);
    $cpassword = mysqli_real_escape_string($conn,$_POST['Cpassword']);
	  $mobile = mysqli_real_escape_string($conn,$_POST['Mobile']);
	  $email = mysqli_real_escape_string($conn,$_POST['Email']);

	if($password != $cpassword){
		echo 'Your passwords do not match., <a href="login.php">Refill here</a>';
		exit();
	}
	$sql = mysqli_query($conn,"SELECT id FROM customer WHERE mobile='$mobile' LIMIT 1");
	$userMatch = mysqli_num_rows($sql);
    if ($userMatch > 0) {
		echo 'Sorry your mobile number is already registered into the system, <a href="signup.php">click here</a>';
		exit();
	}
	$sql = "INSERT INTO customer (customer_firstname, customer_lastname, customer_email	, customer_mobile, customer_login, customer_password)
        VALUES('$firstname', '$lastname','$email','$mobile','$username','$password')" ;
  if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
  }
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }

  // close connection
  mysqli_close($conn);
  header("Location: index.php");
  exit();
}
?>
