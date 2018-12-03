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
<p>
<hr>
<p>
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
<p>
<hr>
<p>
<h2>Make a Purchase</h2>
<form action="purchase.php" method="post" enctype="multipart/form-data">
<?php
include 'getdata.php';
?>
<p>
<?php
include 'getproductname.php';
?>
<p>
Quantity:<br>
<input type="text" name="quantity"><br>
<input type="submit" value="Make Purchase">
</form>
<p>
<hr>
<p>
<h2>Add New Customer</h2>
<form action="addcustomer.php" method="post" enctype="multipart/form-data">
First Name: <input type="text" name="firstname"><br>
Last Name: <input type="text" name="lastname"><br>
Phone: <input type="text" name="phone"><br>
City: <input type="text" name="city"><br>
<input type="submit" value="Add New Customer">
</form>
<p>
<hr>
<p>
<h2>Change Customer Phone Number</h2>
<form action="changephone.php" method="post">
<?php
include 'getphone.php';
?>
New Phone Number: <input type="text" name="newphone"><br>
<input type="submit" value="Change Customer Phone Number">
</form>
<p>
<hr>
<p>
<form action="deletecustomer.php" method="post" enctype="multipart/form-data">
<h2>Delete A Customer</h2>
<?php
include 'getdata.php';
?>
<input type="submit" value="Delete Selected Customer">
</form>
<p>
<hr>
<p>
<form action="selectcustomer.php" method="post" enctype="multipart/form-data">
<h2>Valuable Customers</h2>
Show customer who has pruchased more than <input type="text" name="quantity"> (quantity) of any item<br>
<?php
include 'selectcustomer.php';
?>
<input type="submit" name="View Customers">
</form>
<?php
mysqli_close($connection);
?>
</body>
</html>