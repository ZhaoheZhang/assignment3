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
   $totalMoney=0;
   $totalNum=0;
   $query = 'SELECT * FROM product, deal WHERE product.productid = deal.productid AND product.productid = "'.$whichProduct.'"';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        $amount = $row["quantity"] * $row["cost"];
        $totalMoney = $totalMoney + $amount;
        $totalNum = $totalNum + $row["quantity"];
     }
     echo $totalNum . " " . $row["description"] . " sold, made " . $totalMoney . " profit." .
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
