
<?php
   // DB deployed in AWS cloud using RDS service.
   define('DB_SERVER', 'grocerybargain.cavbzzgm6wkd.us-west-1.rds.amazonaws.com');
   define('DB_USERNAME', 'master');
   define('DB_PASSWORD', 'master123');
   define('DB_DATABASE', 'grocery_db');
   $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   /*
   Days_to_expire    ->   Increase_in_Discount_per_day
        1                           15%
      2 to 4                         5% 
      5 to 8                         2%  
   */
   $query1="update product set product_discount = product_discount + 15 
where product_sell_by_date = curdate()+1 
and dynamic_pricing_flag = 'Y'
and product_discount <= 75";
  $query2="update product set product_discount = product_discount + 5 
where product_sell_by_date between curdate()+2 and curdate()+4
and dynamic_pricing_flag = 'Y'
and product_discount<=70";
  $query3 ="update product set product_discount = product_discount + 2 
where product_sell_by_date between curdate()+5 and curdate()+8
and dynamic_pricing_flag = 'Y'
and product_discount<=60";
  $query4 = "delete from product where product_sell_by_date = cur_date()";
   if ($conn->connect_error) {
   echo "Connection Failed";
   die("Connection failed: " . $conn->connect_error);
  }
  else{
    echo "Connected successfully and Executing Queries on Dynamic Pricing.";
    $conn->query($query1);
    $conn->query($query2);
    $conn->query($query3);
    $conn->query($query4);
  }
?>
