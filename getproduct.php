<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Products</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are the product information:</h1>
<ol>
<?php
   $whichOrder= $_POST["order"];
   if ($whichOrder=="ascending") {
        $query = 'SELECT * FROM product ORDER BY description';
   }
   else {
        $query = 'SELECT * FROM product ORDER BY description DESC';
   }
   
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo $row["productid"] . " " . $row["description"] . " " . $row["cost"] . " " . $row["quantity"];
     }
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
