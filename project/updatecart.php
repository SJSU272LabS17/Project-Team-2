<?php
// start session
if (session_status() == PHP_SESSION_NONE) {
	 session_start();
 }
include_once("php/dbconnect.php");
// get the product id
if($_SERVER['REQUEST_METHOD']=="POST"){
  $units = $_POST['units'] ;
  $customerid = $_POST['customerid'];
  $proname = $_POST['productname'];
}

// make quantity a minimum of 1
$units=$units<=0 ? 1 : $units;

// add new item on array
/*
 * check if the 'cart' session array was created
 * if it is NOT, create the 'cart' session array
 */
 $sql= "update shopping_cart set units= $units WHERE product_name='$proname' and customer_id=$customerid;";

 echo $sql;
 if(mysqli_query($conn,$sql)){
   echo "record successfully updated in database";
 }
 else{
 	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
 }
//redirect to product list and tell the user it was added to cart

header('Location: viewcart.php');
?>
