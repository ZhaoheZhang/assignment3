<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Customer</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Deleting Customer:</h1>
<ol>
<?php
   $whichCustomer= $_POST["customer"];
   $query = 'DELETE FROM deal WHERE deal.customerid ="'.$whichCustomer.'"';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query failed.");
     }

   $query1 = 'DELETE FROM customer WHERE customer.customerid ="'.$whichCustomer.'"';
   $result1=mysqli_query($connection,$query);
    if (!$result1) {
         die("database query1 failed.");
     }
     echo "Customer deleted!";
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
