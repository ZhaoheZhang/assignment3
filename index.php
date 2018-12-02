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
</body>
</html>