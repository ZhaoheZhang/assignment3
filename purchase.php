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
   $quantity =$_POST["quantity"];
   $query1 = 'SELECT product.quantity FROM product WHERE product.productid = '.$productid.'';
   $result1 = mysqli_query($connection,$query1);
   if (!$result1) {
        die("databases query1 failed.");
    }
    $row1 = mysqli_fetch_assoc($result1);
    $stock = $row1["quantity"];

    if($quantity > $stock) {
      echo "Unable to purchase, item out of stock.";
    }
    else {
      $query2='SELECT * FROM deal';
      $result2=mysqli_query($connection,$query2);
      if (!$result2) {
        die("databases query2 failed.");
      }
      while($row=mysqli_fetch_assoc($result2)) {
        if($row["customerid"] == $whichcustomer and $row["productid"] == $productid) {
          $purchasedbefore = 1;
          $quantity = $quantity + intval($row["quantity"]);
        }
      }
      if($purchasedbefore == 0) {
        $query3='INSERT INTO deal VALUES('.$quantity.', "'.$whichcustomer.'", "'.$productid.'")';
      }
      elseif($purchasedbefore == 1) {
        $query3='UPDATE deal SET quantity='.$quantity.' WHERE customerid="'.$whichcustomer.'" AND productid="'.$productid.'" ';
      }
      if(!mysqli_query($connection,$query3)) {
        die("Cannot insert".mysqli_error($connection));
      }
      echo "Product successfully purchased!";
    }
   mysqli_free_result($result1);
   mysqli_free_result($result2);
   mysqli_close($connection);
?>
</ol>
</body>
</html>
