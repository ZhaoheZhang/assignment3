<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dr. Western's Vet Clinic-Your Pets</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Purchase Result:</h1>
<ol>
<?php
   $whichCustomer= $_POST["customer"];
   $productid = $_POST["product"];
   $quantity =$_POST["quantity"];
   $query1= 'SELECT product.quantity FROM product WHERE product.productid="'.$productid.'"';
   $result=mysqli_query($connection,$query1);
   if (!$result) {
          die("database max query failed.");
   }
   $row=mysqli_fetch_assoc($result);
   $newkey = intval($row["maxid"]) + 1;
   $petid = (string)$newkey;
   $query = 'INSERT INTO pet values("' . $petid . '","' . $petName . '","' . $species . '","' . $whichOwner . '")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo "Your pet was added!";
   mysqli_close($connection);
?>
</ol>
</body>
</html>
