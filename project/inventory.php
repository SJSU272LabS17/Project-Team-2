<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inventory</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<div class="modal-body">
<div class="panel panel-default">
	<span>

<form class="form-horizontal" action="inventorysubmit.php" method = "POST">
<fieldset>

<!-- Form Name -->
<legend></legend>
<input id = "product_name" type="hidden" name="product_name" value="<?php echo $_GET['productname'];?>">
<input id = "product_category" type="hidden" name="product_category" value="<?php echo $_GET['productcategory'];?>">
<div class="form-group">
  <label class="col-md-4 control-label">Quanity</label>  
  <div class="col-md-5">
     <div class="form-inline">
   <input id="quantity" name="quantity" type="text" class="form-control" placeholder="enter your quantiy here...">
    <select id="unit" name="unit" class="form-control">
      <option value="1">lbs</option>
      <option value="2">kg</option>
    </select>
  </div>  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Please select the quality</label>  
  <div class="col-md-5">
   <div class="form-inline">
    <select id="quality" name="quality" class="form-control">
      <option value="5">5 Days Fresh</option>
      <option value="4">4 Days Fresh</option>
      <option value="3">3 Days Fresh</option>
      <option value="2">2 Days Fresh</option>
      <option value="1">1 Day Fresh</option>
    </select>
	  </div>
  </div>  
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Price</label>  
  <div class="col-md-5">
     <div class="form-inline">
   <input id="price" name="price" type="text" class="form-control" placeholder="enter your price.">
    <select id="perunit" name="perunit" class="form-control">
      <option value="1">/lbs</option>
      <option value="2">/kg</option>
    </select>
  </div>  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Discount Percentage</label>  
  <div class="col-md-5">
     <div class="form-inline">
   <input id="discountpercentage" name="discountpercentage" type="text" class="form-control" placeholder="enter your discount %">
  </div>  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Dynamic Pricing</label>  
  <div class="col-md-5">
     <div class="form-inline">
    <select id="dp_flag" name="dp_flag" class="form-control">
      <option value="Y">Yes</option>
      <option value="N">No</option>
    </select>
  </div>  
  </div>
</div>


<div class="row">
  <div class="col-sm-10">
    <div class="text-center">
      <button type="submit" class="btn btn-info" id="singlebutton">Submit</button>
    </div>
  </div>
</div>
</fieldset>
</form>
</span>
</div>
</div>
</body>
</html>
