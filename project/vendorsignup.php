
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Vendor Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="customer.css">
    
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
    <h1 class="well">Vendor Sign Up</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="vendorsubmit.php" method = "POST">
					<div class="col-sm-12">
							<div class="row">
							<div class="col-sm-6 form-group">
								<label>Username</label>
								<input type="text" placeholder="Enter Your User Name Here.." name="login" class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Password</label>
								<input type="password" placeholder="Enter Your Password Here.." name = "password " class="form-control">
							</div>
						</div>		
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input type="text" placeholder="Enter First Name Here.." name="firstname" class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" placeholder="Enter Last Name Here.." name = "lastname " class="form-control">
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea placeholder="Enter Address Here.." rows="3" name = "address" class="form-control"></textarea>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" placeholder="Enter City Name Here.." name = "city" class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>State</label>
								<input type="text" placeholder="Enter State Name Here.." name = "state" class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" placeholder="Enter Zip Code Here.." name = "zipcode" class="form-control">
							</div>		
						</div>
						<div class="row"></div>						
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" placeholder="Enter Phone Number Here.." name = "mobile" class="form-control">
					</div>		
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" placeholder="Enter Email Address Here.." name = "email" class="form-control">
					</div>	
					<button type="submit" class="btn btn-lg btn-info" value ="Submit" >Submit</button>					
					</div>
				</form> 
				</div>
	</div>
	</div>
<script type="text/javascript">

</script>
</body>
</html>
