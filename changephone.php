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
<h1>Changing Customer Phone Number</h1>
<ol>
<?php
   $whichcustomer= $_POST["customer"];
   $newphone = $_POST["newphone"];
   $query = 'UPDATE customer SET customer.phone = "'.$newphone.'" WHERE customer.customerid = "'.$whichcustomer.'"';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo "Your pet was added!";
   mysqli_close($connection);
?>
</ol>
</body>
</html>
