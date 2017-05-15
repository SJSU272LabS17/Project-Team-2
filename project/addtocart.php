<?php
// start session
if (session_status() == PHP_SESSION_NONE) {
	 session_start();
 }
include_once("php/dbconnect.php");
// get the product id
$productid = isset($_GET['productid']) ? $_GET['productid'] : "";
$proname = isset($_GET['productname']) ? $_GET['productname'] : "";
$sellerid = isset($_GET['sellerid']) ? $_GET['sellerid'] : "";
$units =  1;
$newprice = isset($_GET['newprice']) ? $_GET['newprice'] : 0;
$oldprice = isset($_GET['oldprice']) ? $_GET['oldprice'] : 0;
$sellbydate = isset($_GET['sellbydate']) ? $_GET['sellbydate'] : 0;
echo ($_SESSION['email']);
if (isset($_SESSION['email'])){
	$email= $_SESSION['email'];
  $sql1 = "SELECT * FROM customer WHERE customer_email= '$email'";
  $result1 = mysqli_query($conn,$sql1);
  if($result1->num_rows == 1){
    $row1 = mysqli_fetch_assoc($result1);
    $customerid = $row1['customer_id'];
  }
}
// make quantity a minimum of 1
$units=$units<=0 ? 1 : $units;

// add new item on array
$cart_item=array(
    'units'=>$units
);
/*
 * check if the 'cart' session array was created
 * if it is NOT, create the 'cart' session array
 */
 $sql= "INSERT INTO shopping_cart (customer_id,product_id,seller_id,old_price,new_price,units,sell_by_date,product_name) VALUES ($customerid,$productid,$sellerid,$oldprice,$newprice,$units,'$sellbydate','$proname');";

 echo $sql;
 if(mysqli_query($conn,$sql)){
   echo "record successfully inserted in database";
 }
 else{
 	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
 }

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
// check if the item is in the array, if it is, do not add
if(array_key_exists($id, $_SESSION['cart'])){
    // redirect to product list and tell the user it was added to cart
		header('Location: viewcart.php?action=exists&id=' . $id . '&page=' . $page);
}
// else, add the item to the array
else{

    $_SESSION['cart'][$productid]=$productid;
		$_SESSION['cart'][$$proname]= $proname;
		$_SESSION['cart'][$sellerid]=$sellerid;
		$_SESSION['cart'][$customerid]=$customerid;
		$_SESSION['cart'][$oldprice]=$oldprice;
		$_SESSION['cart'][$newprice]=$newprice;
		$_SESSION['cart'][$units]=$units;
		$_SESSION['cart'][$sellbydate]=$sellbydate;
		header('Location: viewcart.php');

    // redirect to product list and tell the user it was added to cart
}
?>
