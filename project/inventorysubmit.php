 <?php session_start(); ?>

<html>
<body>
<?php
include_once("php/dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $quantity = $_POST["quantity"];
  $price = $_POST["perunit"];
  $quality = $_POST["quality"];
  echo $quality;
  $expiry_date = date('Y-m-d', strtotime(' +'.$quality.' days'));
  $discountpercentage = $_POST["discountpercentage"];
  $dp_flag= $_POST["dp_flag"];
  $seller_id = $_SESSION['seller_id'];
}

$sql = "INSERT INTO product (product_available_units, product_price, product_sell_by_date, product_discount, dynamic_pricing_flag, seller_id)
VALUES ('$quantity', '$price', '$expiry_date', '$discountpercentage', '$dp_flag', '$seller_id')";

if ($conn->query($sql) == TRUE)
{
  echo "Success: " . $sql . "<br>";

}
else {
    
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn.close();

?>
</body>
</html>
