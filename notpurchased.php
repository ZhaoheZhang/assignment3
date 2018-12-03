<?php
   $query = "SELECT description  FROM product WHERE product.productid NOT IN (SELECT productid FROM deal)";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Who are you looking up? </br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo $row["description"];
   }
   mysqli_free_result($result);
?>

