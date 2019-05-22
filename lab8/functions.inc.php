<?php

    function outputOrderRow($file, $title, $quantity, $price) {
      include 'data.inc.php';

      echo "<tr align:'left'>";
      echo "<td><img src=./images/books/tinysquare/",$file,"></td>";
      echo "<td>",$title,"</td>";
      echo "<td>",$quantity,"</td>";
      echo "<td>$",sprintf("%.2f",$price),"</td>";
      echo "<td>$",sprintf("%.2f",$price*$quantity),"</td>";
      echo "</tr>";
    }
?>
