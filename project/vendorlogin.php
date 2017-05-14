 <?php
 		session_start();
	?>
<!DOCTYPE html>
<html>
<head>
<title>Grocery Bargain</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<!-- //font-awesome icons -->
<!-- js -->
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>

<body>
  <?php
    	if($_SERVER['REQUEST_METHOD']== "POST"){
    		include("php/dbconnect.php");
        //$myusername = mysqli_real_escape_string($conn,$_POST['Username']);
        $myuseremail = mysqli_real_escape_string($conn,$_POST['Email']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['Password']);

        $sql = "SELECT seller_id FROM seller WHERE seller_email = '$myuseremail' and seller_password = '$mypassword'";
        $result = $conn->query($sql);

        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);
        if($count==1) {
          $query1 = "SELECT seller_name FROM seller WHERE seller_email='$myuseremail'";
          $result1 = $conn->query($query1);
          if($result1->num_rows>0){
            $row1 = $result1->fetch_assoc();
            $fullname = $row1['seller_name'];
            $username = explode(" ",$fullname);

            echo $username[0] . "<br />";
          }


        }

      // If result matched $myusername and $mypassword, table row must be 1 row
           if($count == 1) {
    				 $_SESSION['vendorlogged']=true;
             $_SESSION['sellername']=$username[0];
             $_SESSION['selleremail'] = $myuseremail;
             header("location: vendorinventory.php");
        			exit();
           }else {
               $_SESSION['vendorlogged']=false;
    					$errormsg = "Incorrect username or Password";
    					exit();
           }
    	}

    ?>
		<div class="w3_login">
      <a href="index.php" style="text-align:center"><h1>Grocery Bargain</h1></a>
      <br/>
			<h3><font size="6px;">Vendor Sign In</font> </h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
				  </div>
				  <div class="form">

      <form class="form-signin"  method="post">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="Email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="Password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-default" type="submit">Sign in</button>
      </form>

    </div> 
    </div>
			</div>

		</div>
 <script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

</body>
</html>
