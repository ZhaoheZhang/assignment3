<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Make Purchase</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Purchase Result:</h1>
<ol>
<?php
   $purchasedbefore = 0;
   $whichcustomer= $_POST["customer"];
   $productid = $_POST["product"];
   $purchasequantity =$_POST["quantity"];
   $query1 = 'SELECT product.quantity FROM product WHERE product.productid = '.$productid.'';
   $result1 = mysqli_query($connection,$query1);
   if (!$result1) {
        die("databases query1 failed.");
    }
    $row1 = mysqli_fetch_assoc($result1);
    $stock = $row1["quantity"];

    if($purchasequantity > $stock) {
      echo "Unable to purchase, item out of stock.";
    }
    else {
      echo "Purchase Success";
    }
   mysqli_close($connection);
?>
</ol>
</body>
</html>
