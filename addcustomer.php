<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Customer</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>New Customer Information:</h1>
<ol>
<?php
   $customerexist = 0;
   $firstname= $_POST["firstname"];
   $lastname = $_POST["lastname"];
   $phone = $_POST["phone"];
   $city = $_POST["city"];
   $agent="99";

   $query1= 'SELECT max(customerid) AS maxid FROM customer';
   $result=mysqli_query($connection,$query1);
   if (!$result) {
          die("database max query failed.");
   }
   $row=mysqli_fetch_assoc($result);
   $newkey = intval($row["maxid"]) + 1;
   $customerid = (string)$newkey;
   $query='INSERT INTO customer VALUES("'.$customerid.'", "'.$firstname.'", "'.$lastname.'", "'.$city.'", "'.$phone.'", "'.$agent.'")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo "New customer was added!";
?>
</ol>
</body>
</html>
