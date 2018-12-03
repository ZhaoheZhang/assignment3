<?php
   $query = "SELECT description  FROM product WHERE product.productid NOT IN (SELECT productid FROM deal)";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   while ($row = mysqli_fetch_assoc($result)) {
        echo $row["description"] . "<br>";
   }
   mysqli_free_result($result);
?>

