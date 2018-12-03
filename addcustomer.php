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
   $query1= 'SELECT * FROM customer';
   $result1=mysqli_query($connection,$query1);
   if (!$result1) {
          die("database max query failed.");
   }
   while ($row = mysqli_fetch_assoc($result1)) {
    if($firstname == $row["firstname"] AND $lastname == $row["lastname"]) {
      customerexist = 1;
    }
  }
  if(customerexist == 1) {
  echo "Customer already exist";
   mysqli_close($connection);
  }
  else {
  
}
?>
</ol>
</body>
</html>
