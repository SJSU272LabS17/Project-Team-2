<!-- header -->
<?php
if (session_status() == PHP_SESSION_NONE) {
	 session_start();
 }
?>
<div class="agileits_header" style="background-color: black">
  <div class="w3l_search">
    <form action="#" method="post">
      <input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
      <input type="submit" value=" ">
    </form>
  </div>
  <!--div class="product_list_header">
    <form action="#" method="post" class="last">
              <fieldset>
                  <input type="hidden" name="cmd" value="_cart" />
                  <input type="hidden" name="display" value="1" />
                  <input type="submit" name="submit" value="View your cart" class="button" />
              </fieldset>
          </form>
  </div-->
  <?php
  if(isset($_SESSION['vendorlogged']) && $_SESSION['vendorlogged']==true)
    { echo '<span class=login_user>';
      //echo $_SESSION["username"];
      echo '</span>';
      //echo '<a href="logout.php"><span class="login_user">Logout</span></a></li>';
    ?>
    <div class="w3l_header_right" style=" float: right; padding-right: 2.5em;">
      <ul>
        <li class="dropdown profile_details_drop">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['sellername']." "; ?><span class="caret"></span></a>
        <div class="mega-dropdown-menu">
          <div class="w3ls_vegetables">
              <ul class="dropdown-menu drp-mnu">
                <li><a href="viewinventory.php">My Inventory</a></li>
                <li><a href="orders.php">My Orders</a></li>
                <li><a href="php/logout.php"> Logout </a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <?php
    }
    else
    { ?>

    <div class="w3l_header_right" style = " float: right;padding-right: 2em">
      <ul>
        <li class="dropdown profile_details_drop">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Vendor <i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
          <div class="mega-dropdown-menu">
            <div class="w3ls_vegetables">
              <ul class="dropdown-menu drp-mnu">
                <li><a href="vendorlogin.php">Login</a></li>
                <li><a href="vendorsignup.php">Sign Up</a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>


    <?php } ?>

  <div class="clearfix"> </div>
</div>
<!-- script-for sticky-nav -->
<script>
$(document).ready(function() {
   var navoffeset=$(".agileits_header").offset().top;
   $(window).scroll(function(){
    var scrollpos=$(window).scrollTop();
    if(scrollpos >=navoffeset){
      $(".agileits_header").addClass("fixed");
    }else{
      $(".agileits_header").removeClass("fixed");
    }
   });
});
</script>
<!-- //script-for sticky-nav -->
<!-- //header -->
