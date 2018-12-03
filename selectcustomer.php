<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>VIP</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Valuable Customers:</h1>
<ol>
<?php
   $quantity= $_POST["quantity"];
   $query = 'SELECT * FROM customer, product, deal WHERE customer.customerid=deal.customerid AND product.productid=deal.productid AND deal.quantity >"'.$quantity.'" ORDER BY deal.quantity';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo $row["firstname"] . " " . $row["lastname"] . " purchased " . $row["quantity"] . " " .$row["description"];
     }
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
