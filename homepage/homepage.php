
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Grocery Database</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <link href="signin.css" rel="stylesheet">
   <link href="jumbotron-narrow.css" rel="stylesheet">

  </head>

  <body>
    <div class="jumbotron">
    <h1>Welcome to The Online Grocery Database </h1>
    <p class="lead">Every year united states throws away one-thirds of the food it produces causing billion dollar wastage. Infact some of major retailers dispose the food 3 days before the sell by date as customers no longer choose them. The major cause of this wastage is due to the lack of awareness among the customer regarding the whereabouts of the products,sell-by-dates and the discounted prices at which they are available.
	We propose a solution to this by creating a common platform for the sellers of retail outlets to post about these items with specific details about product</p>
     <p><a class="btn btn-lg btn-success" href="vendorsignup.html" role="button">Vendor Sign Up Here</a></p>
      <p><a class="btn btn-lg btn-success" href="customerregister.html" role="button">Customer Sign Up Here</a></p>
     </div>
   
<?php
$servername = "localhost";
$username = "root";
$password = "killing";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>    

    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Customer Sign In</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> 
  </body>
</html>