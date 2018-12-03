<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Transactions</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are the transactions:</h1>
<ol>
<?php
   $quantity= $_POST["quantity"];
   $query = 'SELECT customer.firstname, customer.lastname, product.description, deal.quantity  FROM customer, product, deal WHERE product.productid = deal.productid AND customer.customerid = deal.customerid AND customer.customerid ="'.$quantity.'"';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
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
