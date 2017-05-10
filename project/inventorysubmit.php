 <?php session_start(); ?>

<html>
<body>
<?php
include_once("php/dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sellername = $_POST["sellername"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $zipcode= $_POST["zipcode"];
  $state = $_POST["state"];
  $phonenumber = $_POST["phonenumber"];
}


$sql = mysqli_query($conn,"SELECT seller_id FROM seller WHERE seller_email='$email' LIMIT 1");
$userMatch = mysqli_num_rows($sql);
  if ($userMatch > 0) {
  echo 'Sorry an account is already associated with this email,to Login, <a href="vendorlogin.php">click here</a>';
  exit();
}

$sql = "INSERT INTO seller (seller_name, seller_email, seller_address, seller_city, seller_zipcode, seller_state,  seller_password, seller_phonenumber)
VALUES ('$sellername', '$email', '$address', '$city', '$zipcode', '$state', '$password', '$phonenumber')";

if ($conn->query($sql) === TRUE) {
  $_SESSION['logged']=true;
  $_SESSION['sellername']=$username;
  $_SESSION['email'] = $email;
   header('Location: vendorinventory.php');

} else {
    $_SESSION['logged']=false;
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</body>
</html>
