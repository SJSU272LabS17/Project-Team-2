<?php
if (session_status() == PHP_SESSION_NONE) {
	 session_start();
 }
?>
<?php
header('Content-type: text/html; charset=ISO-8859-1');
try
{
if(isset($_POST['latitude']) && isset($_POST['longitude'])){

  $latitude = ($_POST['latitude']);
  $longitude = ($_POST['longitude']);
  include_once("php/dbconnect.php");

	//$latitude = number_format(($latitude),6,'.',' ');
	$longitude = number_format(($longitude),6,'.',' ');
  $_SESSION['userlat'] =  $latitude;
  $_SESSION['userlon'] = $longitude;
	$sql = "INSERT INTO distance (userlat,userlon)  VALUES ( $latitude, $longitude)";

  $sql1= "SELECT seller_id,sellerlat,sellerlon FROM seller ;";
  $result1 = mysqli_query($conn,$sql1);
	mysqli_query($conn,"TRUNCATE table distance" );
  while($row = mysqli_fetch_assoc($result1)){
    $sellerlat = $row['sellerlat'];
    $sellerid = $row['seller_id'];
    $sellerlon = $row['sellerlon'];
    $distance = vincentyGreatCircleDistance($latitude,$longitude,$sellerlat,$sellerlon);
    $sql2 = "INSERT INTO distance (userlat,userlon,distance,seller_id)  VALUES ( $latitude, $longitude,$distance,$sellerid) ;";
    if(mysqli_query($conn, $sql2)){
      //echo "Records added successfully n ";
    }
  }
  // close connection
  mysqli_close($conn);
}
}
 catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
}


function vincentyGreatCircleDistance(
  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 3959 )
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $lonDelta = $lonTo - $lonFrom;
  $a = pow(cos($latTo) * sin($lonDelta), 2) +
    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
  $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

  $angle = atan2(sqrt($a), $b);
  return $angle * $earthRadius;
}

?>
