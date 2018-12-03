<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Change Phone Number</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Change Customer Phone Number:</h1>
<ol>
<?php
   $whichCustomer= $_POST["customer"];
   $query = 'SELECT * FROM customer WHERE customer.customerid ="'.$whichCustomer.'"';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query failed.");
     }
    $row=mysqli_fetch_assoc($result);
    echo "Original Phone Number: "<br>;
    echo $row["firstname"] ." ". $row["lastname"] .": ". $row["phone"];
    mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
