<?php
// start session
if (session_status() == PHP_SESSION_NONE) {
	 session_start();
 }
include_once(php/dbconnect.php);
// get the product id
$id = isset($_GET['productid']) ? $_GET['productid'] : "";
$proname = isset($_GET['productname']) ? $_GET['productname'] : "";
$sellerid = isset($_GET['sellerid']) ? $_GET['sellerid'] : "";
$units = isset($_GET['units']) ? $_GET['units'] : 1;
$newprice = isset($_GET['newprice']) ? $_GET['newprice'] : 0;
$oldprice = isset($_GET['oldprice']) ? $_GET['oldprice'] : 0;
$sellbydate = isset($_GET['sellbydate']) ? $_GET['sellbydate'] : 0;
isset($_SESSION['email']){
  $sql1 = "SELECT customer_id FROM customer WHERE customer_email= $_SESSION['email']";
  $result1 = mysqli_query($conn,$sql1);
  if($result1->num_rows == 1){
    $row1 = mysqli_fetch_assoc($result1);
    $customerid = $row1['customer_id'];
  }
}

// make quantity a minimum of 1
$quantity=$quantity<=0 ? 1 : $quantity;

// add new item on array
$cart_item=array(
    'quantity'=>$quantity
);
/*
 * check if the 'cart' session array was created
 * if it is NOT, create the 'cart' session array
 */
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
// check if the item is in the array, if it is, do not add
if(array_key_exists($id, $_SESSION['cart'])){
    // redirect to product list and tell the user it was added to cart
    header('Location: products.php?action=exists&id=' . $id . '&page=' . $page);
}
// else, add the item to the array
else{
    $_SESSION['cart'][$id]=$cart_item;
    // redirect to product list and tell the user it was added to cart
    header('Location:products.php?action=added&page=' . $page);
}
$sql= "INSERT INTO shopping_cart (customer_id,product_id,seller_id,oldprice,newprice,units,sell_by_date) VALUES ($customerid,$productid,$sellerid,$oldprice,$newprice,$units,$sellbydate);";

if(mysqli_query($conn,$sql)){
  echo "record successfully inserted in database";
}


?>
