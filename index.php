<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Home Page</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Welcome to the Sales Information Database</h1>
<h2>Customer Information</h2>
<form action="gettransactions.php" method="post">
<?php
include 'getdata.php';
?>
<input type="submit" value="Get Customer Transactions">
</form>
<p>
<hr>
<p>
<h2>Product Information</h2>
<form action="getproduct.php" method="post">
<input type="radio" name="order" value="ascending">In Ascending<br>
<input type="radio" name="order" value="descending">In Descending<br>
<input type="submit" value="Get All Product Information">
</form>
<?php
mysqli_close($connection);
?>
</body>
</html>