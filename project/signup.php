<!DOCTYPE html>
<html>
<head>
<title>Grocery Bargain</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Responsive website compatible with all browsers to sell and buy groceries nearing expiration dates at lesser prices" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){if (window.scrollY == 0) window.scrollTo(0,1); } </script>
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
	<div class="w3_login">
		<a href="index.php" style="text-align:center"><h1>Grocery Bargain</h1></a>
		<br/>
		<h3><font size="6px;">Sign Up</font> </h3>
		<div class="w3_login_module">
			<div class="module form-module">
				<div class="toggle"><i class="fa fa-times fa-pencil"></i>
				</div>
				<div class="form">
					<h2>Create an account</h2>
					<form name="signupform" action="php/signup.php" method="post" onsubmit="return validateForm()">
					  <input type="text" name="Username" placeholder="Username" required=" " />
            <span id=username_error style="color:red;" ></span>
            <input type="email" name="Email" placeholder="Email Address: xyz@example.com" required=" "/>
            <span id=email_error style="color:red;"></span>
					  <input type="password" name="Password" placeholder="Password" required=" ">
            <span id=password_error style="color:red;"></span></span>
						<input type="password"  name="Cpassword" placeholder="confirm password" required=" " />
            <span id=cpassword_error style="color:red;"></span>
					  <input type="submit" value="Register">
					</form>
				 </div>

			</div>
		</div>
	</div>
	<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
	<script>
		function validateForm() {
      var username= document.forms["signupform"]["Username"].value;
    	var email = document.forms["signupform"]["Email"].value;
      var password= document.forms["signupform"]["Password"].value;
      var cpassword= document.forms["signupform"]["Cpassword"].value;
    	if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        document.getElementById("email_error").innerHTML="Invalid email Address ";
        return false;
    	}
      if(!(/^[A-Za-z0-9_ ]{3,16}$/.test(username))){
        document.getElementById("username_error").style.fontSize= "15px";
        document.getElementById("username_error").style.paddingBottom = "10px";
        document.getElementById("username_error").innerHTML="Name allows only letters and spaces ";
        return false;
      }
      if(!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/.test(password))){
        document.getElementById("password_error").style.fontSize= "15px";
       document.getElementById("password_error").innerHTML="Password must contain atleast one capital, number, small letter ";
       return false;
     }
     if(password!=cpassword){
        document.getElementById("password_error").innerHTML="Passwords dont' match ..Enter again";
        return false;
      }
		}
	</script>

</body>
</html>
