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

    echo $purchasequantity;

    if($purchasequantity > $stock) {
      echo "Unable to purchase, item out of stock.";
    }
    else 
    {
      $query2 = "SELECT * FROM deal WHERE deal.customerid = '.$whichcustomer.'";
      $result2 = mysqli_query($connection,$query2);
      if (!$result2) {
        die("databases query2 failed.");
      }
      while ($row = mysqli_fetch_assoc($result2)) 
      {
        if($row["productid"] == $productid) 
        {
          $purchasequantity = $purchasequantity + $row["quantity"];
          $purchasedbefore = 1;
        }
      }
    if($purchasedbefore == 0) 
    {
      $query3 = 'INSERT INTO deal VALUES('.$purchasequantity.', "'.$whichcustomer.'", "'.$productid.'")';
    }
    elseif($purchasedbefore == 1) 
    {
      $query3 = 'UPDATE deal SET quantity = '.$purchasequantity.' WHERE customerid = "'.$whichcustomer.'" AND productid = "'.$productid.'"';
    }
  }
   mysqli_close($connection);
?>
</ol>
</body>
</html>
