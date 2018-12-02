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
   $whichCustomer= $_POST["customer"];
   $query = 'SELECT customer.firstname, customer.lastname, product.description FROM customer, product, deal WHERE deal.customerid=deal.productid AND customer.customerid="' . $whichCustomer . '"';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo $row["firstname"] . " " . $row["lastname"] . " " . $row["description"];
     }
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
