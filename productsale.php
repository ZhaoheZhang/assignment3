<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Product Sales Record</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are sales records:</h1>
<ol>
<?php
   $whichproduct= $_POST["product"];
   $query = 'SELECT SUM(deal.quantity) AS totalNum, product.description, product.cost FROM deal, product WHERE product.productid=deal.productid AND product.productid = "'.$whichProduct.'" GROUP BY product.productid';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query failed.");
     }
    $row=mysqli_fetch_assoc($result);
    echo $row["totalNum"] . " " . $row["description"] . "have been sold, make " . $row["totalNum"]*$row["cost"] . " profit";
    mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
